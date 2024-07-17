<?php
/**
 * My Profile Section options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add My Profile section
$wp_customize->add_section( 'myself_my_profile_section', array(
	'title'             => esc_html__( 'My Profile','myself' ),
	'description'       => esc_html__( 'My Profile Section options.', 'myself' ),
	'panel'             => 'myself_front_page_panel',
) );

// My Profile content enable control and setting
$wp_customize->add_setting( 'myself_theme_options[my_profile_section_enable]', array(
	'default'			=> 	$options['my_profile_section_enable'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[my_profile_section_enable]', array(
	'label'             => esc_html__( 'My Profile Section Enable', 'myself' ),
	'section'           => 'myself_my_profile_section',
	'on_off_label' 		=> myself_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :
	// my_profile pages drop down chooser control and setting
	$wp_customize->add_setting( 'myself_theme_options[my_profile_content_page_' . $i . ']', array(
		'sanitize_callback' => 'myself_sanitize_page',
	) );

	$wp_customize->add_control( new Myself_Dropdown_Chooser( $wp_customize, 'myself_theme_options[my_profile_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'myself' ), $i ),
		'section'           => 'myself_my_profile_section',
		'choices'			=> myself_page_choices(),
		'active_callback'	=> 'myself_is_my_profile_section_enable',
	) ) );
endfor;
