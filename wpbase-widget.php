<?php

function wpbyWidget() {
    register_widget('WPBYWidget');  
}


class WPBYWidget extends WP_Widget {
    
        public function __construct() {
		// widget actual processes
            parent::__construct('wpby_widget','Youtube widget',array('description'=>__('Youtube Popular Videos Widget')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
            
                include( dirname(__FILE__) . '/includes/youtube.php' );
                
                $yt = new Youtube();
                
                $videos = $yt->fetchFeed('http://gdata.youtube.com/feeds/api/standardfeeds/FR/top_rated?time=this_week&format=5&alt=rss&max-results='.$instance['count']);
                                            
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
                        $count = $instance[ 'count' ];
		}
		else {
			$title = __( 'Latest Videos' );
                        $count = '5';
		}
		?>
		<p>
<<<<<<< HEAD
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ,'wpbase'); ?></label> 
=======
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
>>>>>>> origin/master
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

                <p>
<<<<<<< HEAD
		<label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of videos to show:' ,'wpbase'); ?></label> 
=======
		<label for="<?php echo $this->get_field_name( 'count' ); ?>"><?php _e( 'Number of videos to show:' ); ?></label> 
>>>>>>> origin/master
		<input size="3" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
                $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

		return $instance;
	}
        
}