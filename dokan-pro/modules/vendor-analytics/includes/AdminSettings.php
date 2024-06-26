<?php

namespace WeDevs\DokanPro\Modules\VendorAnalytics;

use WeDevs\Dokan\Exceptions\DokanException;

class AdminSettings {

    /**
     * Class constructor
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function __construct() {
        add_action( 'woocommerce_api_dokan_vendor_analytics', array( $this, 'save_token' ) );
        add_filter( 'dokan_settings_sections', array( $this, 'add_settings_section' ) );
        add_filter( 'dokan_settings_fields', array( $this, 'add_settings_fields' ) );
        add_filter( 'dokan_settings_refresh_option_dokan_vendor_analytics_profile', array( $this, 'refresh_admin_settings_option_profile' ) );
        add_action( 'wp_head', array( $this, 'add_tracking_code' ), 0 );
        add_action( 'woocommerce_api_disconnect-google-analytics-profile', [ $this, 'disconnect_google_analytics_profile' ] );
    }

    /**
     * Save token got from api authentication
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function save_token() {
        $token_params = array(
            'access_token',
            'expires_in',
            'refresh_token',
            'scope',
            'token_type',
            'created',
        );

        $token = array();

        foreach ( $token_params as $param ) {
            if ( empty( $_GET[ $param ] ) ) {
                die( sprintf( __( '%s param not found in token', 'dokan' ), $param ) );
            } else {
                $token[ $param ] = $_GET[ $param ];
            }
        }

        $options = array(
            'token'    => json_encode( $token ),
            'profiles' => array(),
        );

        update_option( 'dokan_vendor_analytics_google_api_data', $options, false );

        wp_safe_redirect( admin_url( 'admin.php?page=dokan#/settings' ) );
        exit;
    }

    /**
     * Add admin settings section
     *
     * @since 1.0.0
     *
     * @param array $sections
     *
     * @return array
     */
    public function add_settings_section( $sections ) {
        $sections['dokan_vendor_analytics'] = [
            'id'                   => 'dokan_vendor_analytics',
            'title'                => __( 'Vendor Analytics', 'dokan' ),
            'icon_url'             => DOKAN_VENDOR_ANALYTICS_ASSETS . '/images/analytics.svg',
            'description'          => __( 'Setup Analytics', 'dokan' ),
            'document_link'        => 'https://dokan.co/docs/wordpress/modules/dokan-vendor-analytics/',
            'settings_title'       => __( 'Vendor Analytics Settings', 'dokan' ),
            'settings_description' => __( 'Configure Dokan to give vendors the ability to measure and track their store performances.', 'dokan' ),
        ];

        return $sections;
    }

