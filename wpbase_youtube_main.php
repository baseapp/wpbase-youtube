<?php

$wpbyTitle = "";
$wpbyContent = "";



function wpbyDispatcher() {

    global $pageTitle;
    
    if (is_page('videos')) {

        //if (strstr($content, '[wpbase-youtube]')) {

            global $yPath;
            include( dirname(__FILE__) . '/includes/youtube.php' );
            include( dirname(__FILE__) . '/includes/common.php' );

            $title = "";
            $content = "";
            
            switch ($yPath[0]) {

                case 'view':

                    $yt = new Youtube();
                    $video = $yt->video($yPath[1]);
                    $keywords = str_replace(' ', '+', $video['title']);
                    $related = $yt->related($video['id']);                    
                    $content = wpbyView('video', array('video' => $video,'related'=>$related));

                    break;

                case 'list':
                    if (isset($_POST['url'])) {
                        header('Location: ' . site_url('videos/' . $_POST['url'] . ''));
                        break;
                    }
                    $yt = new Youtube();

                    $sort = 'relevance';
                    $page = 1;

                    $keywords = $yPath[1];
                   
                    if (substr($yPath[1], 0, 4) === "sort") {      //for videos/sort/key format
                        $sort = str_replace("sort", "", $yPath[1]);
                        $keywords = $yPath[2];

                        if (substr($yPath[3], 0, 4) === "page") {         //check if page is set
                            $page = $yPath[4];
                        }
                    } else if (substr($yPath[2], 0, 4) === "page") {      //for videos/key/page format url
                        $page = $yPath[3];
                    }
                    
                    if(empty ($keywords)) {
                        
                        $content = wpbyView('home', array(''));
                        
                    } else {
                    
                        $title = '"'.urldecode($keywords).'" Videos';

                        $keywords = str_replace(' ', '+', $keywords);
                        $videos = $yt->videos($keywords, $sort, 15, $page);
                        $content = wpbyView('videos', array('videos' => $videos, 'page' => $page,'title'=>$title, 'keywords'=>$keywords, 'sort'=>$sort));
                    }

                    break;


                default: {
                        $replace = "";
                        //include_once('page-home.php');
                    }
            }
            global $wpbyTitle,$wpbyContent;
            $wpbyTitle  = $title;
            $wpbyContent = $content;
    }

}

function wpbyContent($content) {

    if (strstr($content, '[wpbase-youtube]')) {
            global $wpbyContent;
            $content = str_replace('[wpbase-youtube]', $wpbyContent, $content);        
    }
    return $content;
}

function wpbyTitle($title) {

    if (is_page('videos'))
        if ($title == 'videos' || $title == 'Videos') {
            global $wpbyTitle;
            $title = $wpbyTitle;
        }
    return $title;
}

function wpbyPTitle($title) {

    global $wpbyTitle;
    
    if(!empty ($wpbyTitle)) {
        $title = $wpbyTitle;
    }
    return $title;
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