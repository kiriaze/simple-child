	<header role="banner" id="header">

		<div class="brand">
			<?php do_action('simple_header_logo', 'simple_header_logo'); ?>
		</div>

		<nav id="nav">
			<?php simple_menu_output( array('theme_location'=>'main-menu', 'container' => '', 'menu_class'=>'main-menu') ); ?>
		</nav>

	</header>