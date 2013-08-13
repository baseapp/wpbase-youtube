
<!-- Search Code -->
<div class="wpby-box">

    <h2><?php _e('Search, Download and Convert Videos', 'wpby'); ?></h2>


    <form method="POST" action="" >
        <input type="text" id="url" name="url" value="<?php echo $input; ?>" style="width:70%;" />
        <span class="buttons">

            <button name="submit" value="Download"><?php _e('Download', 'wpby'); ?></button>

        </span>
    </form>

    <div class="clear"></div>

    <?php
    $canDownload = true;
    $download = get_option('wpby_download');

    if (isset($url) && $download < 2) {

        if ($download) {
            if (!is_user_logged_in()) {
                $canDownload = false;
            }
        }

        if ($canDownload) {
            ?>



            <div id="vidfetchLoader" style="height: 1px;">
                <center>
        <?php
        echo getApplet('http://vidfetch.com/java/VidFetchApplet.signed.jar', 'VidFetchApplet.class', array('url' => $url, 'userAgent' => $_SERVER['HTTP_USER_AGENT']), 1, 1);
        ?>
                </center>
            </div>

            <div id="vidfetchSearching" >
                <center>
                    <img src="<?php echo site_url(); ?>/wp-content/plugins/wpbase-youtube/media/images/loader.gif" alt="loading" />
                    <br />
                    <?php
                    $msg = __("To download videos, please click \'%sRun%s\' when prompted.%s Tick the box \'%sAlways trust content from the publisher%s\' to download seamlessly in the future.",'wpby');                     
                    
                    $msg = sprintf($msg,'<strong>','</strong>','<br />','<strong>','</strong>');                    
                    ?>
                    <span style="color: rgb(204, 51, 51);"><?php _e('', 'wpby'); ?></span>

                </center>

                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        setTimeout("vidfetchDone()",60000);
                    });
                    
                </script>
            </div>
            <br/>
            <div id="vidfetchLinks" class="box" style="display:none;">
                <div class="">
                    <div class="vdetails">
                        <div class="vthumb"></div>
                        <div class="vtitle"></div>
                    </div>
                    <div class="vlinks">
                        <ul class="video"></ul>
                        <ul class="audio"></ul>
                    </div>
                </div>

            </div>

            <div id="vidfetchError"  style="display:none;">
                <center>

                    <span style="color: rgb(204, 51, 51);"><b><?php _e('No Videos found or site not supported.', 'wpby'); ?> </b><br />

        <?php 
        $msg = _e('Please make sure you selected yes when prompted for \' %s Always trust content from the publisher %s \'.', 'wpby');
        echo sprintf($msg,'<strong>','</strong>');
         ?> </span>

                </center>
            </div>
            <div class="clear"></div>

    <?php } else { ?> 
            <div id="vidfetchError">
                <center>

                    <span style="color: rgb(204, 51, 51);"><strong>
        <?php
        $msg = __('Only %s Registered %s users can download videos.', 'wpby');
        echo sprintf($msg, '<a href="'.site_url() . '/wp-login.php'.'">','</a>');
        ?></strong><br />                

                </center>
            </div>
        <?php
        }
    }
    ?>


</div>

<div class="wpby-header">

    <h2><?php _e('Latest Downloads', 'wpby'); ?></h2>    

</div>
<div class="wpby-list">
    <?php
    $i = 0;
    foreach ($downloaded as $video) {
        $i++;
        if ($i > 6)
            break;
        $video['id'] = $video['uid'];
        echo wpbyView('video-block',array('video'=>$video));
}
?>
    <div class="clear"></div>
</div>

<div class="wpby-header">

    <h2><?php _e('Now Playing', 'wpby'); ?></h2>    

</div>
<div class="wpby-list">
    <?php
    $i = 0;
    foreach ($playing as $video) {
        $i++;
        if ($i > 6)
            break;
        $video['id'] = $video['uid'];
        echo wpbyView('video-block',array('video'=>$video));
        
        ?>

<?php
}
?>
</div>

<style type="text/css">
    .entry-header {
        display: none;
    }
</style>