<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'myself_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'myself' ),
		'priority'   			=> 900,
		'panel'      			=> 'myself_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'myself_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'myself_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'myself_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'myself' ),
		'section'    			=> 'myself_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'myself_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'myself_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'myself_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'myself_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'myself_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'myself' ),
		'section'    		=> 'myself_section_footer',
		'on_off_label' 		=> myself_switch_options(),
    )
) );