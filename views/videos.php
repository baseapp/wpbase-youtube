<!-- Header Part-->

<div class="wpby-header"> <h2> <?php echo $title; ?>   </h2>
    <div class="sorting">
        <?php
        $sortMap = array('relevance' => 'Relevance', 'latest' => 'Latest', 'popular' => 'Popular', 'top' => 'Top');
        $sortMap['relevance']=__('Relevance','wpbase');
        $sortMap['latest']=__('Latest','wpbase');
        $sortMap['popular']=__('Popular','wpbase');
        $sortMap['top']=__('Top','wpbase');
        foreach ($sortMap as $var => $val) {
            $var = str_replace('/', '', $var);

            if ($var == $sort) {
                echo '<span class="current">' . _e($val,'wpbase') . '</span>';
            } else {
                ?> 
                <a title="<?php echo $var; ?>" href="<?php echo site_url(); ?>/videos/sort<?php echo $var . '/' . $keywords; ?>"><span><?php echo $val; ?></span></a> <?php
            }
        }
        ?>
    </div>
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
                    <a class="rotate" href="<?php echo site_url().'/video/' . $video['id'] . '/' . str_replace(array('"', "'", '/'," "), '-', $video['title']); ?>">
                        <span>
                            <img src="<?php echo $video['thumbnail']; ?>0.jpg">
                        </span>
                    </a>
                    <?php echo stars($video['rating'], 's'); ?>
                    <span class="views"> <?php echo number_format($video['views']); ?> </span>
                </div>
                <h3><?php echo truncate($video['title'], 50); ?></h3>            
            </div>  <!-- Video div  --> 
            <?php
        }
        ?> 

    </div>   <!-- Videos div -->
    <div class="clear"></div>
</div>

<!-- Bottom Paging -->
<div class="wpby-footer">

    <?php
    $url = site_url() . '/videos/sort' . $sort . '/' . $keywords . '/';
    $totalPages = ceil(($video['count'] / 15));
    if ($totalPages > 50) {
        $totalPages = 50;
    }
    echo paginate_links(array('base' => $url . '%_%', 'format' => 'page/%#%', 'total' => $totalPages, 'current' => $page));
    ?>

</div>
<style type="text/css">
    .entry-header {
        display: none;
    }
</style>