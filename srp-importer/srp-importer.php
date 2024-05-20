<?php
/*
Plugin Name: Sonaar Demo Importer For Elementor Sites
Description: Template Importer for Sonaar Elementor Kits. Delete this plugin once the demo has been imported. It's only used to import the initial demo in your website.
Plugin URI: https://sonaar.io
Author: Sonaar
Author URI: https://sonaar.io
Version: 2.2
License: GPL2
Text Domain: srpimporter
Domain Path: /languages
*/
define( 'SRP_IMPORTER_DIR_URL', plugin_dir_url( __FILE__ ) );

// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define( 'SONAAR_STORE_URL', 'https://sonaar.io' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the name of the settings page for the license input to be displayed
define( 'SRPIMPORTER_PLUGIN_LICENSE_PAGE', 'srp-importer-license' );

if ( ! class_exists( 'EDD_SL_Plugin_Updater' ) ) {
	// load our custom updater
	include dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php';
}
/**
 * Adds the plugin license page to the admin menu.
 *
 * @return void
 */
function srpimporter_license_menu() {
	add_menu_page(
		__( 'Plugin License' ),
		__( 'Sonaar Templates License Key' ),
		'manage_options',
		SRPIMPORTER_PLUGIN_LICENSE_PAGE,
		'srpimporter_license_page'
	);
}
add_action( 'admin_menu', 'srpimporter_license_menu' );

function srpimporter_license_page() {

	add_settings_section(
		'srpimporter_license',
		__( 'License Key Registration' ),
		'srpimporter_license_key_settings_section',
		SRPIMPORTER_PLUGIN_LICENSE_PAGE
	);
	add_settings_field(
		'srpimporter_license_key',
		'<label for="srpimporter_license_key">' . __( 'License Key' ) . '</label>',
		'srpimporter_license_key_settings_field',
		SRPIMPORTER_PLUGIN_LICENSE_PAGE,
		'srpimporter_license'
	);
	?>
	<div class="wrap">
		<h2><?php esc_html_e( 'Sonaar Templates Settings' ); ?></h2>
		<form method="post" action="options.php">

			<?php
			do_settings_sections( SRPIMPORTER_PLUGIN_LICENSE_PAGE );
			settings_fields( 'srpimporter_license' );
			//submit_button();
			?>

		</form>
	<?php
}

/**
 * Adds content to the settings section.
 *
 * @return void
 */
function srpimporter_license_key_settings_section() {
	esc_html_e( 'This is where you enter your license key.' );
}

/**
 * Outputs the license key settings field.
 *
 * @return void
 */
function srpimporter_license_key_settings_field() {
	//delete_option('srpimporter_license_status');
	$license = get_option( 'srpimporter_license_key' );
	$status  = get_option( 'srpimporter_license_status' );
    if ( 'valid' !== $status ) {
        ?>
        <p class="description"><?php esc_html_e( 'Enter your license key.' ); ?></p>
        <?php
        printf(
            '<input type="text" class="regular-text" id="srpimporter_license_key" name="srpimporter_license_key" value="%s" />',
            esc_attr( $license )
        );
    }
    if ( 'valid' == $status ) {
        ?>
        <div class="description" style="color: #1ca500;font-weight: 600;"><?php esc_html_e( 'Activated' ); ?></div>
        <?php
    }
	$button = array(
		'name'  => 'edd_license_deactivate',
		'label' => __( 'Deactivate License' ),
	);
	if ( 'valid' !== $status ) {
		$button = array(
			'name'  => 'edd_license_activate',
			'label' => __( 'Activate License' ),
		);
	}
	?>
	<input type="submit" class="button-secondary" name="<?php echo esc_attr( $button['name'] ); ?>" value="<?php echo esc_attr( $button['label'] ); ?>"/>
	<div style="margin-bottom:30px"></div>	<?php
	if (!function_exists( 'fw_ext' ) && 'valid' == $status){
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$action = 'install-plugin';
		$slug = 'unyson';
		$link = wp_nonce_url(
			add_query_arg(
				array(
					'action' => $action,
					'plugin' => $slug
				),
				admin_url( 'update.php' )
			),
			$action.'_'.$slug
		);

		$message = '<p>' . __('Unyson Plugin is required and <strong>NOT installed</strong>.', 'srp-importer') . '</p>';
		$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $link, __( 'Install Unyson Plugin Now', 'sonaar-music-pro' ) ) . '</p>';
		echo $message;
	}else{
		if (function_exists( 'fw_ext' ) && !fw_ext('backups') && 'valid' == $status) {
			$message = '<p>' . __('Backup & Demo Content Extension <strong>NOT active</strong>.', 'srp-importer') . '</p>';
			$message .= '<p>' . sprintf( '<a href="' . esc_url(get_admin_url( null, 'admin.php?page=fw-extensions&sub-page=install&extension=backups' )) .'" class="button-primary">%s</a>', __( 'Please activate Backup & Demo Content here', 'sonaar-music-pro' ) ) . '</p>';
			echo $message;

		}else{
			if ( 'valid' == $status ) {
				$message = '<p>' . sprintf( '<a href="' . esc_url(get_admin_url( null, 'tools.php?page=fw-backups-demo-content' )) .'" class="button-primary">%s</a>', __( 'Click here to import new template', 'sonaar-music-pro' ) ) . '</p>';
				echo $message;
			
			}
		}
	}
	
	wp_nonce_field( 'srpimporter_nonce', 'srpimporter_nonce' );
	
}

