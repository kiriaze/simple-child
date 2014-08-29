<?php
    // EXAMPLE_SHORTCODE
    if ( !function_exists('EXAMPLE_SHORTCODE') ) {
        //  Simple Post Types
        function EXAMPLE_SHORTCODE( $atts ) {
            extract(shortcode_atts(array(
                ''      => ''
            ), $atts));

            $html = '';
            
            return $html;

        }

        add_shortcode('example-shortcode', 'EXAMPLE_SHORTCODE');

    }