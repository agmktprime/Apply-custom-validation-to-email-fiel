<?php

function um_custom_validate_email_mars( $key, $array, $args ) {

	extract($args);

    // Store allowed domains in an array
    $allowed_domains = ['effem.com', '@mktprime.com'];

    // Set flag to false (fail-safe)
    $check = false;

    // Iterate through all allowed domains
    foreach( $allowed_domains as $domain ) {

        // If a match is found (remember to use lowercase emails!)
        // Update flag and break out of for loop
        if ( strpos( strtolower( $user_email ), $domain ) !== false ) {
            $check = true;
            break;
        }
    }

    if ( !$check )
        exit( wp_redirect( add_query_arg('err', 'you_must_have_googlemail') ) );
}


add_action( 'um_custom_field_validation_email_mars', 'um_custom_validate_email_mars', 30, 3 );
