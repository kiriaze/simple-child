<script>
	// JAVASCRIPT HOOK VARS
	var framework_url	 		= '<?php echo get_template_directory_uri(); ?>/';
	var template_url 			= '<?php echo get_stylesheet_directory_uri(); ?>/';
	var plugins_url 			= '<?php echo plugins_url(); ?>/';
	var front_page   			= '<?php echo is_front_page(); ?>';
	var is_singular				= '<?php echo is_singular(); ?>';
	var page_name				= "<?php echo preg_replace('/\W/', '_', strtolower(simple_title()) ); ?>";
	var iOS						= ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false );
	var simple_theme_slug		= '<?php echo strtolower(get_template()); ?>';

	// Parent Options
	var smooth_scroll			= "<?php echo of_get_option('general_multi_checkbox')['smooth_scroll']; ?>";
	var back_to_top				= "<?php echo of_get_option('general_multi_checkbox')['back_to_top']; ?>";
	var infinite_scroll			= "<?php echo of_get_option('blog_multi_checkbox')['infinite_scroll']; ?>";
	var disable_comments		= "<?php echo of_get_option('blog_multi_checkbox')['disable_comments']; ?>";

	var site_url                = "<?php echo site_url(); ?>";
	var template				= "<?php echo basename( get_page_template() ); ?>"

	<?php
	// output options in array as js vars like above, potentially cleaner
	// $options = get_option('simple_options');
	// sp($options);
	// foreach ( $options as $key => $value ) {
	// 	//  Check type
	//     if ( is_array($value) ){
	//         //  Scan through inner loop
	// 		foreach ($value as $key => $value) {
	// 			echo 'var '. $key . ' = "' . $value .'";';
	// 			echo "\n";
	// 		}
	//     }else{
	//         echo 'var '. $key . ' = "' . $value .'";';
	// 		echo "\n";
	//     }
	// }
	?>
</script>