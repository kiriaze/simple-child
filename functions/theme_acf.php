<?php

// Display drop down of post types in acf
function custom_post_type_list( $field ) {
    // reset choices
    $field['choices'] = array();

    // set the options
    $choices = 'Select a post type';

    $post_types = get_post_types( array(
        '_builtin'  =>  false // only custom post types
    ), 'names' );


    foreach ( $post_types as $post_type ) {
        $choices .= "\n" . ucfirst($post_type);
    }

    // explode the value so that each line is a new array piece
    $choices = explode("\n", $choices);

    // remove any unwanted white space
    $choices = array_map('trim', $choices);

    foreach ($choices as $key => $value) {
        if ( $value == 'Acf-field-group' || $value == 'Acf-field' ) {
            unset($choices[$key]); // removes acf from array
        }
    }

    // loop through array and add to field 'choices'
    if ( is_array($choices) ) {
        foreach( $choices as $choice ) {
            $field['choices'][ $choice ] = $choice;
        }
    }

    // Important: return the field
    return $field;
}
add_filter('acf/load_field/name=cc_post_list', 'custom_post_type_list');