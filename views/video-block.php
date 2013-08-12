<div class = "video">
    <div class="thumb">

        <a class="rotate" href="<?php echo site_url('video/' . $video['id'] . '/' . str_replace(array('"', "'", '/', " "), '-', $video['title'])); ?>">
            <span><img src="<?php echo $video['thumbnail']; ?>0.jpg"></span>
        </a>
        <div class="thumb-meta">
            <?php echo stars($video['rating'], 's'); ?>
            <span class="views"> <?php echo number_format($video['views']); ?> </span>
        </div>
    </div>
    <h3><?php echo $video['title']; ?></h3>            
</div>  <!-- Video div  --> 