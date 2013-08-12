<?php

// Basic activation and deactivation 

function wpbyActivation() {

    // create table 
    global $wpdb;
    $table_name = $wpdb->prefix . "wpbase_youtube";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $sql = "CREATE TABLE " . $table_name . " (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `uid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
              `type_id` tinyint(1) NOT NULL DEFAULT '0',
              `thumbnail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
              `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
              `rating` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
              `views` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
              PRIMARY KEY (`id`)
        )";
        //reference to upgrade.php file
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
}


function wpbyDeactivation() {
        global $wpdb;
        $table = $wpdb->prefix."wpbase_youtube";
	$wpdb->query("DROP TABLE IF EXISTS $table");        
}

function wpbyUninstall() {
    
}

function wpbyMedia() {
    wp_enqueue_script('jquery');

    wp_register_script('wpby_script', plugins_url('media/js/script.js', __FILE__),array("jquery"));
    wp_enqueue_script('wpby_script');

    wp_register_style('wpby_style', plugins_url('media/css/style.css', __FILE__));
    wp_enqueue_style('wpby_style');
    


}

function wpbyView($view, $vars) {

    $viewsDir = dirname(__FILE__) . '/views/';
    $viewPath = dirname(__FILE__) . '/views/' . $view . '.php';
    if (!is_file($viewPath)) {
        throw new Exception('View not found');
    }

    extract($vars);
    ob_start();

    include $viewPath;
    $retVal = ob_get_contents();
    ob_end_clean();

    return $retVal;
}