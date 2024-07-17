<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function myself_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'myself' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function myself_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'myself' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'myself_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function myself_site_layout() {
        $myself_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'myself_site_layout', $myself_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'myself_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function myself_selected_sidebar() {
        $myself_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'myself' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'myself' ),
        );

        $output = apply_filters( 'myself_selected_sidebar', $myself_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'myself_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function myself_global_sidebar_position() {
        $myself_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'myself_global_sidebar_position', $myself_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'myself_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function myself_sidebar_position() {
        $myself_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'myself_sidebar_position', $myself_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'myself_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function myself_pagination_options() {
        $myself_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'myself' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'myself' ),
        );

        $output = apply_filters( 'myself_pagination_options', $myself_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'myself_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function myself_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'myself' ),
            'off'       => esc_html__( 'Disable', 'myself' )
        );
        return apply_filters( 'myself_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'myself_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function myself_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'myself' ),
            'off'       => esc_html__( 'No', 'myself' )
        );
        return apply_filters( 'myself_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'myself_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function myself_sortable_sections() {
        $sections = array(
            'introduction'  => esc_html__( 'Introduction', 'myself' ),
            'about'         => esc_html__( 'About Me', 'myself' ),
            'my_profile'    => esc_html__( 'My Profile', 'myself' ),
            'experience'    => esc_html__( 'Work Experience', 'myself' ),
            'testimonial'   => esc_html__( 'Testimonial', 'myself' ),
            'skills'        => esc_html__( 'Skills', 'myself' ),
            'blog'          => esc_html__( 'Blog', 'myself' ),
        );
        return apply_filters( 'myself_sortable_sections', $sections );
    }
endif;