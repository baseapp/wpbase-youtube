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
            `thumbnail` tinyint(1) NOT NULL,
            `title` tinyint(1) NOT NULL,
            `rating` int(11) NOT NULL,
            `views` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        )";
        //reference to upgrade.php file
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
}


function wpbyDeactivation() {
    
    //remove database     
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