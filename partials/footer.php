	<footer role="contentinfo" id="footer">

		<?php do_action('simple_footer_widget_area', 'simple_footer_widget_area'); ?>

		<div class="row footer-top">
		    <nav class="columns-2">
		        <?php simple_menu_output(array('theme_location'=>'footer-menu','container' => '','menu_class'=>'footer-menu')); ?>
		    </nav>
			<div class="columns-2 social-foot-wrapper">
	    		<?php
		        	do_action('simple_social_footer', array(
		        		'icon'	=>	false,
						// 'classes' 	=> array('flip','square', 'btn'),
						'iconFont'	=> 'fa'
					));
				?>
	    	</div>
	    </div>

	    <div class="row footer-bottom">
	    	<div class="columns-30 copyright">
	    		<p>
	    			<?php echo of_get_option('footer_copyright_text'); ?>
	    		</p>
	    	</div>
	    	<nav class="columns-70">
		        <?php simple_menu_output(array('theme_location'=>'footer-menu','container' => '','menu_class'=>'footer-menu')); ?>
		    </nav>
	    </div>

	</footer>