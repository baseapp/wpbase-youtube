<div class="wpby-header">
<h2><?php echo $video['title']; ?></h2>
</div>
<div class="wpby-video">
    <div class="watch">
    <?php
    //var_dump($video);
    global $wpdb;
    $table_name = "wp_vidfetch_history";
    $rows_affected = $wpdb->insert($table_name, array(
        'vid_id' => $video['id'],
        'vid_title' => $video['title'],
        'type' => 'history',
        'vid_rating' => $video['rating'],
        'vid_views' => $video['views'],
        'vid_thumbnail' => $video['thumbnail']
            ));
    ?>
    <div class="embed">

        <iframe width="600" height="355" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/<?php echo $video['id']; ?>?rel=0&amp;autoplay=1"></iframe>

        <?php echo $embed; ?>
        <form id="df" method="POST" action="<?php echo site_url();?>/videos/" style="margin:0px; padding: 0px;">
        <input type="hidden" name="url" value="http://www.youtube.com/watch?v=<?php echo $video['id'];?>">    
        </form>
    </div>
    <div class="box meta">

        <div class="info">
            <span class="date">  Posted on  <?php echo date('jS M @ H:i', $video['published']); ?> </span>
            <span class="views">  <?php echo number_format($video['views']); ?> </span>
         
           
            <span class="download"><a href="#"  onclick="jQuery('#df').submit();">  Download </a></span>
             
            <span class="rating">  <?php echo stars($video['rating']); ?> </span>
        </div>

        <div class="description">
            <?php
            echo nl2br($video['description']);
            ?>
        </div>

    </div>
</div>
</div>

<div class="wpby-header">
<h2>Related Videos </h2>
</div>

<div class="wpby-list">
    <?php
        $i = 0;
        foreach ($related as $video) { 
            $i++;
            if($i > 9) break;
            ?>

            <div class = "video">
                <div class="thumb">

                    <a class="rotate" href="<?php echo site_url('video/' . $video['id'] . '/' . str_replace(array('"', "'", '/'), '-', $video['title'])); ?>">
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