<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'myself_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','myself' ),
	'description'       => esc_html__( 'Archive section options.', 'myself' ),
	'panel'             => 'myself_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'myself_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'myself_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'myself' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'myself' ),
	'section'           => 'myself_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'myself_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'myself_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'myself' ),
	'section'           => 'myself_archive_section',
	'on_off_label' 		=> myself_hide_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'myself_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'myself' ),
	'section'           => 'myself_archive_section',
	'on_off_label' 		=> myself_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'myself_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'myself_sanitize_switch_control',
) );

$wp_customize->add_control( new Myself_Switch_Control( $wp_customize, 'myself_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'myself' ),
	'section'           => 'myself_archive_section',
	'on_off_label' 		=> myself_hide_options(),
) ) );

// Blog content type control and setting
$wp_customize->add_setting( 'myself_theme_options[archive_column]', array(
	'default'          	=> $options['archive_column'],
	'sanitize_callback' => 'myself_sanitize_select',
) );

$wp_customize->add_control( 'myself_theme_options[archive_column]', array(
	'label'             => esc_html__( 'Column Layout', 'myself' ),
	'section'           => 'myself_archive_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'col-2' 	=> esc_html__( 'Two Column', 'myself' ),
		'col-3' 	=> esc_html__( 'Three Column', 'myself' ),
		'col-4' 	=> esc_html__( 'Four Column', 'myself' ),
	),
) );