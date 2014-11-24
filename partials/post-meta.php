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
		'author' 		=> false,
		'date' 	 		=> false,
		'tags' 			=> true,
		'categories' 	=> false,
		'wordcount' 	=> false,
		'reading_time'	=> false,
		'views' 		=> false,
		'comments' 		=> false,
		'icons'			=> false
	)); ?>
</footer>