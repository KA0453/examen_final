<?php
/**
 * Skills Section options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add Skills section
$wp_customize->add_section( 'myself_skills_section', array(
	'title'             => esc_html__( 'Skills','myself' ),
	'description'       => esc_html__( 'Skills Section options.', 'myself' ),
	'panel'             => 'myself_front_page_panel',
) );

// Skills content enable control and setting
$wp_customize->add_setting( 'myself_theme_options[skills_section_enable]', array(
	'default'			=> 	$options['skills_section_enable'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[skills_section_enable]', array(
	'label'             => esc_html__( 'Skills Section Enable', 'myself' ),
	'section'           => 'myself_skills_section',
	'on_off_label' 		=> myself_switch_options(),
) ) );

// skills image setting and control.
$wp_customize->add_setting( 'myself_theme_options[skills_image]', array(
	'sanitize_callback' => 'myself_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myself_theme_options[skills_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'myself' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'myself' ), 1920, 1200 ),
		'section'     		=> 'myself_skills_section',
		'active_callback'	=> 'myself_is_skills_section_enable',
) ) );

// skills pages drop down chooser control and setting
$wp_customize->add_setting( 'myself_theme_options[skills_content_page]', array(
	'sanitize_callback' => 'myself_sanitize_page',
) );

$wp_customize->add_control( new Myself_Dropdown_Chooser( $wp_customize, 'myself_theme_options[skills_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'myself' ),
	'section'           => 'myself_skills_section',
	'choices'			=> myself_page_choices(),
	'active_callback'	=> 'myself_is_skills_section_enable',
) ) );

// skills btn title setting and control
$wp_customize->add_setting( 'myself_theme_options[skills_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['skills_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'myself_theme_options[skills_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'myself' ),
	'section'        	=> 'myself_skills_section',
	'active_callback' 	=> 'myself_is_skills_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'myself_theme_options[skills_btn_title]', array(
		'selector'            => '#my-skills .read-more a.btn',
		'settings'            => 'myself_theme_options[skills_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'myself_skills_btn_title_partial',
    ) );
}

// skills bar shortcode setting and control
$wp_customize->add_setting( 'myself_theme_options[skills_shortcode]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'myself_theme_options[skills_shortcode]', array(
	'label'           	=> esc_html__( 'Shortcode', 'myself' ),
	'description'       => esc_html__( 'Note: Please install TP PieBuilder and use the Horizontal Bar Graph shortcode.', 'myself' ),
	'section'        	=> 'myself_skills_section',
	'active_callback' 	=> 'myself_is_skills_section_enable',
	'type'				=> 'text',
) );