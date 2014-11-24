<?php

// Change the name of the default template in the admin
function change_default_template_name( $translation, $text, $domain ) {
    if ( $text == 'Default Template' ) {
        return __( 'Page', SIMPLE_THEME_SLUG );
    }
    return $translation;
}
add_filter( 'gettext', 'change_default_template_name', 10, 3 );