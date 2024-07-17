<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'myself_topbar_section', array(
	'title'             => esc_html__( 'Header Meta','myself' ),
	'description'       => esc_html__( 'Header Meta options.', 'myself' ),
	'panel'             => 'myself_front_page_panel',
) );

// top bar menu visible
$wp_customize->add_setting( 'myself_theme_options[topbar_social_enable]',
	array(
		'default'       	=> $options['topbar_social_enable'],
		'sanitize_callback' => 'myself_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[topbar_social_enable]',
    array(
		'label'      		=> esc_html__( 'Display Social Menu', 'myself' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show topbar menu.', 'myself' ), esc_html__( 'Click Here', 'myself' ), esc_html__( 'to create menu', 'myself' ) ),
		'section'    		=> 'myself_topbar_section',
		'on_off_label' 		=> myself_switch_options(),
    )
) );