/**
 * Registers the license key setting in the options table.
 *
 * @return void
 */
function srpimporter_register_option() {
	register_setting( 'srpimporter_license', 'srpimporter_license_key', 'srp_edd_sanitize_license' );
}
add_action( 'admin_init', 'srpimporter_register_option' );

/**
 * Sanitizes the license key.
 *
 * @param string  $new The license key.
 * @return string
 */
function srp_edd_sanitize_license( $new ) {
	$old = get_option( 'srpimporter_license_key' );
	if ( $old && $old !== $new ) {
		delete_option( 'srpimporter_license_status' ); // new license has been entered, so must reactivate
	}

	return sanitize_text_field( $new );
}

/**
 * Activates the license key.
 *
 * @return void
 */
function srpimporter_activate_license() {
	//delete_option('srpimporter_license_key');
	// listen for our activate button to be clicked
	if ( ! isset( $_POST['edd_license_activate'] ) ) {
		return;
	}
	// run a quick security check
	if ( ! check_admin_referer( 'srpimporter_nonce', 'srpimporter_nonce' ) ) {
		return; // get out if we didn't click the Activate button
	}
	// retrieve the license from the database
	$license = trim( get_option( 'srpimporter_license_key' ) );
	if ( ! $license ) {
		$license = ! empty( $_POST['srpimporter_license_key'] ) ? sanitize_text_field( $_POST['srpimporter_license_key'] ) : '';
	}
	if ( ! $license ) {
		return;
	}
	$download_id = get_sonaar_item_elementorkits_download_id($license);
	

	// data to send in our API request
	$api_params = array(
		'edd_action'  => 'activate_license',
		'license'     => $license,
		'item_id'     => $download_id,
		'url'         => home_url(),
		'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
	);

	// Call the custom API.
	$response = wp_remote_post(
		SONAAR_STORE_URL,
		array(
			'timeout'   => 15,
			'sslverify' => false,
			'body'      => $api_params,
		)
	);
		// make sure the response came back okay
	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
		if ( is_wp_error( $response ) ) {
			$message = $response->get_error_message();
		} else {
			$message = __( 'An error occurred, please try again.' );
		}
	} else {

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		update_option('sonaar_elementor_kit_download_id', $download_id);
		if ( false === $license_data->success ) {

			switch ( $license_data->error ) {

				case 'expired':
					$message = sprintf(
						/* translators: the license key expiration date */
						__( 'Your license key expired on %s.', 'edd-sample-plugin' ),
						date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
					);
					break;

				case 'disabled':
				case 'revoked':
					$message = __( 'Your license key has been disabled.', 'edd-sample-plugin' );
					break;

				case 'missing':
					$message = __( 'Invalid license.', 'edd-sample-plugin' );
					break;

				case 'invalid':
				case 'site_inactive':
					$message = __( 'Your license is not active for this URL.', 'edd-sample-plugin' );
					break;

				case 'item_name_mismatch':
					/* translators: the plugin name */
					$message = __( 'This appears to be an invalid license key for the product ID', 'edd-sample-plugin' );
					break;

				case 'no_activations_left':
					$message = __( 'Your license key has reached its activation limit.', 'edd-sample-plugin' );
					break;

				default:
					$message = __( 'An error occurred, please try again.', 'edd-sample-plugin' );
					break;
			}
		}
	}

		// Check if anything passed on a message constituting a failure
	if ( ! empty( $message ) ) {
		$redirect = add_query_arg(
			array(
				'page'          => SRPIMPORTER_PLUGIN_LICENSE_PAGE,
				'sl_activation' => 'false',
				'message'       => rawurlencode( $message ),
			),
			admin_url( 'plugins.php' )
		);

		wp_safe_redirect( $redirect );
		exit();
	}

	// $license_data->license will be either "valid" or "invalid"
	if ( 'valid' === $license_data->license ) {
		update_option( 'srpimporter_license_key', $license );
	}
	update_option( 'srpimporter_license_status', $license_data->license );
	wp_safe_redirect( admin_url( 'plugins.php?page=' . SRPIMPORTER_PLUGIN_LICENSE_PAGE ) );
	exit();
}
add_action( 'admin_init', 'srpimporter_activate_license' );

