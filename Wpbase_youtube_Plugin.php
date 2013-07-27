<?php

include_once('Wpbase_youtube_LifeCycle.php');

class Wpbase_youtube_Plugin extends Wpbase_youtube_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'ATextInput' => array(__('Enter in some text', 'my-awesome-plugin')),
            'Donated' => array(__('I have donated to this plugin', 'my-awesome-plugin'), 'false', 'true'),
            'CanSeeSubmitData' => array(__('Can See Submission data', 'my-awesome-plugin'),
                'Administrator', 'Editor', 'Author', 'Contributor', 'Subscriber', 'Anyone')
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'wpbase-youtube';
    }

    protected function getMainPluginFileName() {
        return 'wpbase_youtube.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }

    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
        
    }

    public function addActionsAndFilters() {

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }
        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37

        add_action('parse_request', array(&$this, 'setupURLHandler'));
        add_filter('the_content', array(&$this, 'mainDispatcher'));


        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
        //        wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39
        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41
    }

    public function setupURLHandler(&$wp) {

        // override videos and video and redirect to same page 
        global $yPath;

        $request = $_SERVER['REQUEST_URI'];

        if (strstr($request, '/videos/') || strstr($request, '/video/')) {

            $parts = explode('/videos/', $request);
           // echo "var dump of parts";
           // var_dump($parts);
            if (count($parts) > 1) {
                $wp->query_vars['pagename'] = 'videos';
                $yPath = explode('/', "list/" . $parts[1]);
               // var_dump($yPath);
            }

            $parts = explode('/video/', $request);
            if (count($parts) > 1) {
                $wp->query_vars['pagename'] = 'videos';
                $yPath = explode('/', "view/" . $parts[1]);
                //var_dump($yPath);
            }
        }
    }

    public function mainDispatcher($content) {



        if (is_page()) {

            if (strstr($content, '{wpbase-youtube}')) {

                global $yPath;
                include( dirname(__FILE__) . '/classes/youtube.php' );
                include( dirname(__FILE__) . '/helpers/common.php' );

                $replace = "";

                switch ($yPath[0]) {

                    case 'view':

                        $yt = new Youtube();
                        $video = $yt->video($yPath[1]);
                        $replace = $this->getView('video', array('video' => $video));

                        break;

                    case 'list':

                        $yt = new Youtube();

                        $sort = 'relevance';
                        $page = 1;

                        //$size= sizeof($yPath,1);
                        $keywords = $yPath[1];

                        //       for($i=1;$i<$size;$i++) {
                        //echo substr( $yPath[1], 0, 4 ) === "sort";
                        if (substr($yPath[1], 0, 4) === "sort") {      //for videos/sort/key format
                            // echo " in here ";
                            $sort = str_replace("sort", "", $yPath[1]);
                          // echo "sort = " . $sort;
                            $keywords = $yPath[2];
                          // echo " key = " . $keywords;

                            if (substr($yPath[3], 0, 4) === "page") {         //check if page is set
                                $page =$yPath[4];// str_replace("page", "", $yPath[3]);
                                //echo " page = " . $page;
                            }
                        }

                        else if (substr($yPath[2], 0, 4) === "page") {      //for videos/key/page format url
                            //echo "sort = " . $sort;
                           // echo " key = " . $keywords;


                            $page = $yPath[3];//str_replace("page", "", $yPath[2]);
                           // echo " page = " . $page;
                        }


                        //     }

                        $keywords = str_replace(' ', '+', $keywords);

                        
                        
                        $videos = $yt->videos($keywords, $sort, 15, $page);


                        $replace = $this->getView('videos', array('videos' => $videos, 'page' => $page),$keywords,$sort);

                        break;


                    default:
                        $replace = "Last views and Last Downloaded";
                }


                $content = str_replace('{wpbase-youtube}', $replace, $content);
            }
        }

        return $content;
    }

    public function getView($view, $vars, $key=NULL,$sort="relevance") {

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

}
