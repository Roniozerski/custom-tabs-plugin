<?php
/**
 * Plugin Name: Custom Tabs Plugin
 * Description: Responsive tabs component powered by ACF.
 * Version: 1.0.0
 * Author: Roni Ozerski
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}
define('CTP_PATH', plugin_dir_path(__FILE__));
define('CTP_URL', plugin_dir_url(__FILE__));
define( 'CTP_VERSION', '1.0.0' );

require_once CTP_PATH . 'inc/options-page.php';
require_once CTP_PATH . 'inc/acf-fields.php';
require_once CTP_PATH . 'inc/shortcode.php';
require_once CTP_PATH . 'inc/enqueue.php';
