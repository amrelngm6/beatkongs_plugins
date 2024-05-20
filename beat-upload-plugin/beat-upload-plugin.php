<?php
/**
 * Plugin Name: Beat Upload Plugin
 * Description: A custom plugin to upload beats in the Dokan Vendor Dashboard.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: beat-upload-plugin
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the main plugin functionality
include_once plugin_dir_path(__FILE__) . 'includes/beat-upload-functions.php';
