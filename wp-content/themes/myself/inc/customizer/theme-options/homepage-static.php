<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Myself
* @since Myself 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'myself_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'myself_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'myself_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'myself' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'myself' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );