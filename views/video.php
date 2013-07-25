<h2><?php echo $video['title']; ?></h2>
<div class="watch">
    <div class="embed">
        
        <iframe width="600" height="355" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/<?php echo $video['id'];?>?rel=0&amp;autoplay=1"></iframe>
        
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
            foreach ($video['tags'] as $tag) {
                $tagURLs[] = site_url($tag, $tag);
                $k++;
                if ($k > 20
                
                    )break;
            }
            echo implode(' , ', $tagURLs);
            ?>
        </div>
<?php
            //echo View::quickRender('videos', array('videos' => $related, 'max' => 6));
?>
            
