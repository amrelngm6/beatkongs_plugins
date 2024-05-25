<?php
/**
* WC class
*
* SRMP3 WooCommerce class
*
* @link       sonaar.io
* @since      1.0.0
*
* @package    Sonaar_Music_Pro
* @subpackage Sonaar_Music_Pro/includes
*/

defined( 'ABSPATH' ) || exit;
use Spipu\Html2Pdf\Html2Pdf;
class SRMP3_WooCommerce {

    public static function load() {
		add_action( 'init', array( __CLASS__, 'register_hooks' ) );
	}

    /**
	 * Get  default priority for the product player
	 *
	 * @since  1.0.0
	 * @return array
	 */
	public static function srmp3_get_default_product_player_priority() {
		return array(
			'before'         => 4,
			'after'          => 6,
			'before_rating'  => 9,
			'after_price'    => 11,
			'before_excerpt' => 19,
			'after_excerpt'  => 21,
            'after_add_to_cart'  => 30,
			'before_meta'    => 39,
			'after_meta'     => 41,
		);
	}
    public static function register_hooks() {
		add_action('wp_ajax_load_wc_variation_by_ajax', array( __CLASS__, 'load_wc_variation_by_ajax_callback'), 10, 2);
		add_action('wp_ajax_nopriv_load_wc_variation_by_ajax', array( __CLASS__, 'load_wc_variation_by_ajax_callback'), 10, 2);
		if (Sonaar_Music::get_option('wc_enable_licenses_cpt', 'srmp3_settings_woocommerce') == 'true'){
			add_action('wp_ajax_load_license_preview_ajax', array( __CLASS__, 'load_license_preview_ajax_callback'), 10, 2);
			add_action('wp_ajax_nopriv_load_license_preview_ajax', array( __CLASS__, 'load_license_preview_ajax_callback'), 10, 2);
			add_action( 'woocommerce_checkout_update_order_meta', array( __CLASS__, 'srmp3_add_meta_to_order'), 10 , 2 );
			add_action( 'woocommerce_view_order', array( __CLASS__, 'srmp3_add_license_to_order_page'), 9, 1 );
			add_action( 'woocommerce_thankyou', array( __CLASS__, 'srmp3_add_license_to_order_page'), 9, 1 );
			add_action( 'woocommerce_after_cart_item_name', array( __CLASS__, 'srmp3_add_license_button'), 10, 2 );
			add_action( 'woocommerce_order_status_completed', array( __CLASS__, 'srmp3_create_pdf_license'), 10, 1 );
			add_action( 'woocommerce_review_order_before_payment', array( __CLASS__, 'srmp3_review_license_before_submit'), 10);
			add_action( 'woocommerce_email_after_order_table', array( __CLASS__, 'email_order_show_license_link'), 10, 1 );
			
		}
		$srmp3_product_player_priority = self::srmp3_get_default_product_player_priority();
        $srmp3_product_player        = self::srmp3_product_player_pos();

        if ($srmp3_product_player !== 'disable'){        
            if ( 'after_summary' === $srmp3_product_player ) {
				add_action( 'woocommerce_after_single_product_summary', array( __CLASS__, 'sr_display_wc_shop_player' ), 10 );
			} else {
				add_action( 'woocommerce_single_product_summary', array( __CLASS__, 'sr_display_wc_shop_player' ), $srmp3_product_player_priority[ $srmp3_product_player ] );
			}
        };

		if (self::srmp3_remove_wc_featured_image()=='true'){
			//add_action( 'woocommerce_before_shop_loop_item_title', array( __CLASS__, 'sr_check_woo_image') , 10);
		}
		add_filter( 'woocommerce_post_class', array( __CLASS__, 'woocommerce_post_class' ), 10, 2 );
		add_filter( 'woocommerce_cart_item_name', array( __CLASS__, 'srmp3_add_image_checkout' ), 9999, 3 ); 
		
		if( Sonaar_Music::get_option('wc_variation_lb', 'srmp3_settings_woocommerce') != 'false' ){
			add_filter( 'woocommerce_loop_add_to_cart_link', array( __CLASS__, 'srp_wc_variation_modal' ),  10, 2);
		}
		add_action( 'wp_loaded', array( __CLASS__, 'wc_shop_page_hooks' ), 10 );

		
    }
	public static function srmp3_add_image_checkout ( $name, $cart_item, $cart_item_key ) {
		if ( ! is_checkout() ) 
			{return $name;}
		
		$product = $cart_item['data'];
		
		if ($product->get_image_id() != 0){
			$thumbnail = $product->get_image( array( '50', '50' ), array( 'class' => 'alignleft' ) ); 
		}else{
			$thumbnail = '';
		}

		/*Above you can change the thumbnail size by changing array values e.g. array(‘100’, ‘100’) and also change alignment to alignright*/
		return $thumbnail . $name;
	}
	/**
	 * Callback function hooked to the 'woocommerce_post_class' filter
	 * Add the 'waveplayer-product' class to a product with preview files
	 *
	 * @since  1.0.0
	 * @param array      $classes The array containing the track info.
	 * @param WC_Product $product The current $product object.
	 * @return array     The filtered array containing the product item classes
	 */
	public static function woocommerce_post_class( $classes, $product ) {
		$srmp3_product_player = Sonaar_Music::srmp3_check_if_audio($product, true);
		
		if($srmp3_product_player ){
			$classes[] = 'srmp3-product';

			if(self::srmp3_remove_wc_featured_image()=='true'){
				$classes[] = 'srmp3-product__hideimage';
			}
		}
		
		return $classes;
	}
	/**
	 * Check if featured image shall be removed on our player
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public static function sr_check_woo_image($product) {
		
		$srmp3_product_player = Sonaar_Music::srmp3_check_if_audio($product, true);
		if( !$srmp3_product_player ){
			//var_dump("these product are NOT using the mp3 player");
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
			add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		}else{
			// Remove product images from the shop loop
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		}
		
	}

    /**
	 * Get position of the player in wc product template
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public static function srmp3_product_player_pos() {
		$srmp3player_pos =  Sonaar_Music::get_option('sr_woo_product_position', 'srmp3_settings_woocommerce' );
		if($srmp3player_pos){
			return Sonaar_Music::get_option('sr_woo_product_position', 'srmp3_settings_woocommerce'); 
		}else{
			return 'disable';
		}
        
	}

    /**
	 * Get position of the player in wc shop loop
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public static function srmp3_shop_player_pos() {
        return Sonaar_Music::get_option('sr_woo_shop_position', 'srmp3_settings_woocommerce'); 
	}
	
	/**
	 * Check if featured image shall be removed on our player
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public static function srmp3_remove_wc_featured_image() {
        return Sonaar_Music::get_option('remove_wc_featured_image', 'srmp3_settings_woocommerce'); 
	}
    /**
	 * Register action for shop page loop
	 *
	 * @since 1.0.0
	 */
	public static function wc_shop_page_hooks() {
		global $pagenow;
		if (is_admin() && !wp_doing_ajax() && !($pagenow == 'post.php' && ( isset($_GET['action']) && $_GET['action'] == 'elementor'))){ // we dont want to swap image columns for audio player in the admin area
			return;
		}

		$srmp3_shop_player = self::srmp3_shop_player_pos(); //disable, before, after

		if ($srmp3_shop_player !== 'disable'){
			//if (self::srmp3_remove_wc_featured_image()=='true' || Sonaar_Music::get_option('sr_woo_shop_position') == 'over_image'){
			if (Sonaar_Music::get_option('sr_woo_shop_position', 'srmp3_settings_woocommerce') == 'over_image'){
				add_filter( 'woocommerce_product_get_image', array( __CLASS__, 'filter_srmp3_player_html' ), 10, 2 );						
			}else{
				if ($srmp3_shop_player == 'after_item'){ 
					add_action( "woocommerce_after_shop_loop_item", array( __CLASS__, 'sr_display_wc_shop_player' ), 10 );
				}else{	
					add_action( "woocommerce_{$srmp3_shop_player}_shop_loop_item_title", array( __CLASS__, 'sr_display_wc_shop_player' ), 10 );
				}
			}
		}
	}

