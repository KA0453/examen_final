<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'myself_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','myself' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'myself' ),
	'panel'             => 'myself_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'myself_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'myself' ),
	'section'           => 'myself_testimonial_section',
	'on_off_label' 		=> myself_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'myself_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'myself_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'myself' ),
	'section'        	=> 'myself_testimonial_section',
	'active_callback' 	=> 'myself_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'myself_theme_options[testimonial_title]', array(
		'selector'            => '#testimonial-slider-section .section-header h2.section-title',
		'settings'            => 'myself_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'myself_testimonial_title_partial',
    ) );
}

for ( $i = 1; $i <= 4; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'myself_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'myself_sanitize_page',
	) );

	$wp_customize->add_control( new Myself_Dropdown_Chooser( $wp_customize, 'myself_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'myself' ), $i ),
		'section'           => 'myself_testimonial_section',
		'choices'			=> myself_page_choices(),
		'active_callback'	=> 'myself_is_testimonial_section_enable',
	) ) );
endfor;
