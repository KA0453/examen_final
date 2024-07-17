<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

function myself_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Myself Theme.', 'myself' ),
    esc_url( 'https://themepalace.com/instructions/themes/myself' ), esc_html__( 'Click here for Demo File download', 'myself' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'myself_intro_text' );