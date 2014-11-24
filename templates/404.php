<?php
/**
 * The template is for rendering 404's.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/
?>

<?php if ( have_posts() ) : ?>
	<!-- search listings -->
	<header>
		<div>

			<h1>
				<?php
					if ( is_day() ) :

						printf( __( 'Day: %s', SIMPLE_THEME_SLUG ), get_the_date() );

					elseif ( is_month() ) :

						printf( __( 'Month: %s', SIMPLE_THEME_SLUG ), get_the_date( 'F Y' ) );

					elseif ( is_year() ) :

						printf( __( 'Year: %s', SIMPLE_THEME_SLUG ), get_the_date( 'Y' ) );

					else :

						_e( 'Archives', SIMPLE_THEME_SLUG );

					endif;
				?>
			</h1>

		</div>
	</header>

<?php
	while ( have_posts() ) :

		the_post();

			get_template_part( 'content/content', get_post_format() );

		endwhile;

	else :

		get_template_part( 'partials/no-results' );

	endif;
?>