<<<<<<< HEAD
<?php
/* Plugin Name: Wordpress Youtube Site Plugin
Plugin URI: http://wpoven.com/
Description: Wordpres Youtube plugin site
Version: 1.0
Author: Vikas Patial
Author URI: http://wpoven.com/
License: GPLv2 or later
*/


if(is_admin()) {
    include('wpbase_youtube_admin.php');
}



include ('wpbase_youtube_init.php');
include ('wpbase_youtube_main.php');

function wpbyURLHandler(&$wp) {

    // override videos and video and redirect to same page 
    global $yPath;

    $request = $_SERVER['REQUEST_URI'];


    if (strstr($request, '/videos/') || strstr($request, '/video/')) {
  
        $parts = explode('/videos/', $request);

        if (count($parts) > 1) {
            $wp->query_vars['pagename'] = 'videos';
            $yPath = explode('/', "list/" . $parts[1]);
        }

        $parts = explode('/video/', $request);
        if (count($parts) > 1) {
            $wp->query_vars['pagename'] = 'videos';
            $yPath = explode('/', "view/" . $parts[1]);
        }
        
        if(empty($yPath[1])) {
            $yPath[0] = 'home';
        }

    }
}


                
// All the hooks 
register_uninstall_hook(__FILE__,'wpbyUninstall');
register_activation_hook(__FILE__, 'wpbyActivation');
register_deactivation_hook(__FILE__, 'wpbyDeactivation');

// Shortcodes 

add_shortcode('wpbase-youtube', 'wpbyContent');

// All filters 
//add_filter('the_content', 'wpbyContent',19);
//add_filter('the_title', 'wpbyTitle',20);
add_filter('wp_title', 'wpbyPTitle',21,2);
        
// All Actions

if(is_admin()) {
    add_action('admin_menu', 'wpbyOptionsMenu');  
    add_action( 'admin_init', 'wpbySettings' );
} else {
    add_action('parse_request', 'wpbyURLHandler');
    add_action('wp_enqueue_scripts', 'wpbyMedia',20);
    add_action('wp', 'wpbyDispatcher');
}
=======
<?php
/* Plugin Name: Wordpress Youtube Site Plugin
Plugin URI: http://wpoven.com/
Description: Wordpres Youtube plugin site
Version: 1.0
Author: Vikas Patial
Author URI: http://wpoven.com/
License: GPLv2 or later
*/


if(is_admin()) {
    include('wpbase_youtube_admin.php');
}
include ('wpbase_youtube_init.php');
include ('wpbase_youtube_main.php');

function wpbyURLHandler(&$wp) {

    // override videos and video and redirect to same page 
    global $yPath;

    $request = $_SERVER['REQUEST_URI'];


    if (strstr($request, '/videos/') || strstr($request, '/video/')) {
  
        $parts = explode('/videos/', $request);

        if (count($parts) > 1) {
            $wp->query_vars['pagename'] = 'videos';
            $yPath = explode('/', "list/" . $parts[1]);
        }

        $parts = explode('/video/', $request);
        if (count($parts) > 1) {
            $wp->query_vars['pagename'] = 'videos';
            $yPath = explode('/', "view/" . $parts[1]);
        }
        
        if(empty($yPath[1])) {
            $yPath[0] = 'home';
        }

    }
}


                
// All the hooks 
register_uninstall_hook(__FILE__,'wpbyUninstall');
register_activation_hook(__FILE__, 'wpbyActivation');
register_deactivation_hook(__FILE__, 'wpbyDeactivation');

// Shortcodes 

add_shortcode('wpbase-youtube', 'wpbyContent');

// All filters 
//add_filter('the_content', 'wpbyContent',19);
//add_filter('the_title', 'wpbyTitle',20);
add_filter('wp_title', 'wpbyPTitle',21,2);
        
// All Actions

if(is_admin()) {
    add_action('admin_menu', 'wpbyOptionsMenu');  
    add_action( 'admin_init', 'wpbySettings' );
} else {
    add_action('parse_request', 'wpbyURLHandler');
    add_action('wp_enqueue_scripts', 'wpbyMedia',20);
    add_action('wp', 'wpbyDispatcher');
}
>>>>>>> origin/master
