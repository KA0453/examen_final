<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'myself_reset_section', array(
	'title'             => esc_html__('Reset all settings','myself'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'myself' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'myself_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'myself_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'myself_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'myself' ),
	'section'           => 'myself_reset_section',
	'type'              => 'checkbox',
) );
