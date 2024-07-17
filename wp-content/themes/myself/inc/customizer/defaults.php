<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 * @return array An array of default values
 */

function myself_get_default_theme_options() {
	$myself_default_options = array(
		// Color Options
		'header_title_color'			=> '#152944',
		'header_tagline_color'			=> '#152944',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'myself' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved', 'myself' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'myself' ),
		'hide_date' 					=> false,
		'hide_author'					=> false,
		'hide_category'					=> false,
		'archive_column'				=> 'col-2',

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// topbar
		'topbar_social_enable'			=> false,

		// Introduction
		'introduction_section_enable'	=> false,
		'introduction_btn_title'		=> esc_html__( 'Hire Me', 'myself' ),

		// About
		'about_section_enable'			=> false,
		'about_btn_title'				=> esc_html__( 'Download CV', 'myself' ),

		// My Profile
		'my_profile_section_enable'		=> false,

		// Work Experience
		'experience_section_enable'		=> false,
		'experience_title'				=> esc_html__( 'My working experiences tell more about me', 'myself' ),

		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'Why Lucie Anderson is the best freelancer in town', 'myself' ),

		// Skills
		'skills_section_enable'			=> false,
		'skills_btn_title'				=> esc_html__( 'Hire Me Now', 'myself' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'Know all interesting facts around my circle', 'myself' ),

	);

	$output = apply_filters( 'myself_default_theme_options', $myself_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}