    /**
     * Add admin settings fields
     *
     * @since 1.0.0
     *
     * @param array $settings_fields
     *
     * @return array
     */
    public function add_settings_fields( $settings_fields ) {
        $api_data  = get_option( 'dokan_vendor_analytics_google_api_data', array() );
        $token_raw = ! empty( $api_data['token'] ) ? $api_data['token'] : '{}';
        $token     = json_decode( $token_raw, true );
        $profiles  = ! empty( $api_data['profiles'] ) ? $api_data['profiles'] : array();

        $analytics_fields = array();

        if ( empty( $token['access_token'] ) && empty( $token['refresh_token'] ) ) {
            $auth_url = dokan_vendor_analytics_get_auth_url();
            $btn_src  = DOKAN_VENDOR_ANALYTICS_ASSETS . '/images/btn_google_signin_dark_normal_web.png';

            $analytics_fields = array(
                'authenticate_user'  => array(
                    'name'    => 'authenticate_user',
                    'label'   => __( 'Authenticate', 'dokan' ),
                    'type'    => 'html',
                    'desc'    => sprintf( '<a href="%s"><img alt="Sign in with Google" src="%s"></a>', $auth_url, $btn_src ),
                    'tooltip' => __( 'Select which Google Analytics Tracking ID you want to integrate', 'dokan' ),
                ),
            );
        } else {
            if ( empty( $profiles ) ) {
                $profiles = dokan_vendor_analytics_api_get_profiles();

                if ( is_wp_error( $profiles ) ) {
                    $profiles = [];
                }
            }

            $disconnect_url = site_url( 'wc-api/disconnect-google-analytics-profile' ) . '?nonce=' . wp_create_nonce( 'disconnect-google-analytics-profile' );

            $analytics_fields = array(
                'profile'  => array(
                    'name'            => 'profile',
                    'label'           => __( 'Analytics Profile', 'dokan' ),
                    'type'            => 'select',
                    'placeholder'     => __( 'Select your profile', 'dokan' ),
                    'grouped'         => true,
                    'options'         => $profiles,
                    'desc'            => sprintf( '<a class="button button-danger" href="%s">%s</a>', $disconnect_url, __( 'Disconnect', 'dokan' ) ),
                    'tooltip'         => __( 'Select which Google Analytics Tracking ID you want to integrate', 'dokan' ),
                    'refresh_options' => array(
                        'messages' => array(
                            'refreshing' => __( 'Refreshing profile list', 'dokan' ),
                            'refreshed'  => __( 'Profile list updated!', 'dokan' ),
                        ),
                    ),
                ),
                'add_tracking_code'   => array(
                    'name'    => 'add_tracking_code',
                    'label'   => __( 'Add Tracking Code', 'dokan' ),
                    'desc'    => __( 'This is an optional settings that will add Analytics Global Site Tag in you site header. If you use any SEO plugin or add your tracking code by other means, then choose `no` in the settings.', 'dokan' ),
                    'type'    => 'switcher',
                    'default' => 'off',
                ),
            );
        }

        $settings_fields['dokan_vendor_analytics'] = $analytics_fields;

        return $settings_fields;
    }

    /**
     * Refresh profiles in admin settings
     *
     * @since 3.0.5
     *
     * @return array
     */
    public function refresh_admin_settings_option_profile() {
        try {
            $profiles = dokan_vendor_analytics_api_get_profiles();

            if ( is_wp_error( $profiles ) ) {
                throw new DokanException(
                    $profiles->get_error_code(),
                    $profiles->get_error_message()
                );
            }

            return $profiles;
        } catch ( Exception $e ) {
            return [];
        }
    }

    /**
     * Add Google tracking code inside head tag
     *
     * @since 3.0.5
     *
     * @return void
     */
    public function add_tracking_code() {
        $add_tracking_code = dokan_get_option( 'add_tracking_code', 'dokan_vendor_analytics', 'off' );

        if ( 'on' !== $add_tracking_code ) {
            return;
        }

        $profile = dokan_get_option( 'profile', 'dokan_vendor_analytics', '' );

        if ( empty( $profile ) || ! is_string( $profile ) ) {
            return;
        }

        $api_data = get_option( 'dokan_vendor_analytics_google_api_data', array() );

        if ( empty( $api_data['profiles_map'] ) || ! isset( $api_data['profiles_map'][ $profile ] ) ) {
            return;
        }

        dokan_get_template_part( 'tracking-code', '', array(
            'is_vendor_analytics_views' => true,
            'web_properties_id'         => $api_data['profiles_map'][ $profile ],
        ) );
    }

    /**
     * Disconnect google analytics profile
     *
     * @since 3.1.4
     *
     * @return void
     */
    public function disconnect_google_analytics_profile() {
        if ( ! current_user_can( 'manage_woocommerce' ) ) {
            return;
        }

        $nonce = sanitize_text_field( $_GET['nonce'] );

        if ( isset( $_GET['nonce'] ) && ! wp_verify_nonce( $nonce, 'disconnect-google-analytics-profile' ) ) {
            return;
        }

        $api_data = get_option( 'dokan_vendor_analytics_google_api_data', [] );

        if ( $api_data ) {
            delete_option( 'dokan_vendor_analytics_google_api_data' );
            wp_safe_redirect( admin_url( 'admin.php?page=dokan#/settings' ) );
        }

        exit;
    }
}