function get_sonaar_item_elementorkits_download_id($license){
	if( !is_admin() ) return false;

	$api_url = 'https://sonaar.io/wp-json/wp/v2/sonaar-api/templateKitLicenseGetDownloadId/?licence=' . $license;
	$download_id = wp_remote_get( $api_url );
	if ( is_wp_error( $download_id ) ) {
        return $download_id;
    }

    if ( is_wp_error( $download_id ) || $download_id['response']['code'] !== 200 || $download_id['headers']['content-type'] !== 'application/json; charset=UTF-8' ){
        return false;
    }

    $download_id = json_decode( wp_remote_retrieve_body( $download_id ) , true);
	
	return $download_id;
}
/**
 * Deactivates the license key.
 * This will decrease the site count.
 *
 * @return void
 */
function srpimporter_deactivate_license() {

	// listen for our activate button to be clicked
	if ( isset( $_POST['edd_license_deactivate'] ) ) {

		// run a quick security check
		if ( ! check_admin_referer( 'srpimporter_nonce', 'srpimporter_nonce' ) ) {
			return; // get out if we didn't click the Activate button
		}
		// retrieve the license from the database
		$license = trim( get_option( 'srpimporter_license_key' ) );
		
		// data to send in our API request
		$api_params = array(
			'edd_action'  => 'deactivate_license',
			'license'     => $license,
			'item_id'     => get_option('sonaar_elementor_kit_download_id'),
			'url'         => home_url(),
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		// Call the custom API.
		$response = wp_remote_post(
			SONAAR_STORE_URL,
			array(
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $api_params,
			)
		);
		delete_option( 'sonaar_elementor_kit_download_id' );
		delete_option( 'srpimporter_license_status' );
		delete_option( 'srpimporter_license_key' );
		delete_site_transient( 'srp_demo' );
		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$redirect = add_query_arg(
				array(
					'page'          => SRPIMPORTER_PLUGIN_LICENSE_PAGE,
					'sl_activation' => 'false',
					'message'       => rawurlencode( $message ),
				),
				admin_url( 'plugins.php' )
			);

			wp_safe_redirect( $redirect );
			exit();
		}

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		wp_safe_redirect( admin_url( 'plugins.php?page=' . SRPIMPORTER_PLUGIN_LICENSE_PAGE ) );
		exit();

	}
}
add_action( 'admin_init', 'srpimporter_deactivate_license' );

/**
 * This is a means of catching errors from the activation method above and displaying it to the customer
 */
function srpimporter_admin_notices() {
	if ( isset( $_GET['sl_activation'] ) && ! empty( $_GET['message'] ) ) {

		switch ( $_GET['sl_activation'] ) {

			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo wp_kses_post( $message ); ?></p>
				</div>
				<?php
				break;

			case 'true':
			default:
				// Developers can put a custom success message here for when activation is successful if they way.
				break;

		}
	}
}
add_action( 'admin_notices', 'srpimporter_admin_notices' );

