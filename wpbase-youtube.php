<<<<<<< HEAD
<?php
/* Plugin Name: WPBase Youtube Site Plugin
Plugin URI: http://wpoven.com/
Description: Uses Youtube GData api to create a site, Has vidfetch integration for video conversion.
Version: 1.0
Author: Bakers
Author URI: http://wpoven.com/
License: GPLv2 or later
*/


if(is_admin()) {
    include('wpbase-youtube-admin.php');
}

function myplugin_init() {
 $plugin_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/' ;
 load_plugin_textdomain( 'wpbase', false, $plugin_dir );
}
add_action('plugins_loaded', 'myplugin_init');

include( 'includes/common.php' );
include ('wpbase-widget.php');
include ('wpbase-youtube-init.php');
include ('wpbase-youtube-main.php');

function wpbyURLHandler(&$wp) {

    // override videos and video and redirect to same page 
    global $yPath;

    $request = $_SERVER['REQUEST_URI'];


    if (strstr($request, '/videos/') || strstr($request, '/video/')) {
  
        $parts = explode('/videos/', $request);

        if (count($parts) > 1) {
            $wp->query_vars = array('page'=>'','pagename'=>'videos');
            $yPath = explode('/', "list/" . $parts[1]);
        }

        $parts = explode('/video/', $request);
        if (count($parts) > 1) {
            $wp->query_vars = array('page'=>'','pagename'=>'videos');
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

add_action('widgets_init','wpbyWidget');

=======
<?php
/* Plugin Name: WPBase Youtube Site Plugin
Plugin URI: http://wpoven.com/
Description: Uses Youtube GData api to create a site, Has vidfetch integration for video conversion.
Version: 1.0
Author: Bakers
Author URI: http://wpoven.com/
License: GPLv2 or later
*/


if(is_admin()) {
    include('wpbase-youtube-admin.php');
}
include( 'includes/common.php' );
include ('wpbase-widget.php');
include ('wpbase-youtube-init.php');
include ('wpbase-youtube-main.php');

function wpbyURLHandler(&$wp) {

    // override videos and video and redirect to same page 
    global $yPath;

    $request = $_SERVER['REQUEST_URI'];


    if (strstr($request, '/videos/') || strstr($request, '/video/')) {
  
        $parts = explode('/videos/', $request);

        if (count($parts) > 1) {
            $wp->query_vars = array('page'=>'','pagename'=>'videos');
            $yPath = explode('/', "list/" . $parts[1]);
        }

        $parts = explode('/video/', $request);
        if (count($parts) > 1) {
            $wp->query_vars = array('page'=>'','pagename'=>'videos');
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

add_action('widgets_init','wpbyWidget');

>>>>>>> origin/master
