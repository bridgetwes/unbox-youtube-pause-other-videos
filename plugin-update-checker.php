<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


$plugin_update_checker_path = plugin_dir_path( __FILE__ ) . 'vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';

if (file_exists($plugin_update_checker_path)) {
    require_once $plugin_update_checker_path;
} 
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

function unbox_cleanup_plugin_updater() {
    if ( class_exists( 'YahnisElsts\PluginUpdateChecker\v5\PucFactory' ) ) {
        $myUpdateChecker = PucFactory::buildUpdateChecker(
            'https://github.com/bridgetwes/unbox-youtube-pause-other-videos/',
            plugin_dir_path( __FILE__ ) . 'unbox-youtube-pause-other-videos.php',
            'unbox-youtube-pause-other-videos'
        );
        
        // Set the branch that contains the stable release.
        $myUpdateChecker->setBranch('main');
        
        // Optional: If it's a private repository, set the access token
        //$myUpdateChecker->setAuthentication('');
    }
}
add_action('init', 'unbox_cleanup_plugin_updater'); 