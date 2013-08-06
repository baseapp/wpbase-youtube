<!-- Header Part-->

<div class="sorting">
    <?php
    $sortMap = array('relevance' => 'Relevance', 'latest' => 'Latest', 'popular' => 'Popular', 'top' => 'Top');
    foreach ($sortMap as $var => $val) {
        $var = str_replace('/', '', $var);

        if ($var == $sort) {
            echo '<span class="current">' . $val . '</span>';
        } else {
            ?> <a title="<?php echo $var; ?>" href="<?php echo site_url(); ?>/videos/sort<?php echo $var; ?>/<?php echo $key; ?>"><span><?php echo $val; ?></span></a> <?php
    }
}
    ?>
</div>

<div class="clear"></div>

<div class="wpby-header">




</div>
<!-- Video Listing -->
<div class="wpby-list">
    <div class="videos">    

        <?php
        $k = 0;

        foreach ($videos as $video) {
            $k++;
            ?>
            <?php //var_dump($video);   ?>
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
            if ($k % 5 == 0)
                echo '<div class="clear"></div>';
        }
        ?> 

    </div>   <!-- Videos div -->
</div>

<!-- Bottom Paging -->
<div class="wpby-footer">
    <div class="pager">
        <?php
        $previous = '<span>' . __('&lt; Prev') . '</span>';

        $next = '<span>' . __('Next &gt;') . '</span>';

        $total_page = ceil(($video['count'] / 15));
        ?>
        <div class="paging">

            <?php if ($page > 1) {
                ?> <a title="<?php echo $previous; ?>" href="<?php
            echo site_url();
            echo '/videos/sort' . $sort . '/' . $key . '/page' . ($page - 1);
                ?>"> <?php
               echo $previous;
           }
            ?> </a> <?php
                if (($page - 1) > 0 && ($page <= $total_page)) {
                ?> <a title="<?php echo $page ?>" href="<?php
                echo site_url();
                echo '/videos/sort' . $sort . '/' . $key . '/page' . ($page - 1);
                ?>"> 
                    <span><?php
                echo ($page - 1);
            }
            ?> </span></a> <?php ?><span><b><?php echo $page; ?></b></span> 



            <?php if (($page + 1) <= $total_page) {
                ?> <a title="<?php echo ($page + 1); ?>" href="<?php
            echo site_url();
            echo '/videos/sort' . $sort . '/' . $key . '/page' . ($page + 1);
                ?>"> 
                    <?php ?><span><?php echo ($page + 1);
                    ?></span>
                </a> <?php
                } else {
                    echo $page;
                    ?><br /><?php if (($page + 1) <= $total_page) echo ($page + 1); ?> <br /> <?php
            if (($page + 2) <= $total_page)
                echo ($page + 2);
        }
        if ($page != $total_page) {
                    ?> <a title="<?php echo $next; ?>" href="<?php
            echo site_url();
            echo '/videos/sort' . $sort . '/' . $key . '/page' . ($page + 1);
                    ?>"> <?php
               echo $next;
                    ?> </a> <?php } ?>



        </div>

    </div>

</div>
