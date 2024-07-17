<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add About section
$wp_customize->add_section( 'myself_about_section', array(
	'title'             => esc_html__( 'About Me','myself' ),
	'description'       => esc_html__( 'About Section options.', 'myself' ),
	'panel'             => 'myself_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'myself_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'myself' ),
	'section'           => 'myself_about_section',
	'on_off_label' 		=> myself_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'myself_theme_options[about_content_page]', array(
	'sanitize_callback' => 'myself_sanitize_page',
) );

$wp_customize->add_control( new Myself_Dropdown_Chooser( $wp_customize, 'myself_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'myself' ),
	'section'           => 'myself_about_section',
	'choices'			=> myself_page_choices(),
	'active_callback'	=> 'myself_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'myself_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'myself_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'myself' ),
	'section'        	=> 'myself_about_section',
	'active_callback' 	=> 'myself_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'myself_theme_options[about_btn_title]', array(
		'selector'            => '#about-me a.btn',
		'settings'            => 'myself_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'myself_about_btn_title_partial',
    ) );
}
