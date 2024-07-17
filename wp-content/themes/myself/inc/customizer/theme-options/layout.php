<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'myself_layout', array(
	'title'               => esc_html__('Layout','myself'),
	'description'         => esc_html__( 'Layout section options.', 'myself' ),
	'panel'               => 'myself_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'myself_theme_options[site_layout]', array(
	'sanitize_callback'   => 'myself_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Myself_Custom_Radio_Image_Control ( $wp_customize, 'myself_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'myself' ),
	'section'             => 'myself_layout',
	'choices'			  => myself_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'myself_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'myself_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Myself_Custom_Radio_Image_Control ( $wp_customize, 'myself_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'myself' ),
	'section'             => 'myself_layout',
	'choices'			  => myself_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'myself_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'myself_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Myself_Custom_Radio_Image_Control ( $wp_customize, 'myself_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'myself' ),
	'section'             => 'myself_layout',
	'choices'			  => myself_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'myself_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'myself_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Myself_Custom_Radio_Image_Control( $wp_customize, 'myself_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'myself' ),
	'section'             => 'myself_layout',
	'choices'			  => myself_sidebar_position(),
) ) );