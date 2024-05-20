<?php

/**
 *
 * @link              sonaar.io
 * @since             1.0.0
 * @package           Sonaar_Music_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       MP3 Audio Player by Sonaar - Pro Addon
 * Plugin URI:        https://sonaar.io/?utm_source=Sonaar%20Music%20Free%20Plugin&utm_medium=plugin
 * Slug:			  sonaar-music-pro
 * Description:       Unlock the full power of MP3 Audio Player by Sonaar. Many Customizable Options, Unlocked Features and Statistic Reports Available.
 * Version:           5.3
 * Author:            Sonaar Music
 * Author URI:        https://sonaar.io/?utm_source=Sonaar%20Music%20Free%20Plugin&utm_medium=plugin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sonaar-music-pro
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SRMP3PRO_VERSION', '5.3'); // important to avoid cache issues on update
define( 'SRMP3_MIN_VERSION', '5.3'); // if SRMP3 public is lower than this, show noticifcation to update plugin
define( 'SRMP3_DIRNAME', __FILE__ );
define( 'PLUGIN_INSTALLATION_NAME', plugin_basename(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sonaar-music-pro-activator.php
 */
function activate_sonaar_music_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sonaar-music-pro-activator.php';
	Sonaar_Music_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sonaar-music-pro-deactivator.php
 */
function deactivate_sonaar_music_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sonaar-music-pro-deactivator.php';
	Sonaar_Music_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sonaar_music_pro' );
register_deactivation_hook( __FILE__, 'deactivate_sonaar_music_pro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sonaar-music-pro.php';
require __DIR__ . '/vendor/autoload.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sonaar_music_pro() {

	$plugin = new Sonaar_Music_Pro();
	$plugin->run();

}

run_sonaar_music_pro();



/*
* META BOX 
*/
add_action( 'load-post.php', 'sonaar_meta_boxes_setup');
add_action( 'load-post-new.php', 'sonaar_meta_boxes_setup' );


/* Meta box setup function. */
function sonaar_meta_boxes_setup() {
	if ( class_exists( 'Sonaar_Music' ) ){
		add_action( 'add_meta_boxes', 'sonaar_add_post_meta_boxes' );
		add_action( 'save_post', 'sonaar_save_meta', 10, 2 );
	}
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function sonaar_add_post_meta_boxes() {

	add_meta_box(
		'meta-footer-player',      // Unique ID
		esc_html__( 'Sticky Audio Player', 'sonaar-music-pro' ),    // Title
		'footer_player_meta_box',   // Callback function
		null,         // Admin page (or post type)
		'side',         // Context
		'default'         // Priority
	);
}

/* Display the post meta box. */
function footer_player_meta_box( $post ) { 
	$current_values = get_post_meta( $post->ID, 'sonaar_footer_player_meta', true);
	if( !is_array($current_values)){
		$current_values = [];
	}
	$sr_postypes = Sonaar_Music_Admin::get_cpt($all = true);

	$args = array(
		'post_type' => $sr_postypes,
		'post_status' => 'publish',
		'order' => 'ASC',
		'posts_per_page'=>-1
	);
	$options = get_posts( $args );	
	?>

	<?php wp_nonce_field( basename( __FILE__ ), 'footer_player_class_nonce' ); ?>
  
	<p>
		<label for="footer-player"><?php _e( 'Display sticky player when page is loaded. Select playlist:', 'sonaar-music-pro' ); ?></label>
		<select multiple name="sonaar_footer_player_meta[]" id="sonaar_footer_player_meta">
		<option value=""><?php _e( '- Select -', 'sonaar-music-pro' ); ?></option>
		<?php
		
		
		if(is_array($sr_postypes)){
			if( in_array( $post->post_type, $sr_postypes, true) ){
				echo '<option value="' . $post->ID . '" ';
				echo ( in_array( $post->ID, $current_values) )?'selected="selected" >': '>';
				echo __( 'Current Post Tracklist', 'sonaar-music-pro' );
				echo '</option>';
			}
		}
		foreach ($options as $value) {
			if (Sonaar_Music::srmp3_check_if_audio($value)){
				echo '<option value="' . $value->ID . '" ';
				echo ( in_array( $value->ID, $current_values) )?'selected="selected" >': '>';
				echo '['.$value->post_type .'] ';
				echo ''. $value->post_title .'</option>';
			}
		}
		?>
		</select>
		<label for="footer-player-shuffle">
			<input type="checkbox" name="sonaar_footer_player_shuffle_meta" id="sonaar_footer_player_shuffle_meta" value="true" <?php echo (get_post_meta( $post->ID, 'sonaar_footer_player_shuffle_meta', true))?'checked="checked"':''; ?> >
			<?php _e( 'Enable Shuffle', 'sonaar-music-pro' );?>
		</label>
	</p>

	<?php }

/* Save the meta box's post metadata. */
function sonaar_save_meta( $post_id ) {
    if(isset($_POST["sonaar_footer_player_meta"])){
        $meta_element_class = $_POST['sonaar_footer_player_meta'];
        update_post_meta($post_id, 'sonaar_footer_player_meta', $meta_element_class);
	}
	if(isset($_POST["sonaar_footer_player_shuffle_meta"])){
        update_post_meta($post_id, 'sonaar_footer_player_shuffle_meta', true);
    }else{
		update_post_meta($post_id, 'sonaar_footer_player_shuffle_meta', false);
	}
}
// -------------------  END META BOXES ----------------//

add_action('wp_ajax_load_ajax_player', 'load_ajax_player');
add_action('wp_ajax_nopriv_load_ajax_player', 'load_ajax_player');
function load_ajax_player() {
	check_ajax_referer('sonaar_music_ajax_nonce', 'nonce');
	$arrContextOptions=array(
		"ssl"=>array(
			"verify_peer"=>false,
			"verify_peer_name"=>false,
		),
	);

	$sonaarMusicWidgetInstance = new Sonaar_Music_Widget();
    $response = $sonaarMusicWidgetInstance->widget( $_POST['args'], $_POST['parameters']);
	
        // Send the normal response when $response is not null
    echo wp_json_encode($response);
    

	//echo wp_json_encode($response);

	wp_die();
}

add_action( 'wp_ajax_update_user_playlist', 'update_user_playlist' );
add_action( 'wp_ajax_nopriv_update_user_playlist', 'update_user_playlist' );

function update_user_playlist() {
	check_ajax_referer('sonaar_music_ajax_nonce', 'nonce');
    // Check if the request has the necessary data
    if (isset($_POST['playlists'])) {

        // Get the current user
        $user = wp_get_current_user();
		 // Convert the data into a JSON string

        // Update the user meta with the new playlists
        update_user_meta($user->ID, 'sonaar_mp3_playlists', $_POST['playlists']);

		//response is required by ajax
        echo json_encode('Playlist updated successfully');
    } else {
		echo json_encode('No playlist data received');
    }

    // Always die in functions echoing AJAX content
   wp_die(); 
}

