<!-- Header Part-->
<div class="wpby-header">





</div>
<!-- Video Listing -->
<div class="wpby-list">
    <div class="videos">    
        
        <?php $k = 0; 
        foreach ($videos as $video) { 
            $k++;
            ?>
        <?php //var_dump($video); ?>
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
            </div>  <!-- Video div  --> 
        <?php 
        if($k%3==0)
        echo '<div class="clear"></div>';
           
        } ?> 

    </div>   <!-- Videos div -->
</div>

<!-- Bottom Paging -->
<div class="wpby-footer">
    <div class="pager">
        <div class="paging">

    
    </div>
        
    </div>
    
</div>
