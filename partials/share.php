<?php
/**
 * The template is for rendering the share.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/
?>

<?php
	$attachment_id 	= get_post_thumbnail_id( $post->ID );
	$attachment 	= wp_get_attachment($attachment_id);
	// permalinks for sharing are currently relative sitewide, should set to absolute only for shares
?>

<ul class="social-share">
	<li>Share:</li>
	<li>
		<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php __(the_title(), SIMPLE_THEME_SLUG); ?>" class="fa fa-facebook" target="_blank"></a>
	</li>
	<li>
		<a href="http://twitter.com/intent/tweet?text=<?php __(the_title(), SIMPLE_THEME_SLUG); ?>+<?php the_permalink(); ?>+@<?php bloginfo('name'); ?>" class="fa fa-twitter" target="_blank"></a>
	</li>
	<li>
		<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="fa fa-google-plus" target="_blank"></a>
	</li>
</ul>