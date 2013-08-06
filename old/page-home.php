<!-- Search Code -->
<div class="box">
    <h2> Search, Download and Convert Videos</h2>

    <form method="POST" action="<?php echo site_url('videos/'); ?>" >
        <input type="text" id="url" name="url" value="<?php echo $input; ?>" />
        <span class="buttons">
            <button name="submit" value="Download"><img src="<?php echo plugins_url('wpbase_youtube/images/download.png') ?>" />Download</button>
        </span>
    </form>

    <div class="clear"></div>
</div>
<!-- End Search Code -->
<h2>Latest Downloads</h2>


<h2>Now Playing</h2>
<?php
global $wpdb;


$vid_count = $wpdb->get_var("SELECT COUNT(*) FROM wp_vidfetch_history WHERE type='history'");
if ($vid_count > 8) {
    $wpdb->query('DELETE FROM wp_vidfetch_history WHERE type="history" ORDER BY id ASC LIMIT 4;');
}
$vid_viewed = $wpdb->get_results("SELECT * FROM wp_vidfetch_history 
WHERE type = 'history'");
//var_dump($vid_viewed);
$j = 0;     // used to dislpay how many videos to be shown

foreach ($vid_viewed as $video) {

    $j++;
    ?>
    <div class = "video">
        <div class="thumb">

            <a class="rotate" href="<?php echo site_url('video/' . $video->vid_id . '/' . str_replace(array('"', "'", '/'), '-', $video->vid_title)); ?>">
                <span>
                    <img src="<?php echo $video->vid_thumbnail; ?>0.jpg">
                </span>

            </a>

            <?php echo stars($video->vid_rating, 's'); ?>
            <span class="views "> <?php echo number_format($video->vid_views); ?> </span>
        </div>
        <h3><?php echo $video->vid_title; ?></h3>            
    </div>  <!-- Video div  --> <?php
        if ($j == 5)
            break;
    }