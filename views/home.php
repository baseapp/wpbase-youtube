
<!-- Search Code -->
<div class="wpby-box">
    <h2> Search, Download and Convert Videos</h2>

    <form method="POST" action="" >
        <input type="text" id="url" name="url" value="<?php echo $input; ?>" style="width:400px;" />
        <span class="buttons">
            <button name="submit" value="Download">Download</button>
        </span>
    </form>

    <div class="clear"></div>
</div>

<div class="wpby-header">
    <h2>Latest Downloads</h2>    
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

                    <a class="rotate" href="<?php echo site_url('video/' . $video['uid'] . '/' . str_replace(array('"', "'", '/'), '-', $video['title'])); ?>">
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
    <h2>Now Playing</h2>    
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

                    <a class="rotate" href="<?php echo site_url('video/' . $video['uid'] . '/' . str_replace(array('"', "'", '/'), '-', $video['title'])); ?>">
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