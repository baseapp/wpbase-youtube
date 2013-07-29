<h2><?php echo $video['title']; ?></h2>
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
    </div>
    <div class="box meta">

        <div class="info">
            <span class="date">  Posted on  <?php echo date('jS M @ H:i', $video['published']); ?> </span>
            <span class="views">  <?php echo number_format($video['views']); ?> </span>
            <span class="favs">  <?php echo number_format($video['favorites']); ?> </span>
            <span class="download">  <?php echo '<a href="' . site_url() . '?url=' . urlencode('http://www.youtube.com/watch?v=' . $video['id']) . '">Download</a>'; ?> </span>
            <span class="rating">  <?php echo stars($video['rating']); ?> </span>
        </div>

        <div class="description">
            <?php
            echo nl2br($video['description']);
            ?>
        </div>

    </div>
</div>

<h2>Related Videos »</h2>
<div class="tags">
    <?php
    $k = 0;
    $tagURLs = array();
    $yt = new Youtube();
    foreach ($video['tags'] as $tag) {


        $videos = $yt->videos($tag, "relevance");
        //var_dump($videos);

        $j = 0;             // used to show just one related video for each tag
        foreach ($videos as $video) {
            $j++;
            ?>
            <div class = "video">
                <div class="thumb">

                    <a class="rotate" href="<?php echo site_url('video/' . $video['id'] . '/' . str_replace(array('"', "'", '/'), '-', $video['title'])); ?>">
                        <span>
                            <img src="<?php echo $video['thumbnail']; ?>0.jpg">
                        </span>

                    </a>

                    <?php echo stars($video['rating'], 's'); ?>
                    <span class="views"> <?php echo number_format($video['views']); ?> </span>
                </div>
                <h3><?php echo $video['title']; ?></h3>            
            </div>  <!-- Video div  --> <?php
            if ($j == 1)
                break;
        }




        $k++;
        if ($k > 4)         //No of related videos to be showen
            break;
    }
            ?>
</div>
<?php
//echo View::quickRender('videos', array('videos' => $related, 'max' => 6));
?>
            
