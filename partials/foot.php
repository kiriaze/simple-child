<?php
/**
 * The template is for rendering the footer.
 *
 * @package     WordPress
 * @subpackage  Simple
 * @version     1.0
*/
?>

    <?php get_template_part('partials/footer'); ?>

	<?php $googleAnalytics = of_get_option('google_analytics', 'no entry' );
	if( $googleAnalytics ) : ?>
	    <script>
	        <?php echo $googleAnalytics; ?>
	    </script>
	<?php endif; ?>

	<?php wp_footer(); ?>

	</body>
</html>