if (null !==  get_option( 'srpimporter_license_status' ) && get_option( 'srpimporter_license_status' ) == 'valid' ){

if (defined('FW')):
    // the framework was already included in another place, so this version will be inactive/ignored
else:
    function _filter_fw_framework_plugin_directory_uri() {
        return plugin_dir_url( __FILE__ ) . '/includes/Unyson/framework/';
    }
    add_filter('fw_framework_directory_uri', '_filter_fw_framework_plugin_directory_uri');

    require dirname(__FILE__) .'/includes/Unyson/framework/bootstrap.php';
endif;

function srp_filter_fw_ext_backups_db_restore_keep_options($options, $is_full) {
    if (!$is_full) {
        $options[ 'SRMP3_ecommerce' ] = true;
		$options[ 'sonaar_music_licence' ] = true;
        $options[ 'srpimporter_license_key' ] = true;
		$options[ 'srpimporter_license_status' ] = true;
    }

    return $options;
}

function srp_filter_theme_fw_ext_backups_db_restore_exclude_option($exclude, $option_name, $is_full) {
    if (!$is_full) {
        if ($option_name === 'SRMP3_ecommerce') {
            return true;
        }
        if ($option_name === 'sonaar_music_licence') {
            return true;
        }
        if ($option_name === 'srpimporter_license_key') {
            return true;
        }
        if ($option_name === 'srpimporter_license_status') {
            return true;
        }
		if ($option_name === 'woocommerce_stripe_settings') {
            return true;
        }

    }

    return $exclude;
}

function srp_template_get_demo(){
    if( !is_admin() ) return false;
    	
    $license = get_option( 'srpimporter_license_key' );
	
    if ( !$license ) {
		return new WP_Error( 'The license key used is currently empty, expired or invalid', "Make sure to enter your license key in Theme Options > Dashboard." );
	}

    $demo_folder = 'https://assets.sonaar.io/elementor-kit/';
	$api_url = 'https://sonaar.io/wp-json/wp/v2/sonaar-api/templateKitLicense/?licence=' . $license;
    $demo_list = wp_remote_get( $api_url );
    if ( is_wp_error( $demo_list ) ) {
        return $demo_list;
    }

    if ( is_wp_error( $demo_list ) || $demo_list['response']['code'] !== 200 || $demo_list['headers']['content-type'] !== 'application/json; charset=UTF-8' ){
        return false;
    }

    $json_demo_list = json_decode( wp_remote_retrieve_body( $demo_list ) , true);



    $unyson_format_demo_list = array();

    foreach( $json_demo_list as $demo){
        $unyson_format_demo_list[$demo['id']] = array(
            'title' => $demo['title'],
            'screenshot' => $demo_folder . $demo['id'] .'/'. $demo['screenshot'],
            'preview_link' => $demo['preview_link']
            );
    }
    return $unyson_format_demo_list;
}

function srp_filter_theme_fw_ext_backups_demos($demos) {
	if ( !get_site_transient( 'srp_demo' ) || is_wp_error( get_site_transient( 'srp_demo' ) ) ) {
		//refresh the demo data..maybe there are new demos ?
        set_site_transient( 'srp_demo', srp_template_get_demo(),  30 * DAY_IN_SECONDS );
    }
    $demos_array = get_site_transient( 'srp_demo' );

    if (is_wp_error( $demos_array )) {
		//print ("Oops. We’ve found a minor issue.", "There is a problem with the Demo Importer.",'notice-error',"If you don't know how to fix this issue, please contact your web hosting with the error message above, or contact us on our <a href='mailto:https://support.sonaar.io'>help desk</a>");
        //new Iron_Sonaar_message("Oops. We’ve found a minor issue.", "There is a problem with the Demo Importer.",'notice-error',"If you don't know how to fix this issue, please contact your web hosting with the error message above, or contact us on our <a href='mailto:https://support.sonaar.io'>help desk</a>", $demos_array);
        return array();
    }

    if (!$demos_array)
        return array();

    $download_url = 'https://assets.sonaar.io/elementor-kit/';

    foreach ($demos_array as $id => $data) {
        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
            'url' => $download_url,
            'file_id' => $id,
        ));
        $demo->set_title($data['title']);
        $demo->set_screenshot($data['screenshot']);
        $demo->set_preview_link($data['preview_link']);

        $demos[ $demo->get_id() ] = $demo;

        unset($demo);
    }

    return $demos;
}

