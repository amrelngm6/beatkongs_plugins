<?php

/**
* The admin-specific functionality of the plugin.
*
* @link       sonaar.io
* @since      1.0.0
*
* @package    Sonaar_Music_Pro
* @subpackage Sonaar_Music_Pro/admin
*/

/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Sonaar_Music_Pro
* @subpackage Sonaar_Music_Pro/admin
* @author     Edouard Duplessis <eduplessis@gmail.com>
*/

class Sonaar_Music_Pro_Admin {
    
    
    /**
    * The ID of this plugin.
    *
    * @since    1.0.0
    * @access   private
    * @var      string    $plugin_name    The ID of this plugin.
    */

    private $plugin_name;
    
    /**
    * The version of this plugin.
    *
    * @since    1.0.0
    * @access   private
    * @var      string    $version    The current version of this plugin.
    */
    private $version;

    public $registered_plugins_data = false;
    /**
    * Initialize the class and set its properties.
    *
    * @since    1.0.0
    * @param      string    $plugin_name       The name of this plugin.
    * @param      string    $version    The version of this plugin.
    */
    public function __construct( $plugin_name, $version ) {
        
        $this->plugin_name = $plugin_name;
        $this->version = $version;
		
		global $iron_music_player;
		$iron_music_player = get_option( 'iron_music_player' );
        if ( class_exists( 'Sonaar_Music' ) ){
            add_action('admin_notices', array( $this, 'shell_exec_admin_notice') );
            add_action('admin_notices', array( $this, 'ffmpeg_admin_notice') );
            add_action('wp_ajax_index_alb_tracklist_for_lazyload', array($this, 'index_alb_tracklist_for_lazyload_ajax_handler'));
            add_action('admin_init', array( $this, 'load_audioPreview_class' ) );
        }

        add_filter('pre_set_site_transient_update_plugins', array( $this, 'srp_check_for_plugin_update'),99);
        add_filter('plugins_list', array( $this, 'srp_plugins_list'),99);
		
        add_filter('plugins_api',  array( $this, 'plugins_api_filter'), 10, 3);
        add_action( 'admin_init', array( $this, 'generate_register_plugin_data' ) );
        add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 3 );
    }

    public function generate_register_plugin_data() {
        if ( is_admin() ) {
            if( ! function_exists('get_plugin_data') ){
                require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            }
        }

        $plugin_info = get_plugin_data( SRMP3_DIRNAME );

        $this->registered_plugins_data = array(
            'name'       => $plugin_info['Name'],
            'slug'       => $this->plugin_name,
            'author'     => $plugin_info['Author'],
            'plugin_url' => $plugin_info['PluginURI'],
            'requires'   => '5.2',
            'banners'    => array(
                'high' => 'https://ps.w.org/mp3-music-player-by-sonaar/assets/banner-1544x500.jpg?rev=2569652',
                'low'  => 'https://ps.w.org/mp3-music-player-by-sonaar/assets/banner-1544x500.jpg?rev=2569652'
            ),
            'version'       => $plugin_info['Version'],
            'changelog'     => false,
        );
	}

    public function plugins_api_filter( $_data, $_action = '', $_args = null) {
		if ( 'plugin_information' !== $_action ) {
			return $_data;
		}
        if ( ! isset( $_args->slug ) || ( $_args->slug !== $this->plugin_name ) ) {
			return $_data;
		}

        $plugin_api_data = get_site_transient('srmp3_pro_api_request');
        //delete site_transient('srmp3_pro_api_request');

        if ( empty( $plugin_api_data ) ) {

            $changelog_remote_response = $this->changelog_remote_query();

			if ( ! $changelog_remote_response ) {
				return $_data;
			}

            $plugin_api_data = new \stdClass();

			$plugin_api_data->name =  $this->registered_plugins_data['name'];
			$plugin_api_data->slug = $this->registered_plugins_data['slug'];
			$plugin_api_data->author = $this->registered_plugins_data['author'];//'<a href="https://sonaar.io/">Sonaar.io</a>';
			$plugin_api_data->homepage = $this->registered_plugins_data['plugin_url'];//'https://sonaar.io/';
			$plugin_api_data->requires = $this->registered_plugins_data['requires'];
			$plugin_api_data->version = $this->registered_plugins_data['version'];
			//$plugin_api_data->download_link = $this->registered_plugins_data['download_link'];
			$plugin_api_data->banners = $this->registered_plugins_data['banners'];
            $plugin_api_data->sections = array(
				'changelog' =>  $changelog_remote_response,
			);
			

			// Expires in 1 day
			set_site_transient( 'srmp3_pro_api_request', $plugin_api_data, DAY_IN_SECONDS );
        }

        $_data = $plugin_api_data;
        return $_data;
    }

    public function changelog_remote_query() {
		$response = wp_remote_get('https://assets.sonaar.io/plugins/MP3-Music-Player-By-Sonaar-Pro/changelog.txt');

		if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) != '200' ) {
			return false;
		}

		$response = $response['body'];
          // Convert newlines to HTML line breaks
        $response = nl2br($response);

		return $response;
	}

    public function plugin_row_meta( $plugin_meta, $plugin_file, $plugin_data ) {		
        if ($plugin_file == PLUGIN_INSTALLATION_NAME) {
            $plugin_meta['view-details'] = sprintf(
                '<a href="%s" class="thickbox open-plugin-details-modal" aria-label="%s" data-title="%s">%s</a>',
                esc_url(
                    network_admin_url(
                        'plugin-install.php?tab=plugin-information&plugin=' . $this->plugin_name . '&TB_iframe=true&width=600&height=550'
                    )
                ),
                esc_attr(__('More information about Sonaar Music Pro', 'your-text-domain')), // Replace with your desired aria-label text
                esc_attr(__('Sonaar Music Pro Details', 'your-text-domain')), // Replace with your desired data-title text
                'View details'
            );
        }
		
		return $plugin_meta;
	}
    public function ffmpeg_admin_notice() {
        $screen = get_current_screen();
        // Check if you are on the desired options page. Replace 'your_options_page_slug' with the slug of your options page.
        if ( $screen->id === 'sr_playlist_page_srmp3_settings_audiopreview' ) {
            if (!$this->is_ffmpeg_exist()) {
                echo '
                <div class="notice notice-error">
                    <p><strong>Warning:</strong> If you want to automatically trim, add audio watermarks, pre-roll or post-roll to your previews, FFMPEG Library must be installed on your server. <a href="https://sonaar.io/docs/how-to-add-audio-preview-in-wordpress/" target="_blank">Learn More</a></p>
                </div>';
            } 


            
        }
    }
    
    public function shell_exec_admin_notice() {
        $screen = get_current_screen();
        // Check if you are on the desired options page. Replace 'your_options_page_slug' with the slug of your options page.
        if ( $screen->id === 'sr_playlist_page_srmp3_settings_audiopreview' ) {
            if (!function_exists('shell_exec')  || stripos(ini_get('disable_functions'), 'shell_exec') !== false ) {
                echo '
                <div class="notice notice-error">
                    <p><strong>Warning:</strong> The shell_exec function is not available or is disabled on your server. Please enable it to run FFMPEG. Contact your server support. </p>
                </div>';
            } 
        }
    }

    public static function is_ffmpeg_exist () {
        //return false;

        if (!is_admin() || !is_user_logged_in()) {
            return;
        }
        
        if (!function_exists('shell_exec')  || stripos(ini_get('disable_functions'), 'shell_exec') !== false ) { // Check if shell_exec function exists
            //error_log('shell_exec function does not exist or is disabled.');
            update_option('srmp3_ffmpeg_path', '');
            return false;
        }

        $custom_ffmpeg_path_raw = Sonaar_Music::get_option('audiopreview_ffmpeg_path', 'srmp3_settings_audiopreview');
        $custom_ffmpeg_path = ($custom_ffmpeg_path_raw !== null && strlen($custom_ffmpeg_path_raw) > 5) ? $custom_ffmpeg_path_raw : 'ffmpeg';
       
        $possible_paths = [
            $custom_ffmpeg_path,
            '/usr/bin/ffmpeg',
            '/bin/ffmpeg',
            '/usr/local/bin/ffmpeg'
        ];
        
        foreach ($possible_paths as $path) {
            if (@file_exists($path)) {
                update_option('srmp3_ffmpeg_path', $path);
                return true;
            }
        }
        
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows environment
            $ffmpeg = trim(shell_exec('where ffmpeg 2>&1'));
        } else {
            // Linux/Unix environment
            $ffmpeg = trim(shell_exec('which ffmpeg 2>&1'));
        }
        if (strpos($ffmpeg, 'not found') !== false) {  // not found!

        }else{
            update_option('srmp3_ffmpeg_path', $ffmpeg);
            return true;
        }


        update_option('srmp3_ffmpeg_path', '');
        return false;

       
    }

    public function load_audioPreview_class(){
        if ( !is_admin() || !is_user_logged_in()) {
            return;
        }

      if (get_site_option('SRMP3_ecommerce') == '1' && $this->is_ffmpeg_exist()){
        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-sonaar-audiopreview.php';
        $srmp3_audio_preview = SRMP3_AudioPreview::getInstance();

        if(Sonaar_Music::get_option('force_audio_preview', 'srmp3_settings_audiopreview') === 'true'){
            function add_audiopreview_generate_bt_to_bulk_dropdown() {
                global $post_type, $pagenow;
                if ( $pagenow == 'edit.php' && (SR_PLAYLIST_CPT == $post_type || 'product' == $post_type)) {
                    ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function() {
                            jQuery('<option>').val('generate_audiopreview').text('<?php _e('Generate Audio Preview')?>').appendTo("select[name='action']");
                            jQuery('<option>').val('generate_audiopreview').text('<?php _e('Generate Audio Preview')?>').appendTo("select[name='action2']");
                        });
                    </script>
                    <?php
                }
            }
            add_action('admin_footer', 'add_audiopreview_generate_bt_to_bulk_dropdown');

            function redirect_generate_bt_to_settings( $redirect_to, $doaction, $post_ids ) {
                //error_log($doaction);
                if ( $doaction === 'generate_audiopreview' ) {
                    // Prepare the list of post IDs
                    $ids = join(',', $post_ids);
                    
                    // Redirect to your custom URL
                    $redirect_to = admin_url( "edit.php?post_type=sr_playlist&page=srmp3_settings_audiopreview&posts_in=" . $ids );
                    
                    return $redirect_to;
                }
                
                return $redirect_to;
            }
            add_filter('handle_bulk_actions-edit-sr_playlist', 'redirect_generate_bt_to_settings', 10, 3);
            add_filter('handle_bulk_actions-edit-product', 'redirect_generate_bt_to_settings', 10, 3);
        }


      }  
    }
    /**
    * Register the stylesheets for the admin area.
    *
    * @since    1.0.0
    */
    public function enqueue_styles($hook) {
      
        /**
        * This function is provided for demonstration purposes only.
        *
        * An instance of this class should be passed to the run() function
        * defined in Sonaar_Music_Pro_Loader as all of the hooks are defined
        * in that particular class.
        *
        * The Sonaar_Music_Pro_Loader will then create the relationship
        * between the defined hooks and the functions defined in this
        * class.
        */
        if ( class_exists( 'Sonaar_Music' ) ){
            if ( $hook == SR_PLAYLIST_CPT . '_page_sonaar_music_pro' || $hook == SR_PLAYLIST_CPT . '_page_sonaar_music_pro_license' || $hook == 'post.php' || $hook=='post-new.php') {
                wp_enqueue_style( 'daterangepicker', plugin_dir_url( dirname( __FILE__ ) ) . 'admin/css/daterangepicker.min.css', array(), '4.2.1', 'all' );
                wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sonaar-music-pro-admin.css', array('daterangepicker'), $this->version, 'all' );
            }
        }
    }
    
    /**
    * Register the JavaScript for the admin area.
    *
    * @since    1.0.0
    */
    public function enqueue_scripts($hook) {
        
        /**
        * This function is provided for demonstration purposes only.
        *
        * An instance of this class should be passed to the run() function
        * defined in Sonaar_Music_Pro_Loader as all of the hooks are defined
        * in that particular class.
        *
        * The Sonaar_Music_Pro_Loader will then create the relationship
        * between the defined hooks and the functions defined in this
        * class.
        */
        if ( class_exists( 'Sonaar_Music' ) ){
            if ($hook == SR_PLAYLIST_CPT . '_page_sonaar_music_pro' || $hook == SR_PLAYLIST_CPT . '_page_sonaar_music_pro_license' ) {
                wp_enqueue_script( 'vuejs', plugin_dir_url( __DIR__ ) . 'public/js/vue.min.js', array(), '2.6.14', false );
                wp_enqueue_script( 'polyfill', plugin_dir_url( __DIR__ ) . 'public/js/polyfill.min.js', array(), '6.26.0', false );
                wp_enqueue_script( 'bootstrap-vue', plugin_dir_url( __DIR__ ) . 'public/js/bootstrap-vue.min.js', array(), '2.21.2', false );
                wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sonaar-music-pro-admin.js', array( 'jquery','vuejs', 'polyfill', 'bootstrap-vue' ), $this->version, true );
                wp_enqueue_style( 'bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), '5.1.3', 'all' );
                wp_enqueue_style( 'bootstrapvue-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap-vue.min.css', array(), $this->version, 'all' );
                
                wp_localize_script( $this->plugin_name, strtr($this->plugin_name, '-', '_'), array(
                    'licence' => get_site_option( 'sonaar_music_licence', '' ),
			        'SRMP3_purchased_plan' => esc_html(printPurchasedPlan()),
                ));
            }
            if ($hook == SR_PLAYLIST_CPT . '_page_sonaar_music_pro') {
                wp_enqueue_script( 'chart', plugin_dir_url( __DIR__ ) . 'public/js/Chart.min.js' , array(), '2.9.4', false );
                wp_enqueue_script( 'daterangepicker-moment', plugin_dir_url( __DIR__ ) . 'public/js/moment.min.js', array('jquery'), $this->version, false );
                wp_enqueue_script( 'daterangepicker', plugin_dir_url( __DIR__ ) . 'public/js/daterangepicker.min.js', array('jquery'), $this->version, false );
                
                $sonaar_data = new Sonaar_Music_Get;
                
                $date_start = ( isset( $_GET['date_start']) )? $_GET['date_start']: date('Y-m-d H:i:s', strtotime('today - 14 day'));
                $date_end = ( isset( $_GET['date_end']) )? $_GET['date_end']: date('Y-m-d H:i:s', strtotime('today'));
                $sonaar_data->set_date($date_start, $date_end);
                $date1 = new DateTime($sonaar_data->get_date()[0]);
                $date2 = new DateTime($sonaar_data->get_date()[1]);
                $interval = $date2->diff($date1);
                $interval = ( $interval->days < 2 )? 1 : $interval->days;
                
                $sonaar_data->set_interval($interval);
                
                $get_play_count_per_page = $sonaar_data->get_play_count_per_page();
                foreach ( $get_play_count_per_page as $i => $value ) {
                    $get_play_count_per_page[$i]->id = url_to_postid( $get_play_count_per_page[$i]->page_url );
                }
                
                $url = ( isset( $_GET['url']) && url_to_postid( $_GET['url'] ) )? $_GET['url']: false;
                
                $play_count_by_day = $sonaar_data->get_play_count_by_day($url) ;
                
                $get_play_count_per_track = $sonaar_data->get_play_count_per_track(array('url' => $url));
                $get_download_count_per_track = $sonaar_data->get_download_count_per_track(array('url' => $url));
                

                $dataDate = array();
                $dataCount = array();
                foreach ( $play_count_by_day as $play ) {
                    if ( !empty($play->date) ) {
                        array_push($dataDate, $play->date);
                    }
                    if ( !empty($play->play_count) ) {
                        array_push($dataCount, $play->play_count);
                    }
                }

                if( count( $dataDate ) == 1 )
                    array_push($dataDate, $dataDate[0]);
            
                if( count( $dataCount ) == 1 )
                    array_push($dataCount, $dataCount[0]);
                
                foreach ($get_play_count_per_track as $count) {
                    $count->track_title =  ( get_the_title( $count->target_url ) )? get_the_title( $count->target_url ): $count->target_title ;
                    $count->target_url = ( get_edit_post_link( $count->target_url ) )? admin_url( 'upload.php?item=' . $count->target_url ): FALSE;
                }

                foreach ($get_download_count_per_track as $count) {
                    $count->track_title =  ( get_the_title( $count->target_url ) )? get_the_title( $count->target_url ): $count->target_title ;
                    $count->target_url = ( get_edit_post_link( $count->target_url ) )? admin_url( 'upload.php?item=' . $count->target_url ): FALSE;
                }

                function get_total_track(){
                    $albums = new WP_Query( array(
                        'post_type' => SR_PLAYLIST_CPT,
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    ) );
                    $tracks = 0;
                    while ($albums->have_posts()) {
                        $albums->the_post();
                        $albumTracks = get_post_meta(get_the_id(),'alb_tracklist', true);
                        $tracks = (is_array($albumTracks)) ? $tracks + count($albumTracks) : 0;
                    }
                    return $tracks;
                }
                
                wp_localize_script( $this->plugin_name, strtr($this->plugin_name, '-', '_'), array(
                'get_play_count_by_day'=> $play_count_by_day,
                'get_play_count_per_page'=> $get_play_count_per_page,
                'get_play_count_per_track'=> $get_play_count_per_track,
                'get_download_count_per_track'=> $get_download_count_per_track,
                'totalPlay' => $sonaar_data->get_play_count($url),
                'totalDownload' => $sonaar_data->get_download_count($url),
                'totalTrack' => get_total_track(),
                'interval'=> array(
                    'start'=> $date1->format('m/d/Y'),
                    'end'=> $date2->format('m/d/Y')
                    ),
                'licence' => get_site_option( 'sonaar_music_licence', '' ),
                'SRMP3_purchased_plan' => get_site_option('SRMP3_purchased_plan'),
                ));              

            }
            
            wp_enqueue_script( $this->plugin_name. 'global', plugin_dir_url( __FILE__ ) . 'js/sonaar-music-pro-admin-global.js', array( 'jquery' ), $this->version, true );
		
            $locale_settings = array(
                'ajax_url' 		=> admin_url('admin-ajax.php'),
                'ajax_nonce' 	=> wp_create_nonce('sonaar_music_pro'),
                'option'        => Sonaar_Music::get_option( 'allOptions' )
            );
            wp_localize_script($this->plugin_name. 'global', 'sonaar_music_pro', $locale_settings);
        }
       
        
    }
private function fetch_meta_data($post_id, $generalfields, $taxonomies) {
    $processed_data = [];
    
    // Get the post title
    if (in_array('post_title', $generalfields)) {
        $post_title = get_the_title($post_id);
        if (!empty($post_title)) {
            $processed_data['post_title'] = sanitize_text_field($post_title);
        }
    }

    // Loop through the defined taxonomies and fetch terms
    if(is_array($taxonomies)){
        foreach ($taxonomies as $taxonomy) {
            $terms = wp_get_post_terms($post_id, $taxonomy);
            if (!empty($terms) && !is_wp_error($terms)) {
                $term_names = array_map(function($term) {
                    return $term->name;
                }, $terms);
                $processed_data[$taxonomy] = sanitize_text_field(implode(', ', $term_names));
            }
        }
    }

    if(function_exists('acf')){
        $acf_get_fields = Sonaar_Music::get_option('srtools_regenerate_acf_field', 'srmp3_settings_tools');
        if(is_array($acf_get_fields)){
            foreach ($acf_get_fields as $field) {
                $acf_field = get_field($field, $post_id);
                
                if (!empty($acf_field)) {
                    if (is_array($acf_field)) {
                        $processed_data['acf_' . $field] = sanitize_text_field(implode(', ', $acf_field));
                    } else {
                        $processed_data['acf_' . $field] = sanitize_text_field($acf_field);
                    }
                }
            }
        }
    }
    if ( function_exists('jet_engine') && jet_engine()->meta_boxes ) {
        $je_get_fields = Sonaar_Music::get_option('srtools_regenerate_jetengine_field', 'srmp3_settings_tools');
        if(is_array($je_get_fields)){
            foreach ($je_get_fields as $field) {
                $je_field = get_post_meta( $post_id,  $field, true );
                if (!empty($je_field)) {
                    if (is_array($je_field)) {
                        $processed_data['jetengine_' . $field] = sanitize_text_field(implode(', ', $je_field));
                    } else {
                        $processed_data['jetengine_' . $field] = sanitize_text_field($je_field);
                    }
                }
            }
        }
    }

    return $processed_data;
}

private function process_data_item($item, $generalfields, $post_id = null) {
    $temp_data = [];

    if (isset($item['track_mp3_id']) && !empty($item['track_mp3_id'])) {
        $attachment_title = get_the_title($item['track_mp3_id']);
        
        if (in_array('track_mp3_title', $generalfields)) {
            $temp_data['track_mp3_title'] = sanitize_text_field($attachment_title);
        }

        $metadata = wp_get_attachment_metadata($item['track_mp3_id']);
        if (in_array('track_mp3_length', $generalfields) && isset($metadata['length']) && !empty($metadata['length'])) {
            // set track duration in seconds
            update_post_meta( $post_id, 'srmp3_track_length', $metadata['length'] );
        }
        if (in_array('track_mp3_album', $generalfields) && isset($metadata['album']) && !empty($metadata['album'])) {
            $temp_data['track_mp3_album'] = sanitize_text_field($metadata['album']);
        }
        if (in_array('track_mp3_artist', $generalfields) && isset($metadata['artist']) && !empty($metadata['artist'])) {
            $temp_data['track_mp3_artist'] = sanitize_text_field($metadata['artist']);
        }
    }
    $new_fields = ['track_description', 'stream_title', 'stream_album', 'artist_name', 'stream_lenght'];
    foreach ($new_fields as $field) {
        if (in_array($field, $generalfields) && isset($item[$field]) && !empty($item[$field])) {
            if($field == 'stream_lenght'){
                // set track duration in seconds
                $timeInSeconds = $this->timeToSeconds($item['stream_lenght']);
                update_post_meta( $post_id, 'srmp3_track_length', $timeInSeconds );
            }else{
                $temp_data[$field] = sanitize_text_field($item[$field]);
            }
        }
    }

    return $temp_data;
}

public function srmp3_customize_cmb2_file_save( $override, $args ) {
    // If it's not our field, don't modify the value.
    if ( $args['field_id'] != 'alb_tracklist' ) {
        return $override;
    }

    $generalfields = Sonaar_Music::get_option('srtools_regenerate_generalfields', 'srmp3_settings_tools');
    $taxonomies = Sonaar_Music::get_option('srtools_regenerate_tax', 'srmp3_settings_tools');

    // Do not index! Check if both are not arrays and return $override
    if (!is_array($generalfields) || !is_array($taxonomies)) {
        return $override;
    }

    $post_id = $args['id'];
    $data = $args['value'];

    // Fetch metadata and process the main data
    $processed_data = $this->fetch_meta_data($post_id, $generalfields, $taxonomies);

    // Process each item in the data array
    foreach ($data as $index => $item) {
        $temp_data = $this->process_data_item($item, $generalfields, $post_id);
        if (!empty($temp_data)) {
            $processed_data[] = $temp_data;
        }
    }

    // Update the post meta with the processed data
    update_post_meta( $post_id, 'srmp3_search_data', $processed_data );

    return $override;
}
private function timeToSeconds($timeStr) {
    $parts = explode(":", $timeStr);
    $parts = array_map('intval', $parts);

    if (count($parts) === 3) { // HH:MM:SS format
        return $parts[0] * 3600 + $parts[1] * 60 + $parts[2];
    } elseif (count($parts) === 2) { // MM:SS format
        return $parts[0] * 60 + $parts[1];
    } else {
        return 0;
    }
}
public function index_alb_tracklist() {
    // Fetch generalfields and taxonomies once at the beginning
    $generalfields = Sonaar_Music::get_option('srtools_regenerate_generalfields', 'srmp3_settings_tools');
    $taxonomies = Sonaar_Music::get_option('srtools_regenerate_tax', 'srmp3_settings_tools');
      // Check if either is null and return if so
      if ($generalfields === null || $taxonomies === null) {
        echo json_encode([
            'message' => 'Error! Save this page first.',
            'progress' => 0,
            'completed' => true,
            'totalPosts' => 0,
            'processedPosts' => 0
        ]);
        wp_die();
    }
    // Arguments to get all products and sr_playlist posts with alb_tracklist meta key.
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $limit = 250; // Process 250 posts at a time. Adjust this value based on your needs.
    
    $args = array(
        'post_type' => Sonaar_Music_Admin::get_cpt($all = true),
        'meta_key'  => 'alb_tracklist',
        'posts_per_page' => $limit,
        'offset' => $offset,
    );

    $query = new WP_Query( $args );

    $totalPosts = $query->found_posts;
    $processedPosts = $offset;

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $post_id = get_the_ID();
            $data = get_post_meta($post_id, 'alb_tracklist', true);

            if ($data && is_array($data)) {
                // Fetch metadata and process the main data
                 $processed_data = $this->fetch_meta_data($post_id, $generalfields, $taxonomies);

                // Process each item in the data array
                foreach ($data as $index => $item) {
                    $temp_data = $this->process_data_item($item, $generalfields, $post_id);
                    if (!empty($temp_data)) {
                        $processed_data[] = $temp_data;
                    }
                }

                // Update the post meta with the processed data
                //error_log("srmp3_search_data: " . print_r($processed_data, true));
                update_post_meta($post_id, 'srmp3_search_data', $processed_data);
                $processedPosts++;
            }
        }

        $progress = ($processedPosts / $totalPosts) * 100;
    }

    $response = array(
        'progress' => isset($progress) ? $progress : 0,  // Ensure that $progress is set
        'message' => '',
        'completed' => ($progress >= 100),
        'totalPosts' => $totalPosts,
        'processedPosts' => $processedPosts
    );

    // Reset post data.
    wp_reset_postdata();
    echo json_encode($response);
    wp_die();
}

    
    public function index_alb_tracklist_for_lazyload_ajax_handler() {
        check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');
        $this->index_alb_tracklist();
        wp_die();
    }
    public function init_options() {

        if(get_site_option('SRMP3_ecommerce') == '1'){
            add_filter( 'cmb2_override_meta_save', array( $this, 'srmp3_customize_cmb2_file_save' ), 10, 2 );
        }

		if ( class_exists( 'Sonaar_Music' )) {
            if (Sonaar_Music::get_option('srmp3_use_built_in_stats', 'srmp3_settings_stats')=='true'){
                $cmb_options = new_cmb2_box( array(
                'id'           		=> 'sonaar_music_pro_network_option_metabox',
                'title'        		=> esc_html__( 'Sonaar Music', 'sonaar-music-pro' ),
                'object_types' 		=> array( 'options-page' ),
                'option_key'      	=> 'sonaar_music_pro', // The option key and admin menu page slug.
                'icon_url'        	=> 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
                'menu_title'      	=> esc_html__( 'Statistics', 'sonaar-music-pro' ), // Falls back to 'title' (above).
                'parent_slug'     	=> 'edit.php?post_type=' . SR_PLAYLIST_CPT, // Make options page a submenu item of the themes menu.
                'capability'      	=> 'manage_options', // Cap required to view options-page.
                'enqueue_js' 		=> false,
                'cmb_styles' 		=> false,
                'display_cb'		=> 'sonaar_music_pro_admin_display',
                'position' 			=> 9999,
                ) );
            }
            $cmb_tools_options = new_cmb2_box( array(
                'id'           		=> 'sonaar_music_pro_tools_network_option_metabox',
                'title'        		=> esc_html__( 'Sonaar Music', 'sonaar-music-pro' ),
                'object_types' 		=> array( 'options-page' ),
                'option_key'      	=> 'sonaar_music_pro_tools', // The option key and admin menu page slug.
                'icon_url'        	=> 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
                'menu_title'      	=> esc_html__( 'Tools', 'sonaar-music-pro' ), // Falls back to 'title' (above).
                'parent_slug'     	=> 'edit.php?post_type=' . SR_PLAYLIST_CPT, // Make options page a submenu item of the themes menu.
                'capability'      	=> 'manage_options', // Cap required to view options-page.
                'enqueue_js' 		=> false,
                'cmb_styles' 		=> false,
                'display_cb'		=> 'sonaar_music_pro_tools_admin_display',
                'position' 			=> 9999,
            ) );
            $cmb_options_license = new_cmb2_box( array(
            
            'id'           		=> 'sonaar_music_pro_license_network_option_metabox',
            'title'        		=> esc_html__( 'Sonaar Music', 'sonaar-music-pro' ),
            'object_types' 		=> array( 'options-page' ),
            'option_key'      	=> 'sonaar_music_pro_license', // The option key and admin menu page slug.
            'icon_url'        	=> 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
            'menu_title'      	=> esc_html__( 'License', 'sonaar-music-pro' ), // Falls back to 'title' (above).
            'parent_slug'     	=> 'edit.php?post_type=' . SR_PLAYLIST_CPT, // Make options page a submenu item of the themes menu.
            'capability'      	=> 'manage_options', // Cap required to view options-page.
            'enqueue_js' 		=> false,
            'cmb_styles' 		=> false,
            'display_cb'		=> 'sonaar_music_pro_license_admin_display',
            'position' 			=> 9999,
            ) );
            
            function sonaar_music_pro_tools_admin_display() {
                require_once plugin_dir_path( __FILE__ ) . 'partials/sonaar-music-pro-tools-display.php';
            }
            
            
            function sonaar_music_pro_admin_display(){       
                if (Sonaar_Music::get_option('srmp3_use_built_in_stats', 'srmp3_settings_stats')!=='true'){
                    return;
                }
                require_once plugin_dir_path( __FILE__ ) . 'partials/sonaar-music-pro-admin-display.php';
            }
            
            function sonaar_music_pro_license_admin_display(){
                require_once plugin_dir_path( __FILE__ ) . 'partials/sonaar-music-pro-license-admin-display.php';
            }
        }
    }
    
    public static function post_stats(){
        check_ajax_referer('sonaar_music_ajax_nonce', 'nonce');

        global $wpdb;
        $sonaar_music_post_data = new Sonaar_Music_Post;
        $request = $_POST['post_stats'];
        
        wp_send_json( $sonaar_music_post_data->log( $request ) );
    }
    
    public static function get_stats(){
        $getStats = $_POST['get_stats'];
        
        
        
        $sonaar_music_get_data = new Sonaar_Music_Get;
        
        $interval = ( $getStats['interval'] !== '' )? $getStats['interval'] : 14 ;
        
        $sonaar_music_get_data->set_interval( $interval );
        
        $countPer = $getStats['count_per'];
        
        switch ($countPer) {
            case 'track':
                wp_send_json( $sonaar_music_get_data->get_play_count_per_track() );
                break;
            
            case 'page':
                wp_send_json( $sonaar_music_get_data->get_play_count_per_page() );
                break;
            
            default:
                $play_count_by_day = $sonaar_music_get_data->get_play_count_by_day() ;
                $dataDate = array();
                $dataCount = array();
                foreach ( $play_count_by_day as $play ) {
                    array_push($dataDate, $play->date);
                    array_push($dataCount, $play->play_count);
            }
            wp_send_json( array(
            'date' => $dataDate,
            'count' => $dataCount
            ) );
            break;
        }
    }


    public function manage_album_columns ($columns){
        
        $iron_cols = array('alb_stats' => '');
        
        $columns = Sonaar_Music_Pro::array_insert($columns, $iron_cols, 'date', 'before');
        
        $columns['date'] = esc_html__('Published', 'sonaar-music-pro');   // Renamed date column
        
        return $columns;
    }


    public function manage_album_custom_column ($column, $post_id){
        switch ($column){
            case 'alb_stats':
                echo '<a href="' . esc_url( get_admin_url( null, 'edit.php?post_type=' . SR_PLAYLIST_CPT  . '&page=sonaar_music_pro&url=') . get_permalink( $post_id ) ) . '"><span class="dashicons dashicons-chart-area"></span></a>';
                
                break;
        }
    }

    public function srmp3_set_mimes($mimes) {
        return array_merge($mimes,array (
            'ttml' => 'text/xml'
        ));
    }
    
	public function srp_check_for_plugin_update($checked_data) {
		
		$sonaar_music_licence = get_site_option('sonaar_music_licence');
        $SRMP3_plan = get_site_option('SRMP3_purchased_plan'); // when license has been revalidated by user clicking the revalidate button and failed (eg: admin has disabled )
	
		if (!$SRMP3_plan || $sonaar_music_licence == '' ) {
			return $checked_data;
		}		
		
		if (empty($checked_data->checked)) {
            return $checked_data;
		}
		
        if ( !empty($checked_data->response) && array_key_exists( PLUGIN_INSTALLATION_NAME, $checked_data->response)){			
            return $checked_data;
		}
		
		if ( isset($checked_data->checked[ PLUGIN_INSTALLATION_NAME ]) && $checked_data->checked[ PLUGIN_INSTALLATION_NAME ] != '' ) {
			$plugin_version = $checked_data->checked[ PLUGIN_INSTALLATION_NAME ];
		} else {
			$plugin_version = SRMP3PRO_VERSION;
		}
		
        $request_args = array(
            'slug' => $this->plugin_name,
            'version' => $plugin_version
        );
        
        $request_string = $this->prepare_request('basic_check', $request_args);
        
		//$api_url = 'https://sonaar.io/api/';
		$api_url = 'https://sonaar.io/wp-json/wp/v2/sonaar-api/version-check/';
        $raw_response = wp_remote_post($api_url, $request_string);
		
        if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
			$response = json_decode( $raw_response['body']);
        
        if (!empty($response)){ // Feed the update data into WP updater            
			
			if ( version_compare( $plugin_version, $response->new_version, '<' ) ) {
				$checked_data->response[ PLUGIN_INSTALLATION_NAME ] = $response;
				$checked_data->checked[ PLUGIN_INSTALLATION_NAME ] = $response->new_version;
			} else {
				$checked_data->no_update[ PLUGIN_INSTALLATION_NAME ] = $response;
				$checked_data->checked[ PLUGIN_INSTALLATION_NAME ] = $plugin_version;
			}
		}
	
        return $checked_data;
    }
    
    public function srp_plugins_list( $plugins ) {
		if ( !empty($plugins) ) {
			if ( isset($plugins['all'][PLUGIN_INSTALLATION_NAME]['slug'])) {
				unset($plugins['all'][PLUGIN_INSTALLATION_NAME]['slug']);
			}
		}
		
		return $plugins;
	}
    
    
    public function prepare_request($action, $args) {
        global $wp_version;
        
        // var_dump($args);

        return array(
            'body' => array(
                'update_action' => $action, 
                'request' 		=> $args,
                'licence' 		=> get_site_option('sonaar_music_licence'),
                'siteurl' 		=> $_SERVER['SERVER_NAME']
            ),
            'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
        );	
    }

	public function srmp3_create_mp3_playlists_ajax() {
        // create MULTIPLE POSTS
		if ( ! current_user_can( 'manage_options' ) ) {
				wp_die(0); 
		}
        check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');
		
		$iron_music_player = get_option( 'iron_music_player' );		
		$post_type    = isset( $_POST['post_type'] ) ? $_POST['post_type'] : SR_PLAYLIST_CPT;  
		$taxonomy     = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : false;
		$iron_music_player['srmp3_posttypes'][] = $post_type;
		$iron_music_player['srmp3_posttypes'] = array_unique($iron_music_player['srmp3_posttypes']);
		update_option( 'iron_music_player', $iron_music_player );	
		
		
		$type         = 'single';
		$product_type = isset( $_POST['product_type'] ) ? $_POST['product_type'] : 'simple';
        $product_download = isset( $_POST['product_download'] ) ? $_POST['product_download'] : 'no';
		$title 		  = isset( $_POST['title'] ) ? $_POST['title'] : 'simple';
		$price 		  = isset( $_POST['price'] ) ? (float) $_POST['price'] : '9.99';
		$alb_tracklist        = array();
		switch ( $type ) {
			case 'single':
				$id    = isset( $_POST['id'] ) ? (int) $_POST['id'] : 0;				
				$track = wp_get_attachment_metadata( $id );
				$post  = get_post( $id );
				if ( $post->post_title ) {
					$track['title'] = $post->post_title;
				}
                $thumbnail_id        = get_post_thumbnail_id( $id );
                $thumbnail_url       = wp_get_attachment_image_src( get_post_thumbnail_id( $id ))[0];
				$file_url            = wp_get_attachment_url( $id );
                $file_download = ($product_download === 'yes') ? $file_url : '';
				$file_hash           = md5( $file_url );
                $song_store_list = '';
				$alb_tracklist[] = array(
					'FileOrStream' 	=> 'mp3',
					'track_mp3_id' 	=> $id,
					'track_mp3' 	=> $file_url,
                    'track_image'   => $thumbnail_url,
                    'song_store_list' => $song_store_list,
                    'woocommerce_download_file' => $file_download
				);				
				break;
			
			default:
				break;
		}

		$post_id = wp_insert_post(
			array(
				'post_title'  => $track['title'],
				'post_status' => 'draft',
				'post_type'   => $post_type,
			)
		);
		
		update_post_meta( $post_id, 'alb_tracklist', $alb_tracklist );
		update_post_meta( $post_id, '_thumbnail_id', $thumbnail_id );
		
		if ( $post_type == 'product') {
            $this->srmp3SetProductAttributes($post_id, $post_type, $product_type, $price, $taxonomy, $alb_tracklist);
		}

		wp_send_json_success();
		
	}
    public function srmp3_create_mp3_playlists_from_import_file_ajax() {
		if ( ! current_user_can( 'manage_options' ) ) {
				wp_die(0); 
		}
		check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');
		
		$iron_music_player = get_option( 'iron_music_player' );		
		$post_type    = isset( $_POST['post_type'] ) ? $_POST['post_type'] : SR_PLAYLIST_CPT;  
		
		$iron_music_player['srmp3_posttypes'][] = $post_type;
		$iron_music_player['srmp3_posttypes'] = array_unique($iron_music_player['srmp3_posttypes']);
		update_option( 'iron_music_player', $iron_music_player );	
		
		
		$type         = 'single';
		$product_type = isset( $_POST['product_type'] ) ? $_POST['product_type'] : 'simple';
        $add_download = ( isset( $_POST['add_download']) && $_POST['add_download'] == 'yes' ) ? 'yes' : 'no';
		$title 		  = isset( $_POST['title'] ) ? $_POST['title'] : 'simple';
		$price 		  = isset( $_POST['price'] ) ? (float) $_POST['price'] : '9.99';
		$alb_tracklist        = array();
		switch ( $type ) {
			case 'single':
				$id    = isset( $_POST['id'] ) ? (int) $_POST['id'] : 0;				
				$track = wp_get_attachment_metadata( $id );
				$post  = get_post( $id );
				if ( $post->post_title ) {
					$track['title'] = $post->post_title;
				}
                $thumbnail_id        = get_post_thumbnail_id( $id );
                $thumbnail_url       = wp_get_attachment_image_src( get_post_thumbnail_id( $id ))[0];
				$file_url            = wp_get_attachment_url( $id );
				$file_hash           = md5( $file_url );
                if ($add_download == 'yes'){
                    $song_store_list[0] = array(
                        'store-icon'=> 'fas fa-download',
                        'store-name'=> 'Download',
                        'store-link'=> $file_url,
                        
                    );
                }else{
                    $song_store_list = '';
                }
				$alb_tracklist[] = array(
					'FileOrStream' 	=> 'mp3',
					'track_mp3_id' 	=> $id,
					'track_mp3' 	=> $file_url,
                    'track_image'   => $thumbnail_url,
                    'song_store_list' => $song_store_list

				);				
				break;
			
			default:
				break;
		}

		$post_id = wp_insert_post(
			array(
				'post_title'  => $track['title'],
				'post_status' => 'draft',
				'post_type'   => $post_type,
			)
		);
		
		update_post_meta( $post_id, 'alb_tracklist', $alb_tracklist );
		update_post_meta( $post_id, '_thumbnail_id', $thumbnail_id );
		
		if ( $post_type == 'product') {
			wp_set_object_terms( $post_id, $product_type, 'product_type' );
			update_post_meta( $post_id, '_visibility', 'visible' );
			update_post_meta( $post_id, '_stock_status', 'instock' );
			update_post_meta( $post_id, 'total_sales', '0' );
			update_post_meta( $post_id, '_virtual', 'yes' );
			update_post_meta( $post_id, '_downloadable', 'yes' );
			update_post_meta( $post_id, '_regular_price', $price );
			update_post_meta( $post_id, '_featured', 'no' );
			update_post_meta( $post_id, '_price', $price );
            update_post_meta( $post_id, 'wc_add_to_cart', 'true' );
		}

		wp_send_json_success();
		
	}
	public function sonaar_music_pro_get_post_id( $data ) {
	
		global $iron_music_player;	
		$srmp3_posttypes = ( isset($iron_music_player['srmp3_posttypes']) && !empty($iron_music_player['srmp3_posttypes']) ) ? $iron_music_player['srmp3_posttypes'] : array(SR_PLAYLIST_CPT);
		
		$post_id = false;

		$args = array(
			'posts_per_page' => 1,
			'post_status'    => 'any',
			'post_type'      => $srmp3_posttypes,
		);

		$meta_query = array();
		$music_type = '';
		if ( isset( $data['file'] ) || isset( $data['id'] ) ) {
			$value	= isset( $data['file'] ) ? $data['file'] : $data['id'];
			
			/*
			$value = '.*s:[0-9]+:"track_mp3";s:[0-9]+:"'.$value.'";*';		
			$meta_query['relation'] = 'AND';
			$meta_query[]           = array(
				'key'     => 'alb_tracklist',
				'value'   => $value,
				'compare' => 'REGEXP',
			);
			*/
			$meta_query[]	= array(
				'key'     => 'alb_tracklist',
				'value'   => $value,
				'compare' => 'LIKE',
			);			
		}
		
		$args['meta_query'] = $meta_query; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
		
		$query = new WP_Query( $args );		
		if ( $query->have_posts() ) {
			$query->the_post();
			$post_id = get_the_ID();
			wp_reset_postdata();
		}
		

		return $post_id;
	}
	public function sonaar_music_pro_get_audio_attachments( $posts_per_page = 20, $paged = 1, $order='desc', $orderby = 'date', $search = '' ) {
		$tracks = array();
		$albums = array();

		$args = array(
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
			'post_type'      => 'attachment',
			'post_mime_type' => 'audio',
			'post_status'    => 'any',
            'orderby'        => $orderby,
            'order'          => $order,
		);

		if ( $search ) {
			$args['s'] = $search;
		}
		$query        = new WP_Query( $args );
		$found_tracks = $query->found_posts;

		if ( $query->have_posts() ) {
			foreach ( $query->posts as $attachment ) {
				$id          = $attachment->ID;
				$track       = wp_get_attachment_metadata( $id );
				$track['id'] = $id;
				$post        = get_post( $id );
                $track['title'] = (isset($track['title'])) ? $track['title'] : '';
				if ( $post->post_title ) {
					$track['title'] = $post->post_title;
				}

				$track_file    = wp_get_attachment_url( $id );
				$track['file'] = $track_file;

				$track['product'] = $this->sonaar_music_pro_get_post_id(
					array(
						'file' => $track_file,
						'id'   => $id,
					)
				);				
				
				$tracks[] = $track;
				if ( isset( $track['album'] ) ) {
					$key = $track['album'];
					if ( ! isset( $albums[ $key ] ) ) {
						$albums[ $key ]           = array();
						$albums[ $key ]['count']  = 0;
						$albums[ $key ]['tracks'] = array();
					}
					$albums[ $key ]['count']++;
					$albums[ $key ]['tracks'][] = $track['id'];
				}
                

			}
			foreach ( $albums as $title => $album ) {
				$album['product'] = $this->sonaar_music_pro_get_post_id( array( 'album' => $title ) );
				$album['tracks']  = implode( ',', $album['tracks'] );
				$albums[ $title ] = $album;
			}
		}
        if($orderby == 'title'){
            // Sort the array based on the 'title' field and the desired order
            usort($tracks, function($a, $b) use ($order) {
                if ($order === 'asc') {
                    return strcasecmp($a['title'], $b['title']);
                } else {
                    return strcasecmp($b['title'], $a['title']);
                }
            });
        }
		return array(
			'tracks'       => $tracks,
			'found_tracks' => $found_tracks,
		);
	}
	public function sonaar_music_pro_inputs( $posts_per_page = 20, $paged = 1, $order = 'desc', $orderby = 'date', $search = ''  ){
		//var_dump($orderby);
        $result = $this->sonaar_music_pro_get_audio_attachments( $posts_per_page, $paged, $order, $orderby, $search );
		if ( $result ) {
			$tracks       = $result['tracks'];
			$found_tracks = $result['found_tracks'];
			$per_page     = $posts_per_page;
		} else {
			return false;
		}
		$track_inputs = '';
		
		foreach ( $tracks as $track ) {
			$id       = esc_attr( $track['id'] );
			$title    = esc_attr( $track['title'] );
			$length   = esc_html( isset( $track['length_formatted'] ) ? $track['length_formatted'] : '' );
            $album    = esc_html( ( isset( $track['album'] ) && $track['album'] != null) ? $track['album']  . ' - ' : '' );
			$file     = esc_html( basename( $track['file'] ) );
			$product  = $track['product'];
			$disabled = $product > 0 ? 'disabled' : '';

			$track_inputs .= "<div><input type='checkbox' name='music_track_$id' value='$id'  data-title='$title' /><span class='$disabled'><strong>$title</strong> – $album $length ($file) [ID: $id]</span></div>";
		}
		$args = array(
			'base'      => '%_%',
			'format'    => '#%#%',
			'current'   => (int) $paged,
			'total'     => ceil( $found_tracks / $posts_per_page ),
			'prev_text' => '<',
			'next_text' => '>',
		);
		// translators: %s is the number of tracks found.
		$found_tracks_label = '<span class="found-tracks">' . sprintf( esc_attr( _n( '%s track', '%s tracks', $found_tracks, 'sonaar-music-pro' ) ), number_format_i18n( $found_tracks ) ) . '</span>'; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		require_once ABSPATH . 'wp-admin/includes/template.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-screen.php';
		$pagination = new \WP_List_Table( array( 'ajax' => true ) );
		$pagination->set_pagination_args(
			array(
				'total_items' => $found_tracks,
				'total_pages' => ceil( $found_tracks / $posts_per_page ),
				'per_page'    => $posts_per_page,
			)
		);

		ob_start();
		?>

		<div class="tablenav-pages">
			<?php $pagination->pagination( 'top' ); ?>
		</div>

		<?php
		$paginate_links = ob_get_clean(); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		return array(
			'track_inputs'   => $track_inputs,
			'paginate_links' => $paginate_links,
			'found_tracks'   => $found_tracks,
		);
	}
	public function srmp3_update_mp3_playlists_ajax() {
		
		if ( ! current_user_can( 'manage_options' ) ) {
				wp_die(0); 
		}
		check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');

		$per_page = isset( $_POST['per_page'] ) ? $_POST['per_page'] : 20;  
		$paged    = isset( $_POST['paged'] ) ? $_POST['paged'] : 1;  
		$search   = isset( $_POST['search'] ) ? $_POST['search'] : '';
        $orderby = isset( $_POST['orderby'] ) ? $_POST['orderby'] : 'date';
		$order    = isset( $_POST['order'] ) ? $_POST['order'] : 'desc';
		$mp3_lists_inputs = $this->sonaar_music_pro_inputs($per_page, $paged, $order, $orderby, $search);
		if ( $mp3_lists_inputs ) {
			$music_playlists	= $mp3_lists_inputs['track_inputs'];
			$paginate_info		= $mp3_lists_inputs['paginate_links'];
			wp_send_json_success(
				array(
					'music_playlists'   => $music_playlists,
					'paginate_info'		=> $paginate_info,
				)
			);
		}
		wp_send_json_error( array( 'message' => esc_html__( 'An error occurred while retrieving the audio attachments lists.', 'sonaar-music-pro' ) ) );
	}
	
	public function srmp3_create_single_mp3_playlists_ajax() {
        // CREATE ONE POST ONLY
		if ( ! current_user_can( 'manage_options' ) ) {
				wp_die(0); 
		}
		check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');
		$iron_music_player = get_option( 'iron_music_player' );		
		$post_type    = isset( $_POST['post_type'] ) ? $_POST['post_type'] : SR_PLAYLIST_CPT;  
		$taxonomy     = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : false;
		$iron_music_player['srmp3_posttypes'][] = $post_type;
		$iron_music_player['srmp3_posttypes'] = array_unique($iron_music_player['srmp3_posttypes']);
		update_option( 'iron_music_player', $iron_music_player );		
		
		$type         = 'single';
		$product_type = isset( $_POST['product_type'] ) ? $_POST['product_type'] : 'simple';
        $product_download = isset( $_POST['product_download'] ) ? $_POST['product_download'] : 'no';
       // $add_download = ( isset( $_POST['add_download']) && $_POST['add_download'] == 'yes' ) ? 'yes' : 'no';
		$mp3_id = isset( $_POST['mp3_id'] ) ? json_decode(stripslashes($_POST['mp3_id']), true ): '';		
		
		$price = isset( $_POST['price'] ) ? (float) $_POST['price'] : '9.99';
		$alb_tracklist        = array();
		switch ( $type ) {
			case 'single':
				$mp3_id = isset( $_POST['mp3_id'] ) ? json_decode(stripslashes($_POST['mp3_id']), true ): '';
				$track = wp_get_attachment_metadata( $mp3_id[0] );
				$post  = get_post( $mp3_id[0] );
				if ( $post->post_title   ) {
					$track['title'] = $post->post_title;
				}
				
				$attachment_metadata = get_post_meta($mp3_id[0] ,'_wp_attachment_metadata', true );
				if ( isset($attachment_metadata['album']) && $attachment_metadata['album'] != '' ) {
					$track['title'] = $attachment_metadata['album'];
				}
				$thumbnail_id       = get_post_thumbnail_id( $mp3_id[0] );
				
				
				foreach( $mp3_id as $id) {
                    $thumbnail_info = wp_get_attachment_image_src(get_post_thumbnail_id($id));
                    if (is_array($thumbnail_info)) {
                        $thumbnail_url = $thumbnail_info[0];
                    } else {
                        // Handle the case where no image is found (e.g., set a default URL or display an error message).
                        $thumbnail_url = ''; // Replace with your default URL.
                    }
                    $file_url            = wp_get_attachment_url( $id );
                    $file_download = ($product_download === 'yes') ? $file_url : '';
					$file_hash           = md5( $file_url );
                    $song_store_list     = '';
					$alb_tracklist[] = array(
						'FileOrStream' 	=> 'mp3',
						'track_mp3_id' 	=> $id,
						'track_mp3' 	=> $file_url,
                        'track_image'   => $thumbnail_url,
                        'song_store_list' => $song_store_list,
                        'woocommerce_download_file' => $file_download
					);
				}
				
				break;
			
			default:
				break;
		}		
		
		$post_id = wp_insert_post(
			array(
				'post_title'  => $track['title'],
				'post_status' => 'draft',
				'post_type'   => $post_type,
			)
		);
		
		update_post_meta( $post_id, 'alb_tracklist', $alb_tracklist );
		update_post_meta( $post_id, '_thumbnail_id', $thumbnail_id );
		
		if ( $post_type == 'product') {
            $this->srmp3SetProductAttributes($post_id, $post_type, $product_type, $price, $taxonomy, $alb_tracklist);
		}

		wp_send_json_success();
	}

    // Function to create a new product variation
    public function create_product_variation( $product_id, $variation_data ) {
        $variation = new WC_Product_Variation();
        $variation->set_parent_id( $product_id );
        
        foreach ( $variation_data as $key => $value ) {
            $variation->{"set_$key"}( $value );
        }
        
        $variation->save();
        
        return $variation->get_id();
    }

   
    public function srmp3_create_single_mp3_playlists_from_import_file_ajax() {
        if (!current_user_can('manage_options')) {
            wp_die(0);
        }
        check_ajax_referer('sonaar_music_admin_ajax_nonce', 'nonce');
        $response = array();
    
        // Check if file was uploaded successfully
        if ($_FILES['file']['error'] == 0) {
            // Get file name and extension
            $filename = basename($_FILES['file']['name']);
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            // Check if file is a CSV file
            if ($extension == 'csv') {
                // Set up temporary upload folder
                $upload_dir = wp_upload_dir();
                $temp_folder = $upload_dir['basedir'] . '/temp';
                if (!is_dir($temp_folder)) {
                    mkdir($temp_folder);
                }
                // Move uploaded file to temporary folder
                $temp_file = $temp_folder . '/' . $filename;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $temp_file)) {
                    $post_type = isset($_POST['post_type']) ? $_POST['post_type'] : SR_PLAYLIST_CPT;
                    $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : 'simple';
                    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : false;
                    $price = isset($_POST['price']) ? (float)$_POST['price'] : '9.99';
                    $multiple_post = isset($_POST['multiple']) ? filter_var($_POST['multiple'], FILTER_VALIDATE_BOOLEAN) : false;
                    $cat_taxonomy = ($post_type == 'product') ? 'product_cat' : (($post_type == 'sr_playlist') ? 'playlist-category' : '');
    
                    // Process the CSV File and get the content
                    $sonaar_music_widget = new Sonaar_Music_Widget();
                    $playlists = $sonaar_music_widget->importFile($temp_file, null, false); // return an array
                    $count = 0;
                    $imported_images = array();
                    foreach ($playlists as $playlist) {
                        $alb_tracklist = array();
                        $post_title = ($playlist['playlist_name'] != '') ? $playlist['playlist_name'] : $playlist['tracks'][0]['album_title'];
    
                        foreach ($playlist['tracks'] as $track) {
                            $track_info = array(
                                'FileOrStream' => 'stream',
                                'stream_title' => $track['track_title'],
                                'stream_link' => $track['mp3'],
                                'track_image' => $track['poster'],
                                'song_store_list' => $track['song_store_list'],
                                'stream_album' => $track['album_title'],
                                'artist_name' => $track['track_artist'],
                                'stream_length' => $track['length'],
                                'woocommerce_download_file' => $track['woocommerce_download_file'],
                                'has_lyric' => $track['has_lyric'],
                                'track_description' => $track['description'],
                                'track_lyrics' => $track['track_lyrics'],
                            );
    
                            // Create a post for each track or accumulate tracks for a single post
                            $alb_tracklist[] = $track_info;
                            if ($multiple_post) {
                                $this->create_post($post_type, $product_type, $price, $taxonomy, $cat_taxonomy, $track, array($track_info), $imported_images);
                                $count++;
                            }
                        }
    
                        if (!$multiple_post) {
                            // Create a single post for all tracks
                            $this->create_post($post_type, $product_type, $price, $taxonomy, $cat_taxonomy, $playlist['tracks'][0], $alb_tracklist, $imported_images, $post_title);
                            $count++;
                        }
                    }
    
                    $response['success'] = true;
                    $response['itemsCount'] = $count;
                    $response['playlists'] = $playlists;
                    $response['message'] = 'CSV File imported and post(s) have been created! 🎉';
                } else {
                    $response['success'] = false;
                    $response['message'] = "⚠️ Error moving CSV file to temporary folder";
                }
            } else {
                $response['success'] = false;
                $response['message'] = "⚠️ Error: Please upload a CSV file";
            }
        } else {
            $response['success'] = false;
            $response['message'] = "⚠️ Error uploading CSV file: " . $_FILES['file']['error'];
        }
    
        wp_send_json($response);
        wp_die();
    }
    
    private function create_post($post_type, $product_type, $price, $taxonomy,$cat_taxonomy, $track, $alb_tracklist, &$imported_images, $post_title = '') {
        $post_title = ($post_title == '') ? $track['track_title'] : $post_title;
        $post = array(
            'post_title'   => $post_title,
            'post_content' => '', // Add content if needed
            'post_status'  => 'draft',
            'post_type'    => $post_type
        );
    
        $post_id = wp_insert_post($post);
    
        if (!is_wp_error($post_id)) {

            update_post_meta($post_id, 'alb_tracklist', $alb_tracklist);
            update_post_meta($post_id, 'alb_release_date', $track['release_date']);
    
            if ($post_type == 'product') {
                $this->srmp3SetProductAttributes($post_id, $post_type, $product_type, $price, $taxonomy, $alb_tracklist);
            }
    
            $featured_image = $track['playlist_image'];
            // Set featured image
            if (!empty($featured_image)) {
                // Check if the image is already in the media library
                $attachment_id = attachment_url_to_postid($featured_image);
            
                // If the image is not found in the media library, import it
                if (!$attachment_id) {
                    if (array_key_exists($featured_image, $imported_images)) {
                        // Use the previously imported image
                        $attachment_id = $imported_images[$featured_image];
                    } else {
                        // Import the image and store its attachment ID
                        $attachment_id = media_sideload_image($featured_image, $post_id, '', 'id');
                        if (!is_wp_error($attachment_id)) {
                            $imported_images[$featured_image] = $attachment_id;
                        }
                    }
                }
            
                // Set the featured image for the post
                if (!is_wp_error($attachment_id) && $attachment_id) {
                    set_post_thumbnail($post_id, $attachment_id);
                } else {
                    // Handle error, for example, log or display an error message
                    $error_message = "Warning: Featured image not imported. ";
                    if (is_wp_error($attachment_id)) {
                        $error_message .= $attachment_id->get_error_message();
                    }
                }
            }
            if (!empty($cat_taxonomy) && !empty($track['category_slug'])) {
                $slugs = array_map('trim', explode(',', $track['category_slug']));
                $category_ids = [];
                foreach ($slugs as $slug) {
                    $category = get_term_by('slug', $slug, $cat_taxonomy);
                    if (!$category) {
                        // Term doesn't exist, so create it
                        $new_term = wp_insert_term(
                            $slug, // the term 
                            $cat_taxonomy, // the taxonomy
                            array('slug' => $slug)
                        );
                        // Check if there was an error creating the term
                        if (!is_wp_error($new_term)) {
                            $term_id = $new_term['term_id'];
                        } else {
                            // Log the error or handle it as needed
                            continue; // Skip this term and continue with the next one
                        }
                    } else {
                        $term_id = $category->term_id;
                    }
                    if (isset($term_id)) {
                        $category_ids[] = $term_id;
                    }
                }
        
                if (!empty($category_ids)) {
                    // Use the correct taxonomy here as well
                    wp_set_object_terms($post_id, $category_ids, $cat_taxonomy);
                }
            }
        } else {
            
            // Handle error, for example, log or display an error message
            $error_message = "Warning: Post creation failed. " . $post_id->get_error_message();
        }
    }

    public function srmp3SetProductAttributes($post_id, $post_type, $product_type, $price, $taxonomy = false, $alb_tracklist = false){
        // once the post is created, we need to set the product type

        wp_set_object_terms( $post_id, $product_type, 'product_type' );
        update_post_meta( $post_id, '_visibility', 'visible' );
        update_post_meta( $post_id, '_stock_status', 'instock' );
        update_post_meta( $post_id, 'total_sales', '0' );
        update_post_meta( $post_id, '_virtual', 'yes' );
        update_post_meta( $post_id, '_downloadable', 'yes' );
        update_post_meta( $post_id, '_regular_price', $price );
        update_post_meta( $post_id, '_featured', 'no' );
        update_post_meta( $post_id, '_price', $price );
        update_post_meta( $post_id, 'wc_add_to_cart', 'true' ); // set the add to cart button to true
       
        if($product_type == 'simple'){
            $files = array();
            // Loop through the $alb_tracklist array
            foreach ($alb_tracklist as $track) {
                
                if (!empty($track['woocommerce_download_file'])) {
                    if($track['stream_title']){
                        $download_title = $track['stream_title'];
                    }else{
                        //get track title from track_mp3_id
                        $track_file = wp_get_attachment_metadata( $track['track_mp3_id'] );
                        $download_title =  $track_file['title'];
                    }

                    $download_file_ar = array(
                        'file' =>  $track['woocommerce_download_file'], // URL of the downloadable file
                        'name' =>  $download_title, // Display name for the downloadable file
                    );
            
                    // Add the downloadable file to the $files array
                    $files[md5($download_file_ar['file'])] = $download_file_ar;

                }
            }
            
            // Add the downloadable files to the product
            if (!empty($files)) {
                update_post_meta($post_id, '_downloadable_files', $files);
            }
        }
        if($product_type == 'variable' && $taxonomy){
            
            // Fetch all existing terms in the 'pa_license' taxonomy
            $license_terms = get_terms( array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ) );

            // Collect the slugs of all terms
            $license_term_slugs = array();
            if ( !is_wp_error( $license_terms ) && !empty( $license_terms ) ) {
                foreach ( $license_terms as $term ) {
                    $license_term_slugs[] = $term->slug;
                }
            }

            // Assign all existing terms to the product
            wp_set_object_terms( $post_id, $license_term_slugs, $taxonomy, true );

            // Update the product attributes meta
            $attributes = get_post_meta( $post_id, '_product_attributes', true );
            if ( !is_array( $attributes ) ) {
                $attributes = array();
            }
            $attributes[$taxonomy] = array(
                'name' => $taxonomy,
                'value' => $license_term_slug,
                'position' => '0', // You can change the position if needed
                'is_visible' => '1',
                'is_variation' => '1',
                'is_taxonomy' => '1',
            );
            update_post_meta( $post_id, '_product_attributes', $attributes );
            // Get the 'pa_license' attribute terms
            $license_terms = wc_get_product_terms( $post_id, $taxonomy, array( 'fields' => 'all' ) );

            // Create a variation for each 'pa_license' term
            foreach ( $license_terms as $license_term ) {
                 // Get the default price for the term
                $term_default_price = (get_term_meta( $license_term->term_id, '_srmp3_license_default_price', true )) ? get_term_meta( $license_term->term_id, '_srmp3_license_default_price', true ) : $price;
                
                $variation_data = array(
                    'attributes' => array(
                        $taxonomy => $license_term->slug,
                    ),
                    'regular_price' => $term_default_price, // Use the term's default price as the regular price for the variation
                    'sale_price' => '', // Set the sale price for the variation (if applicable)
                    'stock_quantity' => '', // Set the stock quantity for the variation (if applicable)
                    'weight' => '', // Set the weight for the variation (if applicable)
                    'length' => '', // Set the length for the variation (if applicable)
                    'width' => '', // Set the width for the variation (if applicable)
                    'height' => '', // Set the height for the variation (if applicable)
                    'sku' => '', // Set the SKU for the variation (if applicable)
                    'tax_class' => '', // Set the tax class for the variation (if applicable)
                    'image_id' => '', // Set the image ID for the variation (if applicable)
                    'downloadable' => 'yes',
                    'virtual' => 'yes',
                );
                // Create the variation
                $variation_id = $this->create_product_variation( $post_id, $variation_data );
                // Prepare the downloadable files array
                $files = array();

                // Loop through the $alb_tracklist array
                foreach ($alb_tracklist as $track) {
                    if (!empty($track['woocommerce_download_file'])) {
                        if($track['stream_title']){
                            $download_title = $track['stream_title'];
                        }else{
                            //get track title from track_mp3_id
                            $track_file = wp_get_attachment_metadata( $track['track_mp3_id'] );
                            $download_title =  $track_file['title'];
                        }
    
                        $download_file_ar = array(
                            'file' =>  $track['woocommerce_download_file'], // URL of the downloadable file
                            'name' =>  $download_title, // Display name for the downloadable file
                        );
                
                        // Add the downloadable file to the $files array
                        $files[md5($download_file_ar['file'])] = $download_file_ar;
                    }
                }

                // Add the downloadable files to the variation
                if (!empty($files)) {
                    update_post_meta($variation_id, '_downloadable_files', $files);
                }
            }
        }
    }
    public function register_widget(){
        if ( class_exists( 'Sonaar_Filters_Widget' ) ){
            register_widget( 'Sonaar_Filters_Widget' );
            register_widget( 'Sonaar_Search_Widget' );
            register_widget( 'Sonaar_Chips_Widget' );
        }
    }
    public function srmp3_pro_add_shortcode(){

        function sonaar_shortcode_time_stamp($atts, $content = null) {

            /* Enqueue Sonaar Music related CSS and Js file */ 
    		wp_enqueue_style( 'sonaar-music' );
    		wp_enqueue_style( 'sonaar-music-pro' );
    		wp_enqueue_script( 'sonaar-music-mp3player' );
    		wp_enqueue_script( 'sonaar-music-pro-mp3player' );
    		wp_enqueue_script( 'sonaar_player' );
    		if ( function_exists('sonaar_player') ) {
    			add_action('wp_footer','sonaar_player', 12);
    		}

            extract(shortcode_atts(array(
                'post_id' => '',
                'widget_id' => '',
                'track_id' => '0',
                'time' => '0',
                'button' => '',
                'play_icon' => '',
                'font_size' =>'',
                'color' => '',
                'background_color' => '',
                'text' => '',
                'text_pause' => '',
                'block' => ''
            ), $atts));
            $params = [];
            if($post_id != '' && is_numeric($post_id) ){
                array_push($params, "id:'". $post_id ."'");
            }
            $content = ($text != '') ? $text : $content;
            $text_pause = ($text_pause !='') ? $text_pause : '';
            $shortcode_classname = ($button === 'true') ? 'srmp3_sonaar_ts_shortcode srmp3_sonaar_ts_shortcode_button' : 'srmp3_sonaar_ts_shortcode';
            $shortcode_classname .= ($play_icon === 'true') ? ' sricon-play': '';
            $shortcode_classname .= ($block === 'true') ? ' srmp3_sonaar_ts--block': '';
        
            $style = ($color != '' || $background_color != '' || $font_size != '') ? 'color:'. $color .';background-color:' . $background_color . ';font-size:' . $font_size . ';' : '';
            $style .=($play_icon === 'true') ? 'text-decoration:none;': '';
            if($track_id != '0' && is_numeric($track_id ) ){
                $track_id = (float)(((int)$track_id )- 1);
            }else{
                $track_id = '0'; 
            }

            if($widget_id != ''){
                array_push($params, "widget_id:'". sanitize_text_field($widget_id) ."'");
            } 

            $timeArray = explode(':',  $time);
            if ( !(count( $timeArray ) === count( array_filter( $timeArray, 'is_numeric' ) )) ) { //if time doesnt have format "00:00" set it to '0'
                $time = '0';
            }
            
            $shortcodeID = uniqid();
            array_push($params, "trackid:'". $track_id ."'", "time:'". $time ."'", "ts_id:'". $shortcodeID ."'", "play_icon:'". $play_icon ."'");
            
            $buttonLabel = ($text_pause != '')?"<span class=\"srp_ts_content\">" .$content."</span><span class=\"srp_ts_content_pause\">" . $text_pause ."</span>": $content;

            return "<a id=\"". "sonaar_ts-". $shortcodeID ."\" class=\"" . $shortcode_classname . "\"  style=\"" . $style . "\" href=\"javascript:sonaar_ts_shortcode({ ". implode(', ', $params) ." }) ;\">".$buttonLabel."</a>";
         
        }
        function sonaar_shortcode_lyrics($atts, $content = null) {
           return '<div class="srmp3_lyrics_shortcode_container"><div class="srmp3_lyrics"></div></div>';
        }
        function sonaar_shortcode_filters( $atts ) {
            extract( shortcode_atts( array(
                'title' => '',
            ), $atts ) );
            
            ob_start();
            
            the_widget('Sonaar_Filters_Widget', $atts, array('widget_id'=>'arbitrary-instance-'.uniqid(), 'before_widget'=>'<div class="sonaar_filters">', 'after_widget'=>'</div>'));
                $output = ob_get_contents();
                ob_end_clean();
                
                return $output;
        }
        function sonaar_shortcode_search( $atts ) {
            extract( shortcode_atts( array(
                'title' => '',
            ), $atts ) );
            
            ob_start();
            
            the_widget('Sonaar_Search_Widget', $atts, array('widget_id'=>'arbitrary-instance-'.uniqid(), 'before_widget'=>'<div class="sonaar_search">', 'after_widget'=>'</div>'));
                $output = ob_get_contents();
                ob_end_clean();
                
                return $output;
        }
        function sonaar_shortcode_chips( $atts ) {
            extract( shortcode_atts( array(
                'title' => '',
            ), $atts ) );
            
            ob_start();
            
            the_widget('Sonaar_Chips_Widget', $atts, array('widget_id'=>'arbitrary-instance-'.uniqid(), 'before_widget'=>'<div class="sonaar_chips">', 'after_widget'=>'</div>'));
                $output = ob_get_contents();
                ob_end_clean();
                
                return $output;
        }
        add_shortcode( 'sonaar_lyrics_placeholder', 'sonaar_shortcode_lyrics' );
        add_shortcode( 'sonaar_ts', 'sonaar_shortcode_time_stamp' );
        if(get_site_option('SRMP3_ecommerce') == '1'){
            add_shortcode( 'sonaar_license', [SRMP3_WooCommerce::class, 'sonaar_shortcode_license']);
        }
        add_shortcode( 'sonaar_filters', 'sonaar_shortcode_filters' );
        add_shortcode( 'sonaar_search', 'sonaar_shortcode_search' );
        add_shortcode( 'sonaar_chips', 'sonaar_shortcode_chips' );
    }

    /* Return TRUE if the POST has track set in the post settings */
    public static function ifPostHasTrack($post){
        $album_tracks = get_post_meta( $post, 'alb_tracklist', true );
        if( is_array($album_tracks) && is_array($album_tracks[0]) && count($album_tracks[0]) > 1 ){
            return true;
        }else{
            return false;
        }
    }

}