	/**
	 * Return the audio player shortcode
	 *
	 * @since  1.0.0
	 * @param  string	$html   	When used as a filter, the WC markup is replaced.
	 * @param  WC_Product|int $_product The ID or object of the current product.
	 * @return string
	 */
	public static function filter_srmp3_player_html( $image, $_product = null ) {
		if ( self::is_single_product() || is_cart() || self::is_mini_cart() ) {
			return $image;
		}

		global $product;
		if ( is_numeric( $_product ) ) {
			if ( 'attachment' === get_post_type( $_product ) ) {
				$_product = $product;
			} elseif ( 'product' === get_post_type( $_product ) ) {
				$_product = wc_get_product( $_product );
			}
		}

		$woo_srmp3_player = self::woo_srmp3_player ($_product);
		if ($woo_srmp3_player){
			$image = $woo_srmp3_player;
		}
		return $image;
	}

	/**
	 * Check if product related for our filter
	 *
	 * @since  1.0.0
	 * @return boolean
	 */
	public static function is_single_product() {
		if ( is_product() && 'related' !== wc_get_loop_prop( 'name' ) ) {
			return true;
		}
		return false;
	}
	/**
	 * Prevent to filter if its inside mini cart
	 *
	 * @since  1.0.0
	 * @return boolean
	 */
	public static function is_mini_cart() {
		return ( did_action( 'woocommerce_before_mini_cart' ) > did_action( 'woocommerce_after_mini_cart' ) );
	}
	/**
	 * Return the SRMP3 shortcode if it being used in WC product otherwise return false
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public static function woo_srmp3_player( $_product = null ) {
	
		$srmp3_product_player = Sonaar_Music::srmp3_check_if_audio($_product, true);
		
		if( !$srmp3_product_player )
		return;
	
		
		if ( self::is_single_product() ){
			$srmp3_product_skin = Sonaar_Music::get_option('sr_woo_skin_product', 'srmp3_settings_woocommerce');
			if ($srmp3_product_skin == 'custom_shortcode'){
				$player_shortcode = Sonaar_Music::get_option('sr_woo_product_player_shortcode', 'srmp3_settings_woocommerce');
			}else{
				$player_shortcode = '[sonaar_audioplayer';
				$player_shortcode .= ' hide_timeline="false"';
				//$player_shortcode .= ' hide_progressbar="true"';
				$player_shortcode .= ' hide_artwork="true"';
				//$player_shortcode .= ' hide_player_title="true"';
				$player_shortcode .= ' hide_album_subtitle="true"';
				$player_shortcode .= ' hide_control_under="true"';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_progressbar', 'srmp3_settings_woocommerce') == 'true') ? ' hide_progressbar="false"': ' hide_progressbar="true"';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_sticky_player', 'srmp3_settings_woocommerce') == 'true') ? ' sticky_player="true"': ' sticky_player="false"';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_tracklist', 'srmp3_settings_woocommerce') == 'true') ? ' show_playlist="true"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_albumtitle', 'srmp3_settings_woocommerce') == 'true') ? ' hide_player_title="false" hide_album_title="false"': ' hide_player_title="true" hide_album_title="true"';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_albumsubtitle', 'srmp3_settings_woocommerce') == 'true') ? ' hide_album_subtitle="false"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_control', 'srmp3_settings_woocommerce') == 'true') ? ' hide_control_under="false"': '';
				//$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_product_position') == 'over_image') ? ' hide_artwork="false" display_control_artwork="true" hide_control_under="true"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_product_attr_progress_inline', 'srmp3_settings_woocommerce') == 'true') ? ' progressbar_inline="true" hide_timeline="false"': '';
				$player_shortcode .= ' show_album_market="false"';
				$player_shortcode .= ' hide_track_title="true"';
				$player_shortcode .= ' hide_times="true"';
				//$player_shortcode .= ' hide_timeline="true"';
				$player_shortcode .= ' show_track_market="true"';
				$player_shortcode .=' ]';
			}			
		}else {
			
			$srmp3_shop_skin = Sonaar_Music::get_option('sr_woo_skin_shop', 'srmp3_settings_woocommerce');
			if ($srmp3_shop_skin == 'custom_shortcode'){
				$player_shortcode = Sonaar_Music::get_option('sr_woo_shop_player_shortcode', 'srmp3_settings_woocommerce');
			}else{
				$player_shortcode = '[sonaar_audioplayer';
				
				$player_shortcode .= ' hide_artwork="true"';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_shop_attr_progressbar', 'srmp3_settings_woocommerce') == 'true') ? ' hide_timeline="false"': ' hide_timeline="true"';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_shop_attr_sticky_player', 'srmp3_settings_woocommerce') == 'true') ? ' sticky_player="true"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_shop_attr_tracklist', 'srmp3_settings_woocommerce') == 'true') ? ' show_playlist="true"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_shop_position', 'srmp3_settings_woocommerce') == 'over_image') ? ' hide_artwork="false" display_control_artwork="true" hide_control_under="true"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_skin_shop_attr_progress_inline', 'srmp3_settings_woocommerce') == 'true') ? ' progressbar_inline="true" hide_timeline="false"': '';
				$player_shortcode .= ( Sonaar_Music::get_option('sr_woo_button_hover', 'srmp3_settings_woocommerce') == 'true') ? ' show_control_on_hover="true" ': '';

				$player_shortcode .= ' hide_album_title="true"';
				$player_shortcode .= ' show_album_market="false"';
				$player_shortcode .= ' hide_track_title="true"';
				$player_shortcode .= ' hide_times="true"';
				$player_shortcode .= ' product_archive="true"';
				
				//$player_shortcode .= ' hide_timeline="true"';

				$player_shortcode .=' ]';
			}			
		}
		$shortcode = do_shortcode (" $player_shortcode ");
		if (strlen($shortcode) < 10) return false;

		return $shortcode;
	}
	public static function generateContract($post_id = null, $order = null, $product_name = null, $variation_id = null){
        /* Get the Contract Fields
        /*
        */
		// if variation_id is set
		if($variation_id){
			$product_id = wp_get_post_parent_id( $variation_id );
		}
		
