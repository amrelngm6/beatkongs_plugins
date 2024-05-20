<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       sonaar.io
 * @since      1.0.0
 *
 * @package    Sonaar_Music_Pro
 * @subpackage Sonaar_Music_Pro/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sonaar_Music_Pro
 * @subpackage Sonaar_Music_Pro/public
 * @author     Edouard Duplessis <eduplessis@gmail.com>
 */

class Sonaar_Music_Pro_Public {


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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		if(!defined('SR_PLAYLIST_CPT'))
		return;
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

		wp_register_style( 'sonaar-music-pro', plugin_dir_url( __FILE__ ) . 'css/sonaar-music-pro-public.css', array(), $this->version, 'all' );
		/* Enqueue Sonnar Music css file on single Album Page */
		if ( is_single() && get_post_type() == SR_PLAYLIST_CPT ) {
			wp_enqueue_style( 'sonaar-music-pro' );
		}
		wp_register_style( 'srp-swiper-style', plugin_dir_url( __FILE__ ) . 'css/swiper-bundle.min.css', array(), '9.3.2', 'all' );
	}
//Get the option from the first playlist post in the player playlist when it is set from the page settings.
public function getOptionFromPlaylistPost($ID, $optionName ){
	$result = get_post_meta( $ID, 'sonaar_footer_player_meta', true );
	if(is_array($result)){
		$result = get_post_meta( $result[0], $optionName, true);
	}else{
		$result ='';
	}	
	return $result;
}
	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		if ( !class_exists( 'Sonaar_Music' ) ){
            return;
        }
		global $post, $wp;
		
		/* return script when page  not found (404) */
		if ( is_404() ) {
			return;
		}
		wp_register_script( 'sonaar-music-pro', plugin_dir_url( __FILE__ ) . 'js/sonaar-music-pro-public.js', array( 'jquery' ), $this->version, false );
		wp_register_script( 'sonaar-music-scrollbar', plugin_dir_url( __FILE__ ) . 'js/perfect-scrollbar.min.js', array( 'jquery' ), $this->version, false );
		wp_deregister_script( 'sonaar-music-mp3player' );
		wp_register_script( 'sonaar-music-pro-mp3player', plugin_dir_url( __FILE__ ) . 'js/iron-audioplayer/iron-audioplayer.js', array( 'jquery', 'sonaar-music', 'sonaar-music-pro' ,'moments', 'jquery-ui-slider' ), $this->version, true );
		wp_register_script( 'srp-swiper', plugin_dir_url( __FILE__ ) . 'js/swiper-bundle.min.js', array(), '9.3.2', true  );
		wp_register_script( 'sonaar-list', plugin_dir_url( __FILE__ ) . 'js/list.min.js', array(), $this->version, false );
		wp_register_script( 'color-thief', plugin_dir_url( __FILE__ ) . 'js/color-thief.min.js', array(), $this->version, false );
		
		$playlists = $this->getUserPlaylists();
		
		wp_localize_script( $this->plugin_name . '-mp3player', 'sonaar_music', array(
			'plugin_dir_url'=> plugin_dir_url( __FILE__ ),
			'plugin_dir_url_free'=> (defined('SRMP3_DIR_PATH')) ? plugin_dir_url(SRMP3_DIR_PATH. 'sonaar-music.php') : '',
			'plugin_version_free'=>(new Sonaar_Music)->get_version(),
			'plugin_version_pro'=> $this->version,
			'SRMP3_ecommerce' => get_site_option('SRMP3_ecommerce'),
			'SRMP3_purchased_plan' => esc_html(printPurchasedPlan()),
			'option' => Sonaar_Music::get_option( 'allOptions' ),
			'ajax' => array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'sonaar_music_ajax_nonce' ),
				'ajax_nonce_peaks' => wp_create_nonce( 'sonaar_music_ajax_peaks_nonce' ),
			),
			'current_page' => array(
				'title' => ( isset ($post) ) ? get_the_title( $post->ID ) : '',
				'url' => home_url($_SERVER['REQUEST_URI'])
			),
			'postID' => ( isset ($post) ) ? $post->ID  : '',
			'playlists' => $playlists,
		));

		if(null!==Sonaar_Music::get_option('srmp3_ga_tag', 'srmp3_settings_stats') && Sonaar_Music::get_option('srmp3_ga_tag', 'srmp3_settings_stats') != ''){
			add_action( 'wp_head', 'srp_analytics_embed', 12 );
		}
		//--Player footer----------------
		
		wp_register_script( 'vuejs', plugin_dir_url( __DIR__ ) . 'public/js/vue.min.js' , array(), '2.6.14', true );


		// Register the script
		wp_register_script( 'sonaar_player', plugin_dir_url( __FILE__ ) . 'js/sonaarPlayer.js', array( 'jquery','jquery-ui-draggable', 'sonaar-music-pro', 'sonaar-music-scrollbar' ,'moments', 'sonaar-music-pro-mp3player','vuejs' ), $this->version, true  );
	
		// Localize the script with new data
		$sonaar_player_data = array(
			'sonaar_music' => array(
				'mostRecentId' => ( wp_get_recent_posts(array('post_type'=>SR_PLAYLIST_CPT, 'post_status' => 'publish', 'numberposts' => 1)) ) ? wp_get_recent_posts(array('post_type'=>SR_PLAYLIST_CPT, 'post_status' => 'publish', 'numberposts' => 1))[0]["ID"]: '',
				'currentPostId' => get_the_ID(),
				'continuous_artist_name' => Sonaar_Music::get_option('show_artist_name', 'srmp3_settings_general'),
				'footer_albums' => ( isset ($post) ) ? get_post_meta( get_queried_object_id(), 'sonaar_footer_player_meta', true ) : '',
				'footer_albums_shuffle' => ( isset ($post) ) ? get_post_meta( get_queried_object_id(), 'sonaar_footer_player_shuffle_meta', true) : '',
				'no_loop_tracklist'=> ( isset ($post) ) ? $this->getOptionFromPlaylistPost($post->ID, 'no_loop_tracklist') : '',
				'no_track_skip'=> ( isset ($post) ) ? $this->getOptionFromPlaylistPost($post->ID, 'no_track_skip') : '',
				'post_player_type'=> ( isset ($post) ) ? $this->getOptionFromPlaylistPost($post->ID, 'post_player_type') : '',
				'ga_tag' => Sonaar_Music::get_option('srmp3_ga_tag', 'srmp3_settings_stats'),
				'play_button_label' => array(
					'play' => __('Play', 'sonaar-music-pro'),
					'pause' => __('Pause', 'sonaar-music-pro')
				)
			),
			'site_url'=> esc_url( home_url('/') ),
			'is_logged_in' => is_user_logged_in() ? 'yes' : 'no',
		);
		wp_localize_script( 'sonaar_player', 'srp_vars', $sonaar_player_data );

		// Enqueued script with localized data.

		/* Enqueue Sonnar Music Pro mp3player js file on single Album Page */
		if ( ( is_single() && get_post_type() == SR_PLAYLIST_CPT ) || class_exists('\abs\Abs_Plugin' ) ){
			wp_enqueue_script( 'sonaar-music-pro-mp3player' );
			wp_enqueue_script( 'sonaar_player' );
			add_action('wp_footer','sonaar_player', 12);
		}

		/* Enqueue Sonaar Music Pro mp3player js file Conditions */;
		include_once(ABSPATH.'wp-admin/includes/plugin.php');
		if(
			isset($post) && get_post_meta( $post->ID, 'sonaar_footer_player_meta', true ) != '' && get_post_meta( $post->ID, 'sonaar_footer_player_meta', true ) != [''] || // when the option "Display Audio player footer" is enable  
			class_exists('\abs\Abs_Plugin' ) ||
			Sonaar_Music::get_option('overall_sticky_playlist', 'srmp3_settings_sticky_player') !='' || // when the global player option is enable  
			Sonaar_Music::get_option('enable_continuous_player', 'srmp3_settings_sticky_player') == 'true' && isset($_COOKIE['sonaar_mp3_player_settings']) || // when the continuous player is enable and a cookie is already set.  
		 	(class_exists('Iron_sonaar'))?true:false || // If Sonaar Theme is activated
			Sonaar_Music::get_option('always_load_scripts', 'srmp3_settings_general') == 'on' || // If option "Load Sonaar Scripts on Every Pages" is Enable
			Sonaar_Music::get_option('wc_enable_licenses_cpt', 'srmp3_settings_woocommerce') == 'true' && class_exists( 'WooCommerce' ) && ( is_cart() || is_checkout() || is_account_page() || is_shop() ) // load JS to for the PREVIEW LICENSE Button	
		){
			wp_enqueue_style( 'sonaar-music' );
			wp_enqueue_style( 'sonaar-music-pro' );
			wp_enqueue_script( 'sonaar-music-mp3player' );
			wp_enqueue_script( 'sonaar-music-pro-mp3player' );
			wp_enqueue_script( 'sonaar_player' );
			wp_enqueue_script( 'color-thief' );
			if ( function_exists('sonaar_player') ) {
				add_action('wp_footer','sonaar_player', 12);
			}
		}
	}

	public function getUserPlaylists(){
		$playlists = [];
		if ( is_user_logged_in() ) {
			$user = wp_get_current_user();
			$playlists = get_user_meta($user->ID, 'sonaar_mp3_playlists', true);
			// Check if the playlists exist and is not empty
			
		}else{
			if (isset($_COOKIE['sonaar_mp3_playlists'])) {
				$playlists = json_decode(stripslashes($_COOKIE['sonaar_mp3_playlists']), true);
			} else {
				// Handle the case where the cookie is not set or do nothing
				$playlists = [];
			}
		}
		if (empty($playlists)) {
			// Create a default playlist if playlists don't exist
			$playlists = array(
				array(
					"playlistName" => "Favorites",
					"tracks" => array()
				)
			);
		}
		return $playlists;
	}
}
