
<!-- Search Code -->
<div class="wpby-box">

    <h2><?php _e('Search, Download and Convert Videos','wpbase');?></h2>


    <form method="POST" action="" >
        <input type="text" id="url" name="url" value="<?php echo $input; ?>" style="width:70%;" />
        <span class="buttons">

            <button name="submit" value="Download"><?php _e('Download','wpbase');?></button>

        </span>
    </form>

    <div class="clear"></div>
    
    <?php if(isset ($url)) { 
    
        if(is_user_logged_in()) {
        
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
                <img src="<?php echo site_url();?>/wp-content/plugins/wpbase-youtube/media/images/loader.gif" alt="loading" />
                <br />

                <span style="color: rgb(204, 51, 51);"><?php _e('To download videos, please click \'<b>Run</b>\' when prompted.<br> Tick the box \'<b>Always trust content from the publisher</b>\' to download seamlessly in the future.','wpbase'); ?></span>

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

                <span style="color: rgb(204, 51, 51);"><b><?php _e('No Videos found or site not supported.','wpbase');?> </b><br />
                    
                    <?php _e('Please make sure you selected yes when prompted for \'<b>Always trust content from the publisher</b>\'.','wpbase');?> </span>

            </center>
        </div>
        <div class="clear"></div>
    
    <?php } else {?> 
        <div id="vidfetchError">
            <center>

                <span style="color: rgb(204, 51, 51);"><b><?php _e('Only logged in users can download videos.','wpbase');?> </b><br />                

            </center>
        </div>
    <?php }    
    }
?>
    
    
</div>

<div class="wpby-header">

    <h2><?php _e('Latest Downloads','wpbase');?></h2>    

</div>
<div class="wpby-list">
    <?php
        $i = 0;
        foreach ($downloaded as $video) { 
            $i++;
            if($i > 6) break;
            ?>

            <div class = "video">
                <div class="thumb">

                    <a class="rotate" href="<?php echo site_url('video/' . $video['uid'] . '/' . str_replace(array('"', "'", '/'," "), '-', $video['title'])); ?>">
                        <span><img src="<?php echo $video['thumbnail']; ?>0.jpg"></span>
                    </a>

                    <?php echo stars($video['rating'], 's'); ?>
                    <span class="views"> <?php echo number_format($video['views']); ?> </span>
                </div>
                <h3><?php echo $video['title']; ?></h3>            
            </div>  <!-- Video div  --> <?php
         }
            ?>
            <div class="clear"></div>
</div>

<div class="wpby-header">

    <h2><?php _e('Now Playing','wpbase');?></h2>    

</div>
<div class="wpby-list">
    <?php
        $i = 0;
        foreach ($playing as $video) { 
            $i++;
            if($i > 6) break;
            ?>

            <div class = "video">
                <div class="thumb">

                    <a class="rotate" href="<?php echo site_url('video/' . $video['uid'] . '/' . str_replace(array('"', "'", '/'," "), '-', $video['title']) ); ?>">
                        <span><img src="<?php echo $video['thumbnail']; ?>0.jpg"></span>
                    </a>

                    <?php echo stars($video['rating'], 's'); ?>
                    <span class="views"> <?php echo number_format($video['views']); ?> </span>
                </div>
                <h3><?php echo $video['title']; ?></h3>            
            </div>  <!-- Video div  --> <?php
         }
            ?>
</div>

<style type="text/css">
    .entry-header {
        display: none;
    }
</style>