<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Myself
* @since Myself 1.0.0
*/

if ( ! function_exists( 'myself_introduction_btn_title_partial' ) ) :
    // introduction btn title
    function myself_introduction_btn_title_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['introduction_btn_title'] );
    }
endif;

if ( ! function_exists( 'myself_about_btn_title_partial' ) ) :
    // about btn title
    function myself_about_btn_title_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'myself_experience_title_partial' ) ) :
    // experience title
    function myself_experience_title_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['experience_title'] );
    }
endif;

if ( ! function_exists( 'myself_testimonial_title_partial' ) ) :
    // testimonial title
    function myself_testimonial_title_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'myself_skills_btn_title_partial' ) ) :
    // skills btn title
    function myself_skills_btn_title_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['skills_btn_title'] );
    }
endif;

if ( ! function_exists( 'myself_blog_title_partial' ) ) :
    // blog title
    function myself_blog_title_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'myself_copyright_text_partial' ) ) :
    // copyright text
    function myself_copyright_text_partial() {
        $options = myself_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
