<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'myself_single_post_section', array(
	'title'             => esc_html__( 'Single Post','myself' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'myself' ),
	'panel'             => 'myself_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'myself_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'myself' ),
	'section'           => 'myself_single_post_section',
	'on_off_label' 		=> myself_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'myself_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'myself' ),
	'section'           => 'myself_single_post_section',
	'on_off_label' 		=> myself_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'myself_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'myself' ),
	'section'           => 'myself_single_post_section',
	'on_off_label' 		=> myself_hide_options(),
) ) );
