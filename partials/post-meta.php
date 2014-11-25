<?php
/**
 * The template is for rendering the post meta.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
 *
 *
 * Contains : Tags, category, edit, comments, author, link, and share
*/
?>

<?php do_action('simple_social_share'); ?>

<footer>
	<?php echo apply_filters('simple_post_meta', array(
		'author' 		=> true,
		'date' 	 		=> true,
		'tags' 			=> true,
		'categories' 	=> true,
		'wordcount' 	=> true,
		'reading_time'	=> true,
		'views' 		=> true,
		'comments' 		=> true,
		'icons'			=> true
	)); ?>
</footer>