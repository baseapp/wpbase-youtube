<?php

function wpbyWidget() {
    register_widget('WPBYWidget');  
}


class WPBYWidget extends WP_Widget {
    
        var $_params = 'title,count,ytuser,ytsort,ytregion,yttframe,ytkeyword';
    
        public function __construct() {
		// widget actual processes
            parent::__construct('wpby_widget','Youtube widget',array('description'=>__('Youtube Popular Videos Widget')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
            
                include( dirname(__FILE__) . '/includes/youtube.php' );
                
                $yt = new Youtube();
                
                extract($instance);
                $orderby = "";
                if(!strstr('_', $ytsort)) {
                    $orderby = '&orderby='.$ytsort;      
                }
                    
                if(!empty($ytuser)) {
                    
                    $ukeywords = "";
                    if(!empty($ytkeyword)) {
                        $ukeywords = "&vq=".$ytkeyword;
                    }
                    
                    $videos = $yt->fetchFeed("http://gdata.youtube.com/feeds/api/users/$ytuser/uploads?max-results=$count$orderby&format=5&alt=json$ukeywords");
                    
                } else if(!empty($ytkeyword)) {
                    $videos = $yt->fetchFeed("http://gdata.youtube.com/feeds/api/videos?vq=$ytkeyword$orderby&max-results=$count&format=5&alt=json");                                            
                } else {
                    $videos = $yt->fetchFeed('http://gdata.youtube.com/feeds/api/standardfeeds/'.(empty($ytregion)?'':$ytregion.'/').$ytsort.'?time='.$yttframe.'&format=5&alt=json&max-results='.$count);
                }
                
                                                                            
                $title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
                ?>
                <div class="wpby-widget">
                <ul>
                <?php 
                                
                foreach ($videos as $video) {
                    if(empty ($video['title'])) continue;
                    ?>
                    <li>
                        <a href="<?php echo site_url().'/video/' . $video['id'] . '/' . str_replace(array('"', "'", '/'," "), '-', $video['title']); ?>">
                        <img src="<?php echo $video['thumbnail'];?>1.jpg" title="<?php echo $video['title'];?>" />
                        <span class="duration">
                        <?php echo minutes($video['duration']);?>
                        </span>                            
                         <?php // echo $video['title'];?>
                        </a>
                    </li>

                    <?php                     
                }?>
                </ul>
                </div>
                <?php 
		
                echo $args['after_widget'];
                
                
                
                
                
                // https://gdata.youtube.com/feeds/api/standardfeeds/FR/most_popular
	}

 	public function form( $instance ) {
            
                $params = explode(',',$this->_params);
                
                foreach($params as $param) {
                    $$params = "";
                }
            
		if ( isset( $instance[ 'title' ] ) ) {
                        extract($instance);
		}
		else {
			$title = __( 'Latest Videos' );
                        $count = '5';
		}
                
                include( dirname(__FILE__) . '/includes/youtube.php' );                
                $yt = new Youtube();                
                
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ,'wpbase'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
                
                <p>
		<label for="<?php echo $this->get_field_name( 'ytuser' ); ?>"><?php _e( 'Youtube Username' ,'ytuser'); ?> ( If user feed )</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ytuser' ); ?>" name="<?php echo $this->get_field_name( 'ytuser' ); ?>" type="text" value="<?php echo esc_attr( $ytyuser ); ?>" />
		</p>
                
                <p>
		<label for="<?php echo $this->get_field_name( 'ytkeyword' ); ?>"><?php _e( 'Youtube Keyword' ,'wpbase'); ?> ( Search based )</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ytkeyword' ); ?>" name="<?php echo $this->get_field_name( 'ytkeyword' ); ?>" type="text" value="<?php echo esc_attr( $ytkeyword ); ?>" />
		</p>
                

                <p>
		<label for="<?php echo $this->get_field_name( 'ytsort' ); ?>"><?php _e( 'Video Sorting'); ?></label> <br />
                <select class="" id="<?php echo $this->get_field_id( 'ytsort' ); ?>" name="<?php echo $this->get_field_name( 'ytsort' ); ?>">                    
                <?php
                foreach($yt->getSorts() as $var=>$val) {               
                ?>
                    <option value="<?php echo $var;?>" <?php if($ytsort == $var) { echo "selected"; }?> ><?php echo $val;?></option>
                <?php 
                } 
                ?>    
                
                </select>
                </p>
                
                <p>
		<label for="<?php echo $this->get_field_name( 'ytregion' ); ?>"><?php _e( 'Region specific'); ?></label> <br />
                <select class="" id="<?php echo $this->get_field_id( 'ytregion' ); ?>" name="<?php echo $this->get_field_name( 'ytregion' ); ?>">                    
                    <option value="">-</option>
                <?php foreach($yt->getRegions() as $var=>$val) {   ?>
                    <option value="<?php echo $var;?>"  <?php if($ytregion == $var) { echo "selected"; }?> ><?php echo $val;?></option>
                <?php }   ?>                    
                </select>
                </p>
                
                <p>
		<label for="<?php echo $this->get_field_name( 'yttframe' ); ?>"><?php _e( 'Time frame'); ?></label> <br />
                <select class="" id="<?php echo $this->get_field_id( 'yttframe' ); ?>" name="<?php echo $this->get_field_name( 'yttframe' ); ?>">                    
                <?php foreach($yt->getTimeFrames() as $var=>$val) {   ?>
                    <option value="<?php echo $var;?>"  <?php if($yttframe == $var) { echo "selected"; }?> ><?php echo $val;?></option>
                <?php }   ?>                    
                </select>
                </p>
                
                <p>
		<label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of videos to show:' ,'wpbase'); ?></label> 
                <br />
		<input size="3" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
		</p>
                
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
                
                $params = explode(',',$this->_params);
                
                foreach($params as $param) {
                    if( isset($new_instance[$param] ) && !empty($new_instance[$param] ) ) {
                    $instance[$param] = strip_tags( $new_instance[$param] );
                    }
                }
                
		return $instance;
	}
        
}