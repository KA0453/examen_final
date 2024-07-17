<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'myself_blog_section', array(
	'title'             => esc_html__( 'Blog','myself' ),
	'description'       => esc_html__( 'Blog Section options.', 'myself' ),
	'panel'             => 'myself_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'myself_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'myself' ),
	'section'           => 'myself_blog_section',
	'on_off_label' 		=> myself_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'myself_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'myself_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'myself' ),
	'section'        	=> 'myself_blog_section',
	'active_callback' 	=> 'myself_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'myself_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'myself_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'myself_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'myself_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'myself_sanitize_select',
) );

$wp_customize->add_control( 'myself_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'myself' ),
	'section'           => 'myself_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'myself_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'myself' ),
		'recent' 	=> esc_html__( 'Recent', 'myself' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'myself_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'myself_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Myself_Dropdown_Taxonomies_Control( $wp_customize,'myself_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'myself' ),
	'description'      	=> esc_html__( 'Note: Latest four posts will be shown from selected category', 'myself' ),
	'section'           => 'myself_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'myself_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'myself_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'myself_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Myself_Dropdown_Category_Control( $wp_customize,'myself_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'myself' ),
	'description'      	=> esc_html__( 'Note: Latest four posts will be shown. Select categories to exclude. Press CTRL key select multilple categories.', 'myself' ),
	'section'           => 'myself_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'myself_is_blog_section_content_recent_enable'
) ) );
