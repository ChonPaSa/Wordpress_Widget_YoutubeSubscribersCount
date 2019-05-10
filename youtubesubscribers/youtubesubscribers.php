<?php
/**
 * Plugin Name: Youtube Subscribers Widget
 * Plugin URI:  https://github.com/ChonPaSa
 * Description: Basic WordPress Widget to show your Youtube subscribers count
 * Version:     1.0
 * Author:      Choni
 * Author URI:  https://code-fish.eu
 * License:     GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain: youtubesubscribers
 * Domain Path: /languages
 */


// Die if accessed directly

if( !defined('ABSPATH')){
    die;
}

//Load Scripts
require_once plugin_dir_path( __FILE__ ).'/inc/youtubesubscribers-scripts.php';

//Load Class
require_once plugin_dir_path( __FILE__ ).'/inc/youtubesubscribers-class.php';

//Register Widget
function register_youtubesubcribers(){
    register_widget( 'Youtube_Subscribers_Count_Widget' );
}

// Hook
add_action('widgets_init', 'register_youtubesubcribers');