function srp_importer_active(){
    if ( is_admin() ) {
        add_filter('fw_ext_backups_db_restore_keep_options', 'srp_filter_fw_ext_backups_db_restore_keep_options', 10, 2);
        add_filter('fw_ext_backups_db_restore_exclude_option','srp_filter_theme_fw_ext_backups_db_restore_exclude_option',10, 3);
		add_filter('fw:ext:backups-demo:demos', 'srp_filter_theme_fw_ext_backups_demos');
       
        do_action('fw_after_plugin_activate');
    }
}

add_action('fw_init', 'srp_importer_active');



function srp_importer_settings_link( $links ){
$links[] = '<a href="' . esc_url(get_admin_url( null, 'admin.php?page=srp-importer-license' )) .'">' . esc_html__('Enter License Key', 'iron-demo-importer') . '</a>';
return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'srp_importer_settings_link' );

add_action('admin_enqueue_scripts', 'srp_importer_script');

function srp_checkIfImporterPage(){
    $page = ( isset(  $_GET["page"] ) )? $_GET["page"] : false;

    if ( 'fw-backups-demo-content' == $page ){
        return true;
    }
    return false;
}

function srp_importer_script(){
    if ( !srp_checkIfImporterPage() )
    return;

    wp_enqueue_style('srp_importer', SRP_IMPORTER_DIR_URL . 'css/admin.css', array(), NULL);
}




function srp_checkIfSame( $toCheck = null, $minValue = null, $recommendedValue = null ){

    if ( !isset($toCheck) || !isset($minValue) || !isset($recommendedValue) )
        return;

    if ( (int) $toCheck < $minValue ) {
        return ' class="danger"';

    }elseif( (int) $toCheck < $recommendedValue ){
        return ' class="warning"';

    }else{
        return;

    }
}



function srp_importer_notice() {

    if ( !srp_checkIfImporterPage() )
    return;


	$class = "iron-importer message";
        echo'<div class="' . $class . '">
            <div class="message">
                <h2>Requirements & Recommendations</h2>
                <p>In order to import demos, your server must meet the requirements listed below.<br>
                If the import doesn\'t work, you should contact your web hosting provider and ask them to adjust your server configuration to meet the recommended settings.</p>
            </div>
            <table class="table table-hover ">
            <thead>
                <tr>
                    <th>Settings</th>
                    <th>Currents</th>
                    <th>Required</th>
                    <th>Recommanded</th>
                    <th>Documentation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PHP Version</td>
                    <td>'. phpversion() .'</td>
                    <td>5.2</td>
                    <td>5.4</td>
                    <td></td>
                </tr>
                <tr' . ini_set('max_execution_time', 600) . srp_checkIfSame( ini_get('max_execution_time'), 300, 600 ) . '>
                    <td>PHP Time Limit</td>
                    <td>'. ini_get('max_execution_time') .'</td>
                    <td>300</td>
                    <td>600</td>
                    <td><a target="_blank" href="http://php.net/manual/en/function.set-time-limit.php">PHP Documentation "set_time_limit"</a></td>
                </tr>
                <tr' . srp_checkIfSame( ini_get('upload_max_filesize'), 2, 10 ) . '>
                    <td>Max Upload Size</td>
                    <td>'. ini_get('upload_max_filesize') .'</td>
                    <td>2M</td>
                    <td>10M</td>
                    <td><a target="_blank" href="http://php.net/manual/en/ini.core.php">PHP Documentation "php.ini file"</a></td>
                </tr>
                <tr' . srp_checkIfSame( ini_get('memory_limit'), 32, 64 ) . '>
                    <td>Memory Limit</td>
                    <td>'. ini_get('memory_limit') .'</td>
                    <td>32M</td>
                    <td>64M</td>
                    <td><a target="_blank" href="http://php.net/manual/en/ini.core.php">PHP Documentation "php.ini file"</a></td>
                </tr>
                <tr' . srp_checkIfSame( WP_MEMORY_LIMIT, 32, 64 ) . '>
                    <td>WP Memory Limit</td>
                    <td>'. WP_MEMORY_LIMIT .'</td>
                    <td>32M</td>
                    <td>64M</td>
                    <td><a target="_blank" href="https://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP">WordPress Documentation "Increasing memory allocated to PHP"</a></td>
                </tr>
            </tbody>
            </table>
        </div>';
}
}