        $usageterms_num_dist_copies = '<strong>' . get_post_custom_values( 'usageterms_num_dist_copies', $post_id )[0] . '</strong>';
        $usageterms_num_audio_streams = '<strong>' . get_post_custom_values( 'usageterms_num_audio_streams', $post_id )[0] . '</strong>';
        $usageterms_num_radio_stations = '<strong>' . get_post_custom_values( 'usageterms_num_radio_stations', $post_id )[0] . '</strong>';
        $usageterms_num_free_downloads = '<strong>' . get_post_custom_values( 'usageterms_num_free_downloads', $post_id )[0] . '</strong>';
        $usageterms_num_music_videos = '<strong>' . get_post_custom_values( 'usageterms_num_music_videos', $post_id )[0] . '</strong>';
        $usageterms_num_monetized_video_streams = '<strong>' . get_post_custom_values( 'usageterms_num_monetized_video_streams', $post_id )[0] . '</strong>';
        $usageterms_num_nonmonetized_video_streams = '<strong>' . get_post_custom_values( 'usageterms_num_nonmonetized_video_streams', $post_id )[0] . '</strong>';
        $usageterms_allow_profit_performances = (get_post_custom_values( 'usageterms_allow_profit_performances', $post_id )[0] === 'yes') ? '<strong>allows</strong>' : '<strong>does not allow</strong>';
        $usageterms_licensename = '<strong>' . get_the_title( $post_id ) . '</strong>';
        $usageterms_get_current_date = '<strong>' . date(get_option('date_format')) . '</strong>';
        $usageterms_states = (isset(get_post_custom_values( 'usageterms_state', $post_id )[0]) && get_post_custom_values( 'usageterms_state', $post_id )[0] !== '') ?  '<strong>' . get_post_custom_values( 'usageterms_state', $post_id )[0] . ', ' . get_post_custom_values( 'usageterms_country', $post_id )[0]  . '</strong>' : '<strong>country of the seller</strong>';
        $usageterms_producer_alias = '<strong>' . get_post_custom_values( 'usageterms_producer_alias', $post_id )[0] . '</strong>';
		$usageterms_customer_fullname = (isset($order)) ? '<strong>' . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() . '</strong>' : 'The Customer Name';
        $usageterms_customer_address = (isset($order)) ? '<strong>' . $order->get_billing_address_1() . ' ' . $order->get_billing_address_2()  . '</strong>' : 'The Customer Address';
		$usageterms_customer_email = (isset($order)) ? '<strong>' . $order->get_billing_email() . '</strong>' : 'The Customer Email Address';
		$product_title = (isset($product_name)) ? '<strong>' . $product_name . '</strong>' : 'The Beat';
        //$product_price = '<strong>' . 'WIP PRICE $' . '</strong>';

        /* Generate the contract
        /*
        */
        $usageterms_contract = get_post_custom_values( 'usageterms_contract', $post_id )[0];

