<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

$wp_customize->add_section( 'myself_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','myself' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'myself' ),
	'panel'             => 'myself_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'myself_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'myself_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'myself' ),
	'section'          	=> 'myself_breadcrumb',
	'on_off_label' 		=> myself_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'myself_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'myself_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'myself' ),
	'active_callback' 	=> 'myself_is_breadcrumb_enable',
	'section'          	=> 'myself_breadcrumb',
) );
