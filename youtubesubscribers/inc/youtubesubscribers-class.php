<?php

/**
 * Adds Youtube_Subscribers_Count_Widget .
 */
class Youtube_Subscribers_Count_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'ytsc_widget', // Base ID
			esc_html__( 'Youtube Subscribers Count Widget ', 'youtubesubscribers' ), // Name
			array( 'description' => esc_html__( 'Widget to show the count of Youtube subscribers', 'youtubesubscribers' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget'];
        
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        //Widget Content output
				echo '<div class="g-ytsubscribe" 
										data-channel="'.$instance['channel'].'" 
										data-layout="'.$instance['layout'].'" 
										data-count="'.$instance['count'].'">
							</div>';
        
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Youtube Subscribers', 'youtubesubscribers' );
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'Your Channel Here', 'youtubesubscribers' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'Default', 'youtubesubscribers' );
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'Default', 'youtubesubscribers' );


		?>
        <!--Title-->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
            <?php esc_attr_e( 'Title:', 'youtubesubscribers' ); ?>
          </label> 
		  <input class="widefat" type="text" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            value="<?php echo esc_attr( $title ); ?>"
          />
		</p>
        <!--Channel-->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
            <?php esc_attr_e( 'Channel:', 'youtubesubscribers' ); ?>
          </label> 
		  <input class="widefat" type="text" 
            id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
            value="<?php echo esc_attr( $channel ); ?>"
          />
		</p>
		  <!--Layout-->
			<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
            <?php esc_attr_e( 'Layout:', 'youtubesubscribers' ); ?>
          </label> 
		  <select class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" >
				<option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>Default</option>
				<option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>Full</option>
      </select>
		</p>
		  <!--Count-->
			<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
            <?php esc_attr_e( 'Count:', 'youtubesubscribers' ); ?>
          </label> 
		  <select class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" >
				<option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>Default</option>
				<option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>Hidden</option>
      </select>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';

		return $instance;
	}

} // class Youtube_Subscribers_Count_Widget