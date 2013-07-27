<?php

/*
  Plugin Name: wpbase-youtube
  Plugin URI: http://wordpress.org/extend/plugins/wpbase_youtube/
  Version: 0.1
  Author: WPOven
  Description: Creates a Video site using Youtube API as per user requirements.
  Text Domain: wpbase_youtube
  License: GPLv3
 */

/*
  "WordPress Plugin Template" Copyright (C) 2013 Michael Simpson  (email : michael.d.simpson@gmail.com)

  This following part of this file is part of WordPress Plugin Template for WordPress.

  WordPress Plugin Template is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  WordPress Plugin Template is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Contact Form to Database Extension.
  If not, see http://www.gnu.org/licenses/gpl-3.0.html
 */

function get_page_by_name($pagename) {
    $pages = get_pages();
    foreach ($pages as $page)
        if ($page->post_title == $pagename)
            return $page;
    return false;
}

add_action('init', 'vidfetch_video_page');

function vidfetch_video_page() {

    $page = get_page_by_name('Videos');
    if (empty($page)) {
        // page does not exists 
        global $user_ID;
        $post = array();
        $post['post_type'] = 'page'; //could be 'page' for example
        $post['post_content'] = '{wpbase-youtube}';   //Shortcode to identify the page
        $post['post_author'] = '1';
        $post['post_status'] = 'publish'; //draft
        $post['post_title'] = 'Videos';
        $postid = wp_insert_post($post);
        add_option("videos-page-id", $postid);
    } else {
        // page does not exist
    }

    $page = get_page_by_name('Video');
    if (empty($page)) {
        // page does not exists 
        global $user_ID;
        $post = array();
        $post['post_type'] = 'page'; //could be 'page' for example
        $post['post_content'] = '';
        $post['post_author'] = '1';
        $post['post_status'] = 'publish'; //draft
        $post['post_title'] = 'Video';
        $postid = wp_insert_post($post);
        add_option("video-page-id", $postid);
    }

    $page = get_page_by_name('Home');
    if (empty($page)) {
        // page does not exists 
        /*     global $user_ID;
          $post = array();
          $post['post_type'] = 'page'; //could be 'page' for example
          $post['post_content'] = '';
          $post['post_author'] = '1';
          $post['post_status'] = 'publish'; //draft
          $post['post_title'] = 'Home';
          $postid = wp_insert_post($post);
          add_option("home-page-id", $postid);

         */
    }
// Create table on plugin activation
    global $wpdb;
    $table_name = $wpdb->prefix . "vidfetch_history";
    if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {      //check if table already exists
        $sql = "CREATE TABLE " . $table_name . " (
    id int(11) NOT NULL AUTO_INCREMENT,
    vid_id VARCHAR(100) NOT NULL,
    vid_title VARCHAR(200) NOT NULL,
    type ENUM('history','downloaded'),
    vid_rating TEXT NOT NULL,
    vid_views int(10) NOT NULL,
    vid_thumbnail VARCHAR(2083) DEFAULT '' NOT NULL,
    UNIQUE KEY id (id) 
    );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

$Wpbase_youtube_minimalRequiredPhpVersion = '5.0';

/**
 * Check the PHP version and give a useful error message if the user's version is less than the required version
 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying
 * an error message on the Admin page
 */
function Wpbase_youtube_noticePhpVersionWrong() {
    global $Wpbase_youtube_minimalRequiredPhpVersion;
    echo '<div class="updated fade">' .
    __('Error: plugin "wpbase-youtube" requires a newer version of PHP to be running.', 'wpbase_youtube') .
    '<br/>' . __('Minimal version of PHP required: ', 'wpbase_youtube') . '<strong>' . $Wpbase_youtube_minimalRequiredPhpVersion . '</strong>' .
    '<br/>' . __('Your server\'s PHP version: ', 'wpbase_youtube') . '<strong>' . phpversion() . '</strong>' .
    '</div>';
}

function Wpbase_youtube_PhpVersionCheck() {
    global $Wpbase_youtube_minimalRequiredPhpVersion;
    if (version_compare(phpversion(), $Wpbase_youtube_minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', 'Wpbase_youtube_noticePhpVersionWrong');
        return false;
    }
    return true;
}

/**
 * Initialize internationalization (i18n) for this plugin.
 * References:
 *      http://codex.wordpress.org/I18n_for_WordPress_Developers
 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631
 * @return void
 */
function Wpbase_youtube_i18n_init() {
    $pluginDir = dirname(plugin_basename(__FILE__));
    load_plugin_textdomain('wpbase_youtube', false, $pluginDir . '/languages/');
}

//////////////////////////////////
// Run initialization
/////////////////////////////////
// First initialize i18n
Wpbase_youtube_i18n_init();


// Next, run the version check.
// If it is successful, continue with initialization for this plugin
if (Wpbase_youtube_PhpVersionCheck()) {
    // Only load and run the init function if we know PHP version can parse it
    include_once('wpbase_youtube_init.php');
    Wpbase_youtube_init(__FILE__);
}
