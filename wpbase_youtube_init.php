<?php

// Basic activation and deactivation 

function wpbyActivation() {
    
    // install database     
}


function wpbyDeactivation() {
    
    //remove database     
}

function wpbyMedia() {
    wp_enqueue_script('jquery');

    wp_register_script('wpby_script', plugins_url('media/js/script.js', __FILE__),array("jquery"));
    wp_enqueue_script('wpby_script');

    wp_register_style('wpby_style', plugins_url('media/css/style.css', __FILE__));
    wp_enqueue_style('wpby_style');

}