        $usageterms_contract = str_replace('{LICENSE_NAME}', $usageterms_licensename, $usageterms_contract);
        $usageterms_contract = str_replace('{CUSTOMER_FULLNAME}', $usageterms_customer_fullname, $usageterms_contract);
		$usageterms_contract = str_replace('{CUSTOMER_ADDRESS}', $usageterms_customer_address, $usageterms_contract);
		$usageterms_contract = str_replace('{CUSTOMER_EMAIL}', $usageterms_customer_email, $usageterms_contract);
		$usageterms_contract = str_replace('{CONTRACT_DATE}', $usageterms_get_current_date, $usageterms_contract);
        $usageterms_contract = str_replace('{PRODUCER_ALIAS}', $usageterms_producer_alias, $usageterms_contract);
        $usageterms_contract = str_replace('{PRODUCT_TITLE}', $product_title, $usageterms_contract);
        //$usageterms_contract = str_replace('{PRODUCT_PRICE}', $product_price, $usageterms_contract);
        $usageterms_contract = str_replace('{PERFORMANCES_FOR_PROFIT}', $usageterms_allow_profit_performances, $usageterms_contract);
        $usageterms_contract = str_replace('{NUMBER_OF_RADIO_STATIONS}', $usageterms_num_radio_stations, $usageterms_contract);
        $usageterms_contract = str_replace('{MONETIZED_MUSIC_VIDEOS}', $usageterms_num_music_videos, $usageterms_contract);
        $usageterms_contract = str_replace('{DISTRIBUTE_COPIES}', $usageterms_num_dist_copies, $usageterms_contract);
        $usageterms_contract = str_replace('{AUDIO_STREAMS}', $usageterms_num_audio_streams, $usageterms_contract);
        $usageterms_contract = str_replace('{MONETIZED_VIDEO_STREAMS_ALLOWED}', $usageterms_num_monetized_video_streams, $usageterms_contract);
        //$usageterms_contract = str_replace('{NONMONETIZED_VIDEO_STREAMS_ALLOWED}', $usageterms_num_nonmonetized_video_streams, $usageterms_contract);
        $usageterms_contract = str_replace('{FREE_DOWNLOADS}', $usageterms_num_free_downloads, $usageterms_contract);
        $usageterms_contract = str_replace('{STATE_PROVINCE_COUNTRY}', $usageterms_states, $usageterms_contract);
		
		if(function_exists('acf') && $product_id){
			// if {acf_any_field_value} is found in the contract, replace it with the acf field value from the product post. It allows to use any acf field in the contract.
			$pattern = '/\{acf_([^}]+)\}/';  // Regular expression pattern

			$usageterms_contract = preg_replace_callback($pattern, function($matches) use ($product_id) {
				$field_value = $matches[1];  // Captured value between {acf_ and }
				return do_shortcode('[acf field="' . $field_value . '" post_id="' . $product_id . '"]');
			}, $usageterms_contract);
		}
		
