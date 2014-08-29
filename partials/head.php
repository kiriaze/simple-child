<?php
/**
 * The template is for rendering the header.
 *
 * @package   WordPress
 * @subpackage  Simple
 * @version   1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie7 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js ie7 lt-ie8 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php __(wp_title('&laquo;', true, 'right'), SIMPLE_THEME_SLUG); ?> <?php __(bloginfo('name'), SIMPLE_THEME_SLUG); ?></title>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1 minimal-ui" />

	<?php get_template_part('partials/ie'); ?>

	<?php wp_head(); ?>

	<?php //get_template_part('partials/typekit'); ?>

</head>