<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

if ( ! function_exists( 'myself_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Myself 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function myself_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'myself_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'myself_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Myself 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function myself_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'myself_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if introduction section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_introduction_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[introduction_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if my_profile section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_my_profile_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[my_profile_section_enable]' )->value() );
}

/**
 * Check if experience section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_experience_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[experience_section_enable]' )->value() );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if skills section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_skills_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[skills_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'myself_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'myself_theme_options[blog_content_type]' )->value();
	return myself_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Myself 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function myself_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'myself_theme_options[blog_content_type]' )->value();
	return myself_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}