		foreach (get_post_meta($post_id, 'usageterms_custom_options_group') as $value){
			foreach($value as $string){
				$usageterms_contract = str_replace( $string['usageterms_custom_options_item_var'], $string['usageterms_custom_options_item_name'], $usageterms_contract);
			}
		}
		return wp_kses( $usageterms_contract, array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'p' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
            'em' => array(),
            'strong' => array(),
        ) );
    }
    /**
	 * Output SRMP3 player on the shop loop
	 *
	 * @since  1.0.0
	 */
	public static function sr_display_wc_shop_player() {
		$woo_srmp3_player = self::woo_srmp3_player ();
		if ($woo_srmp3_player){
			echo $woo_srmp3_player;
		}
	}

	// Return all args if $argKey is not set or a specific arg from a product variantion ID | "Custom product attribute" only return its name
	//$argKey eq: 'name','term_taxonomy_id'
	public static function srp_get_productAttibuteTerm_arg_from_productVariantionId($productVariantionID, $argKey = null) {
		$variantionPost = wc_get_product($productVariantionID);
		if ( ! $variantionPost ) {
			return;
		}
		$variantAttributes = $variantionPost ->get_attributes();
		$variantAttributesTermIDs=[];
		foreach ( $variantAttributes as $taxonomy => $value ) {
			$term_obj = get_term_by( 'slug', $value, $taxonomy );
			if($term_obj === false){ //if it is a "Custom product attribute", return only its name.
				array_push($variantAttributesTermIDs, $value);
			}else if( $argKey != null && isset($term_obj->$argKey)){  //if $argKey is set, return this specific value
				array_push($variantAttributesTermIDs, $term_obj->$argKey);
			}else{  //Otherwise, return all args.
				array_push($variantAttributesTermIDs, $term_obj);
			}	
		}
		return($variantAttributesTermIDs);
	}

	public static function srp_get_license_post_id_from_attribute_term_id($attrTermID) { //Return all Usage-terms post IDs who the Product Attribute [$attrTermID] is selected
		$usageTermsPosts = get_posts(array(
			'post_type' => 'usage-terms',
			'posts_per_page' => -1,
			'post_author' => 1
		));
		$usageTerms_selectedAtribute = [];
		foreach ( $usageTermsPosts as $post ) {
			$selectedAtribute = get_post_meta($post->ID, 'usageterms_product_variation');
			if(in_array($attrTermID, $selectedAtribute)){
				array_push($usageTerms_selectedAtribute,$post->ID);
			}
		}
		return $usageTerms_selectedAtribute;
	}

	public static function srp_get_variantFileTypes_from_variationID($variantId) { 
		$productVariationTermIDs = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variantId, 'term_taxonomy_id' );
		$licensePostId = [];
		$variantFileTypes = [];
		foreach ( $productVariationTermIDs  as $value) { //Each product attribute term select to the variation
			$licensePostId = array_merge($licensePostId, SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value) );
		}
		foreach ( $licensePostId  as $value) { //Each product attribute term select to the variation
			$variantFileTypes = array_merge($variantFileTypes, get_post_meta($value, 'usageterms_filetypes')[0] );
		}
		$variantFileTypes = array_map(function($n){return SRMP3_WooCommerce::srp_outputTranslatableTexts($n);}, $variantFileTypes);
		$variantFileTypes = implode(__(' + ', 'sonaar-music-pro'), $variantFileTypes);
		return  $variantFileTypes;
	}

	public static function srp_wc_variation_output_all_usageTerms($variantId) {
		$response = '';
		$productVariationTermIDs = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variantId, 'term_taxonomy_id' );
		foreach ( $productVariationTermIDs  as $value) { //Each product attribute term select to the variation
			$usageTermIDs = SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value);
			foreach ($usageTermIDs  as $theUsageTerm) { //Each usage-term post selected by the product attribute term 
				$response .= SRMP3_WooCommerce::srp_wc_variation_output_usageTerms($theUsageTerm);
			}
		}
		return $response;
	}
	
	public static function srp_outputTranslatableTexts($string) {
		switch ($string) {
			case 'mp3':
				$string = __('mp3', 'sonaar-music-pro');
				break;
			case 'wav':
				$string = __('wav', 'sonaar-music-pro');
				break;
			case 'stems':
				$string = __('stems', 'sonaar-music-pro');
				break;
			case 'yes':
				$string = __('yes', 'sonaar-music-pro');
				break;
			case 'no':
				$string = __('no', 'sonaar-music-pro');
				break;
		}
		return($string);
	}

	public static function srp_wc_variation_output_usageTerms($termID, $show_preview_button = null) {
		if ( 'publish' == get_post_status ( $termID ) && 'usage-terms' === get_post_type( $termID ) ){
		}else{
			return;
		}

		
	
		$termFieldID = [
			array('id' => 'usageterms_filetypes', 'label' => __('{value} included', 'sonaar-music-pro'), 'icon' => 'sricon-filedownload'  ),
			array('id' => 'usageterms_num_dist_copies', 'label' => __('Distribute up to {value} copies', 'sonaar-music-pro'), 'icon' => 'sricon-layers'  ),
			array('id' => 'usageterms_num_audio_streams', 'label' => __('{value} audio streams', 'sonaar-music-pro'), 'icon' => 'sricon-audiostream'  ),
			array('id' => 'usageterms_num_music_videos', 'label' => __('{value} music videos', 'sonaar-music-pro'), 'icon' => 'sricon-svg-video'  ),
			array('id' => 'usageterms_num_radio_stations', 'label' => __('Radio broadcasting rights ({value} stations)', 'sonaar-music-pro'), 'icon' => 'sricon-radio2'  ),
			array('id' => 'usageterms_num_free_downloads', 'label' => __('{value} free downloads', 'sonaar-music-pro'), 'icon' => 'sricon-download'  ),
			array('id' => 'usageterms_num_monetized_video_streams', 'label' => __('{value} video streams', 'sonaar-music-pro'), 'icon' => 'sricon-podcastindex'  ),
			array('id' => 'usageterms_allow_profit_performances', 'label' => esc_html__('For paid performances? {value}', 'sonaar-music-pro'), 'icon' => 'sricon-dj'  )
		];
		$output = '<div class="srp_variant_terms" data-term_id="' . $termID . '">';
		$output .= '<div class="srp_term_title">'. get_the_title( $termID ) .'</div>';
		$output .= '<div class="srp_term_meta_list">';
		
		// Load hardcoded license options
		foreach ($termFieldID as $fieldID){
			if (count(get_post_meta($termID, $fieldID['id'])) > 0 ){
				if ($fieldID['id'] == 'usageterms_filetypes'){
					$fileTypes = array();
					foreach (get_post_meta($termID, 'usageterms_filetypes') as $value){
						$value = array_map(function($n){return SRMP3_WooCommerce::srp_outputTranslatableTexts($n);}, $value);
						$fileTypes = array_merge($fileTypes, $value);	
					}
					$fileTypes = array_unique($fileTypes);
					$fileTypes = implode(__(' + ', 'sonaar-music-pro'), $fileTypes);
					$field = str_replace('{value}', '<span class="srp_term_meta_value">' . esc_html($fileTypes) .'</span>' , $fieldID['label']);
				}else{
					$value = array_map(function($n){return SRMP3_WooCommerce::srp_outputTranslatableTexts($n);}, get_post_meta($termID, $fieldID['id']));
					$value = array_unique($value);
					$field = str_replace('{value}', '<span class="srp_term_meta_value">' . esc_html(implode(",", $value)) .'</span>' , $fieldID['label']);
				}
				$output .= '<div class="srp_term_meta ' . $fieldID['icon'] . '" data-variant-term-meta="' . $fieldID['id'] . '">';
				$output .= '<span class="srp_term_meta_label">' . $field . '</span>';
				$output .= '</div>'; // DIV srp_term_meta
			}
		}

		// Load custom license options
		foreach (get_post_meta($termID, 'usageterms_custom_options_group') as $value){
			foreach($value as $string){
				$icon = ($string['usageterms_custom_options_item_icon'] != '') ? $string['usageterms_custom_options_item_icon'] : "fa-solid fa-check";
				$output .= '<div class="srp_term_meta "><i class="' . $icon . '"></i>	';
				$output .= '<span class="srp_term_meta_label">' . $string['usageterms_custom_options_item_name'] . '</span>';
				$output .= '</div>'; // DIV srp_term_meta
			}
		}

		$output .= '</div>'; // DIV srp_term_meta_list
		if($show_preview_button === 'true'){
			$output .='
			<button
			type="button"
			class="view-license-button" 
			aria-label="Preview License"
			data-variation-id=""
			data-license-id="' . esc_attr( $termID ) . '"
			data-product-name=""
			>' . esc_html('Preview License', 'sonaar-music-pro') . '</button>';
		}
		$output .= '</div>'; // DIV srp_variant_terms

		return $output;
	}

	public static function srp_wc_variation_modal($button, $product) { 
		if ($product->is_type( 'variable' ) && count($product->get_available_variations()) > 0 && Sonaar_Music::srmp3_check_if_audio($product, true)){ 
			
			$button = str_replace('class="', 'onclick="srp_variation_button(this)" class="', $button);

			$needle_start = 'href="';
			$needle_end = '"';
			$replacement = '#!';
			$pos = strpos($button, $needle_start);
			$start = $pos === false ? 0 : $pos + strlen($needle_start);
			$pos = strpos($button, $needle_end, $start);
			$end = $pos === false ? strlen($button) : $pos;
			$button = substr_replace($button, $replacement, $start, $end - $start); //remove the href
		}
		return $button;
	}
	public static function srmp3_add_license_button( $cart_item ) {
		$variation_id = $cart_item['variation_id'];  // The variation ID
		$product = wc_get_product( $cart_item['variation_id'] );

		if ( ! $product ) {
			return;
		}
			
		$attrTermID = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variation_id, 'term_taxonomy_id' );
		$licenseID = array();
		foreach($attrTermID as $value){
			$licenseID = array_merge($licenseID, SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value) );
		}
		foreach($licenseID as $value){
			?>
			<button 
			type="button"
			class="view-license-button" 
			aria-label="Preview License"
			data-variation-id="<?php echo esc_attr( $variation_id ); ?>"
			data-license-id="<?php echo esc_attr( $value ); ?>"
			data-product-name="<?php echo esc_attr($cart_item['data']->get_name()); ?>"
			>
				<?php esc_html_e('Preview License', 'sonaar-music-pro'); ?>
			</button>
			<?php
		}
	}

	public static function srmp3_has_usage_license( $cart_item ) {
		$variation_id = $cart_item['variation_id'];  // The variation ID
		$prod = wc_get_product( $cart_item['variation_id'] );

		if ( ! $prod ) {
			return;
		}

		$attrTermID = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variation_id, 'term_taxonomy_id' );
		$licenseID = array();
		foreach($attrTermID as $value){
			$licenseID = array_merge($licenseID, SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value) );
		}
		foreach($licenseID as $value){
			if ( is_numeric($value) ){
				return true;
			}
		}
		return false;
	}
	public static function load_license_preview_ajax_callback() {
		check_ajax_referer('sonaar_music_ajax_nonce', 'nonce');
		$response = '<div class="srp-license-preview-modal srp-modal-medium-size">';
		$response .= SRMP3_WooCommerce::srp_wc_variation_output_usageTerms( $_POST['licenseId'] );
		$response .= SRMP3_WooCommerce::generateContract(sanitize_text_field($_POST['licenseId']), null, sanitize_text_field($_POST['productName']), sanitize_text_field($_POST['variationId']));
		$response .= '</div>';
		echo $response;
		wp_die();
	}

	public static function load_wc_variation_by_ajax_callback() {
		check_ajax_referer('sonaar_music_ajax_nonce', 'nonce');
		$variantList = [];
		$product = wc_get_product($_POST['product-id']);
		$product_title = $product->get_title();

		$image_src = isset($_POST['image_src']) ? esc_url($_POST['image_src']) : '';
		$image_element = $image_src ? '<div class="srp-modal-image"><img class="srp-share-img" src="' . $image_src . '" alt="' . $product_title . '"></div>' : '';
		

		$wc_ajaxClass = (Sonaar_Music::get_option('wc_enable_ajax_addtocart', 'srmp3_settings_woocommerce') == 'true') ? ' ajax_add_to_cart' : '';

		if ($product->is_type( 'variable' )){
			$variations = $product->get_available_variations();
			$variations_id = wp_list_pluck( $variations, 'variation_id' ); 
				
			if( count($variations_id) > 0){
				$variantDefaultIndex = 0;			
				$attributes = array_keys($product->get_variation_attributes());
				$attributes = array_map(function($value) { return ucfirst(str_replace('pa_', '', $value)); }, $attributes);
				$attributes = implode(', ', $attributes);
				$defaultVariation =($product->get_default_attributes() == [])? [] : array_filter( $product->get_default_attributes() ) ;

				foreach ($variations_id  as $i=>$variant_id) {
					$variationList = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variant_id, 'name' );
					$variantList[$i] = array(
						'variantId'  => $variant_id,
						'variantName'  => implode(" / ", $variationList),
						'variantDefault'  => (implode(' ', $defaultVariation) == implode(' ', $variationList) || ( count($defaultVariation) == 0 && $i == 0 ) )? true : false, //If is the default variation
						'variantDescription' => wc_get_product($variant_id)->get_description(),
						'variantPrice' => wc_price(wc_get_product($variant_id)->get_price()),
						'variantRegPrice' => wc_price(wc_get_product($variant_id)->get_regular_price()),
						'variantSalePrice' => wc_get_product($variant_id)->get_sale_price(),
						'variantFileTypes' => SRMP3_WooCommerce::srp_get_variantFileTypes_from_variationID($variant_id),
						'variantTerm' => get_post_meta( $variant_id, 'custom_field', true ),
						'extraClass' => ''
					);
					if(implode(' ', $defaultVariation) == implode(' ', $variationList) ){
						$variantDefaultIndex = $i;
					}
				}

				$variantList[$variantDefaultIndex]['extraClass'] = 'srp_selected';
				$response = '<div class="srp-modal-product-variation srp-modal-medium-size" data-product_id="' . $_POST['product-id'] . '">';
				$response .= 	'<div class="srp-modal-product-variation-trackinfo-container">
									' . $image_element . '
									<div class="srp-modal-title">' . $product_title . '</div>
								</div>';
				$response .= ($product->get_short_description() != '')?'<div class="srp-modal-product-desc">' . $product->get_short_description() . '</div>':'';
				$response .= '<div class="srp-modal-subtitle">' . $attributes . '</div>';
				$response .= '<div class="srp-modal-variation-list">';
				foreach ($variantList  as $i=>$variant) {
					$selectedClass = ($variant['variantDefault'])? 'srp_selected':'';
					$response .= '<div class="srp-modal-variant-selector ' . $selectedClass . '" onclick="srp_selectVariation(this)" data-variant_id="' . $variant['variantId'] . '">';
					$response .= '<div class="srp-modal-variant-name">' . $variant['variantName'] . '</div>';
					$response .= '<div class="srp-modal-variant-price">';
					$response .= ( $variant['variantSalePrice'] != '' )? '<span class="srp_reg_price">'. $variant['variantRegPrice'] . '</span> ': '';
					$response .= $variant['variantPrice'];
					$response .= '</div>'; //DIV srp-modal-variant-price
					$response .= ( $variant['variantFileTypes'] != '' && Sonaar_Music::get_option('wc_enable_licenses_cpt', 'srmp3_settings_woocommerce') == 'true' )? '<div class="srp-modal-variant-file">' . $variant['variantFileTypes'] . '</div>' : '';
					$response .= ( $variant['variantDescription'] != '' )? '<div class="srp-modal-variant-desc">' . $variant['variantDescription'] . '</div>' : '';
					$response .= '</div>'; //DIV srp-modal-variant-selector
				}
				$response .= '</div>'; //DIV srp-modal-product-variation
				if (Sonaar_Music::get_option('wc_enable_licenses_cpt', 'srmp3_settings_woocommerce') == 'true'){
					foreach ($variantList  as $variant) { 
						$response .= '<div class="srp-modal-variation-details ' . $variant['extraClass']. '" data-variant_id="' . $variant['variantId']. '">';
						$response .= SRMP3_WooCommerce::srp_wc_variation_output_all_usageTerms( $variant['variantId'] );
						$response .= '</div>'; //DIV srp-modal-variation-details
					}
				}
				//$response .= SRMP3_WooCommerce::loadFormattedLicenseDetail($variantList);
				$response .= '<div class="srp-modal-variant-main">';
				$response .= '<div class="srp-modal-variant-price">' . esc_html__( 'Total:', 'sonaar-music-pro') . ' ' . $variantList[$variantDefaultIndex]['variantPrice'] . '</div>';
				if (Sonaar_Music::get_option('wc_enable_custom_link_in_modal', 'srmp3_settings_woocommerce') == 'true'){
					if (Sonaar_Music::get_option('wc_enable_custom_link_is_product', 'srmp3_settings_woocommerce') == 'true'){
						$productID = sanitize_text_field($_POST['product-id']);
						$link = get_permalink($productID);
					}else if(Sonaar_Music::get_option('wc_enable_custom_link_is_custom', 'srmp3_settings_woocommerce') !== ''){
						$link = Sonaar_Music::get_option('wc_enable_custom_link_is_custom', 'srmp3_settings_woocommerce');

					}
					if (Sonaar_Music::get_option('wc_enable_custom_link_icon', 'srmp3_settings_woocommerce')){
						$icon_html = '<i class="' . Sonaar_Music::get_option('wc_enable_custom_link_icon', 'srmp3_settings_woocommerce') . '"></i>';
					}else{
						$icon_html = '';
					}
					$target = Sonaar_Music::get_option('wc_enable_custom_link_target', 'srmp3_settings_woocommerce');
					$label = Sonaar_Music::get_option('wc_enable_custom_link_label', 'srmp3_settings_woocommerce');
					$response .= '<div class="srp-modal-custom-link"><a href="' . esc_html($link) .'" target="' . esc_html($target) . '">' . $icon_html . esc_html__( $label ) . '</a></div>';
				}
				$response .= '<a onclick="srp_add_to_cart_loadspinner($(this))" href="?add-to-cart='. $_POST['product-id'] .'&variation_id='. $variantList[$variantDefaultIndex]['variantId'] .'" class="add_to_cart_button srp_button' . $wc_ajaxClass . '" data-quantity="1" data-product_id="' . $variantList[$variantDefaultIndex]['variantId'] . '"><i class="fas fa-cart-plus"></i>' . esc_html__( 'Add to cart','woocommerce') . '</a>';
				$response .= '</div>'; //DIV srp-modal-variant-main
				$response .= '</div>'; //DIV srp-modal-variation-list
			}
		}
		echo wp_json_encode($response, JSON_HEX_TAG);
		wp_die();
	}

	public static function srmp3_add_meta_to_order( $order_id, $data ) {
		$order_obj = wc_get_order( $order_id );
		$folder    = "/license-pdfs/";

		foreach ( $order_obj->get_items() as $item_id => $item ) {
			$variation_id = $item->get_variation_id();
			$product = wc_get_product( $variation_id );
			if ( ! $product ) {
				return;
			}
			$attrTermID = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variation_id, 'term_taxonomy_id' );
			$licenseID = array();
			foreach($attrTermID as $value){
				$licenseID = array_merge($licenseID, SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value) );
			
			}
			foreach($licenseID as $value){
				$uploads_dir = wp_get_upload_dir()['baseurl'] . $folder;
				$pdf_link     = "{$uploads_dir}license-agreement-order-{$order_id}-item-{$item_id}.pdf";
				$order_obj->update_meta_data( '_item_'. $item_id . '_srmp3_license_url', $pdf_link );
				$order_obj->update_meta_data( '_has_srmp3_license', 'yes' );
			}
		}
		$order_obj->save();
	}

	/**
	 * undocumented function summary
	 *
	 * Undocumented function long description
	 *
	 * @param Type $var Description
	 * @return type
	 * @throws conditon
	 **/
	public static function email_order_show_license_link( $order_id ) {
		
		/*$option = get_option( 'beats_license_email_setting' );
		if ( isset( $option['show_license_link_order_completed_email']) && $option['show_license_link_order_completed_email'] === 'on' ) {
			$show_link = true;
		} else {
			$show_link = false;
		}*/
		$order_obj = wc_get_order( $order_id );
		$has_license = $order_obj->get_meta( '_has_srmp3_license' );
		if ( 'yes' === $has_license && 'completed' === $order_obj->get_status() ) :
			?>
			<h2><?php esc_html_e( 'License Details', 'sonaar-music-pro' ); ?></h2>
			<?php SRMP3_WooCommerce::srmp3_create_order_licenses_table( $order_obj );
		endif;
	}

	public static function srmp3_add_license_to_order_page( $order_id ) {
		$order_obj = wc_get_order( $order_id );
		$has_license = $order_obj->get_meta( '_has_srmp3_license' );
		if ( 'yes' === $has_license && 'completed' === $order_obj->get_status() ) :
			?>
			<h2><?php esc_html_e( 'License Details', 'sonaar-music-pro' ); ?></h2>
			<?php SRMP3_WooCommerce::srmp3_create_order_licenses_table( $order_obj );
		endif;
	}

	public static function srmp3_create_order_licenses_table( $order_obj ) {
		?>
		<table class="srmp3-order-licenses-table woocommerce-table woocommerce-table--order-details shop_table order_details">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Beat(s)', 'woocommerce' ); ?></th>
					<th><?php esc_html_e( 'License PDF Link', 'sonaar-music-pro' ); ?></th>
				</tr>
			</thead>
		<?php
		foreach ( $order_obj->get_items() as $item_id => $item ) :
			$license_link = $order_obj->get_meta( '_item_'. $item_id . '_srmp3_license_url' );
			$product = $item->get_product();
			if ( $license_link ) :
				?>
				<tr>
					<td><?php echo $product->get_name(); ?></td>
					<td>
						<a href="<?php echo esc_url( $license_link ); ?>" download>
							<?php esc_html_e( 'Download License Agreement', 'sonaar-music-pro' ); ?>
						</a>
					</td>
				</tr>
				<?php
			endif;
		endforeach;
		?>
		</table>
		<?php
	}
	public static function srmp3_review_license_before_submit() {
		$no_licenses = true;
		$cart = WC()->cart->get_cart();
		foreach ( $cart as $cart_item_key => $cart_item ) {
			$product = $cart_item['data'];
			$license =  SRMP3_WooCommerce::srmp3_has_usage_license( $cart_item, $cart_item_key );
			
			$cart[$cart_item_key]['has_license']  = false;

			if ( $license ) {
				$cart[$cart_item_key]['has_license'] = true;
				$no_licenses = false;
			}
		}

		if ( $no_licenses ) {
			return;
		}
		?>
		<div class="woocommerce-checkout-review-order e-checkout__order_review">
			<h3>
				<?php esc_html_e('Review Licenses', 'sonaar-music-pro'); ?>
			</h3>
			
			<table class="">
				<thead>
					<tr>
						<th><?php esc_html_e('Beat', 'sonaar-music-pro'); ?></th>
						<th><?php esc_html_e('License', 'sonaar-music-pro'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ( $cart as $cart_item_key => $cart_item ) {
						$product = $cart_item['data'];
						$license =  SRMP3_WooCommerce::srmp3_has_usage_license( $cart_item, $cart_item_key );
						if ( $cart[$cart_item_key]['has_license'] ) {
							?>
							<tr class="cart_item">
								<td class="product_name" style="font-size:14px;"><?php echo $product->get_name(); ?></td>
								<td>
									<?php SRMP3_WooCommerce::srmp3_add_license_button( $cart_item ); ?>
								</td>
							</tr>
							<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>
		<?php
	}
	public static function srmp3_create_pdf_license( $order_id ) {
		$order_obj = wc_get_order( $order_id );
		$folder    = "/license-pdfs/";

		foreach ( $order_obj->get_items() as $item_id => $item ) {
			$product      = $item->get_product();
			$variation_id = $item->get_variation_id();

			$prod = wc_get_product( $variation_id );
			if ( ! $prod ) {
				return;
			}
			
			$attrTermID = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variation_id, 'term_taxonomy_id' );
			$licenseID = array();
			foreach($attrTermID as $value){
				$licenseID = array_merge($licenseID, SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value) );
			
			}
			foreach($licenseID as $value){
				$template = SRMP3_WooCommerce::generateContract($value, $order_obj, $product->name, $variation_id);
				$html2pdf = new Html2Pdf();
				$html2pdf->writeHTML( stripslashes( $template ) );

				$uploads_dir = wp_get_upload_dir()['basedir'] . $folder;
				file_put_contents( $uploads_dir . 'index.php', '<?php // Silence is golden.' );
				if ( ! is_dir( $uploads_dir ) ) {
					mkdir( $uploads_dir, 0755 );

				}
				$path = "{$uploads_dir}license-agreement-order-{$order_id}-item-{$item_id}.pdf";
				$html2pdf->output( $path, 'F');
			}
		}
	}
	public static function sonaar_shortcode_license($atts = [], $content = null) {
		//exemple de shortcode: [sonaar_license post_id="771" column="true" show_preview_button="true"]
		extract(shortcode_atts(array(
			'post_id' => '',
			'column' =>'',
			'show_preview_button' =>'',
		), $atts));
		if($post_id !== ''){
			$post_id = explode(",", $post_id);
		}else{
			// GET ALL LICENSES FROM CURRENT PRODUCT PAGE
			$post_id = [];
			if(get_post_type() == 'product'){
				$product = wc_get_product(get_the_ID());
				if ($product->is_type( 'variable' )){
					$variations = $product->get_available_variations();
					$variations_id = wp_list_pluck( $variations, 'variation_id' ); 
					if( count($variations_id) > 0){
						foreach ($variations_id  as $variant_id) {
							$productVariationTermIDs = SRMP3_WooCommerce::srp_get_productAttibuteTerm_arg_from_productVariantionId( $variant_id, 'term_taxonomy_id' );
							foreach ( $productVariationTermIDs  as $value) { //Each product attribute term select to the variation
								$post_id = array_merge($post_id, SRMP3_WooCommerce::srp_get_license_post_id_from_attribute_term_id($value));
							}
						}
					}
				}
			}
		}

		$column_class = ($column ==='true') ? ' srp_variant_terms--column' : '';
		//$show_preview_button = 'true';

		$output = '<div class="srp_variant_terms_container' . $column_class . '">';
		foreach($post_id as $value){
			if($post_id != '' && (int)$post_id ){

				$output .= SRMP3_WooCommerce::srp_wc_variation_output_usageTerms( $value, $show_preview_button);
			}
		}
		$output .= '</div>'; // END srp_variant_terms_container

		return $output;
	 }
}
SRMP3_WooCommerce::load();