<?php 

/**
 * Plugin Name:       Vendor Templates for Dokan
 * Plugin URI:        https://wordpress.org/plugins/vendor-templates-dokan
 * Description:       A Vendor templates collection plugin for Dokan marketplace plugin. Powered by Dokan and TechRubyat. This plugin gives vendors to lots of vendors templats design collection to change their vendor store looks.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Al Rubyat
 * Author URI:        https://www.techrubyat.com/about_rubyat/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://wordpress.org/plugins/vendor-templates-dokan/
 * Text Domain:       vendor-templates-dokan
 * Domain Path:       /languages
 */

/*
 * Copyright (c) 2022 TechRubyat (email: info@techrubyat.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
require_once 'inc/functions.php';

//enable debug mode
//define('WP_DEBUG', false);

// If this file is called directly, abort.
if(!defined('WPINC')){
    die;
}
// define plugin version
if (!defined('VTFD_PLUGIN_VERSION')){
    define('VTFD_PLUGIN_VERSION', '1.0.0');
}

// define plugin directory
if(!defined('VTFD_PLUGIN_DIR')){
    define('VTFD_PLUGIN_DIR', plugin_dir_url(__FILE__));
}

// Include scripts and styles
if(!function_exists('vtfd_plugin_scripts')){
    function vtfd_plugin_scripts(){
        wp_enqueue_style('vtfd-css', VTFD_PLUGIN_DIR. 'assets/css/style.css' );
        //wp_enqueue_script('vtfd-js', VTFD_PLUGIN_DIR. 'assets/js/main.js','jQuery','1.0.0', true);
    }
    Add_action('wp_enqueue_scripts','vtfd_plugin_scripts');
}

// add menu to admin dashboard
function vtfd_register_menu_page(){
    add_menu_page('Vendor Templates Dokan','Vendor Templates','manage_options', 'wpvendor-setting', 'wpvendor-setting-page-html', 'dashicons-id', '30');
}
add_action('admin_menu','vtfd_register_menu_page');


?>