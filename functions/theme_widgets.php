<?php
global $simple_widgets;
$simple_widgets = array( 'simple_example_widget' );

class simple_example_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'simple_example_widget', // unique
			'template: Test Widget',
			array( 
				'description' => __( 'Simple Example Widget', SIMPLE_THEME_SLUG )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		
		?>
		<div class="widget">
			<h5 class="widgettitle">Widget</h5>
			<p>Test widget</p>
		</div>
		<?php
	}

}

add_action('widgets_init', function() {
	global $simple_widgets;
	foreach( $simple_widgets as $widget ) {
		register_widget( $widget );
	}
});
