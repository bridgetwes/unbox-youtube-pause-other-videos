<?php
/**
 * Plugin Name: Unbox Youtube Pause Other Videos 
 * Plugin URI: https://github.com/bridgetwes/unbox-remove-superfluous-things
 * Description: When multiple youtube videos on page, pause any playing video when start another.
 * Version: 1.0
 * Author: Bridget Wessel
 * Author URI: http://unboxinteractive.com
 * License: Proprietary
 * Text Domain: unbox-youtube-pause-other-videos
 * GitHub Plugin URI: bridgetwes/unbox-youtube-pause-other-videos
 * GitHub Branch: main
 */

 // Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the update checker
require_once plugin_dir_path( __FILE__ ) . 'plugin-update-checker.php';

//Add hook to enqueue script
add_action('wp_enqueue_scripts', 'unbox_youtube_pause_other_videos');

function unbox_youtube_pause_other_videos() {
    wp_enqueue_script('unbox-youtube-pause-other-videos', plugin_dir_url(__FILE__) . 'script.js', null, '1.0', 
        array(
            'in_footer' => true,
            'strategy'  => 'defer',
        )
    );
}
