<?php
/**
 * The template for displaying breadcrumbs. Supports both Simple and Yoast Breadcrumbs.
 *
 * @package Simple
 * @version 1
 * @since   1
 */
?>
<?php

if ( current_theme_supports('simple-breadcrumbs') ) {

    if ( function_exists( 'yoast_breadcrumb' ) ) {

        yoast_breadcrumb( '', '' );

    } else {

        $breadcrumbs = of_get_option( 'general_multi_checkbox' )['display_breadcrumbs'];

        if ( $breadcrumbs ) {
            echo Simple_Breadcrumbs::get_breadcrumb_trail( get_the_ID() );
        }

    }

}