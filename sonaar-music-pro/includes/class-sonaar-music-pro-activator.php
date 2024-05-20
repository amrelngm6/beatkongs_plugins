<?php

/**
 * Fired during plugin activation
 *
 * @link       sonaar.io
 * @since      1.0.0
 *
 * @package    Sonaar_Music_Pro
 * @subpackage Sonaar_Music_Pro/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sonaar_Music_Pro
 * @subpackage Sonaar_Music_Pro/includes
 * @author     Edouard Duplessis <eduplessis@gmail.com>
 */
class Sonaar_Music_Pro_Activator {

	/**
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$charset_collate = $wpdb->get_charset_collate();
		
		$max_index_length = 191;
		
		$sonaar_events = $wpdb->prefix . 'sonaar_events';
		if($wpdb->get_var("show tables like '$sonaar_events'") != $sonaar_events) {
			$tables = "CREATE TABLE $sonaar_events (
							  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
							  action varchar(32) NOT NULL,
							  target_url varchar(255) NOT NULL,
							  target_title text NOT NULL,
							  target_time int(6) NOT NULL DEFAULT 0,
							  page_title text NOT NULL,
							  page_url varchar(255) NOT NULL,
							  client_uid varchar(22) NOT NULL,
							  client_ip varchar(39) NOT NULL,
							  created datetime NOT NULL default '0000-00-00 00:00:00',
							  PRIMARY KEY  (id),
							  KEY target_action (action,target_time,created,target_url($max_index_length))
							) $charset_collate;";
							
			dbDelta( $tables );
		}
	}

}
