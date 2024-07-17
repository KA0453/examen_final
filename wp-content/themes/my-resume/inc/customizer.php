<?php
/**
 * My Resume: Customizer
 *
 * @subpackage My Resume
 * @since 1.0
 */

use WPTRT\Customize\Section\My_Resume_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( My_Resume_Button::class );

	$manager->add_section(
		new My_Resume_Button( $manager, 'my_resume_pro', [
			'title'       => __( 'My Resume Pro', 'my-resume' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'my-resume' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/resume-wordpress-theme/', 'my-resume')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'my-resume-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'my-resume-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function my_resume_customize_register( $wp_customize ) {

   	$wp_customize->add_setting('my_resume_show_title',array(
		'default' => true,
		'sanitize_callback'	=> 'my_resume_sanitize_checkbox'
   	));
   	$wp_customize->add_control('my_resume_show_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','my-resume'),
		'section' => 'title_tagline'
   	));

	$wp_customize->add_setting('my_resume_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_resume_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'my_resume_sanitize_checkbox'
   	));
   	$wp_customize->add_control('my_resume_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','my-resume'),
		'section' => 'title_tagline'
   	));

	$wp_customize->add_setting('my_resume_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_resume_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('my_resume_logo_padding',array(
		'label' => __('Logo Padding','my-resume'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('my_resume_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_resume_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_resume_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_resume_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_resume_show_site_title_initials',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('my_resume_show_site_title_initials',array(
		'type' => 'text',
		'label' => __('Site Title Initials','my-resume'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('my_resume_show_Title_Initials',array(
		'default' => true,
		'sanitize_callback'	=> 'my_resume_sanitize_checkbox'
   	));
   	$wp_customize->add_control('my_resume_show_Title_Initials',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title Initials','my-resume'),
		'section' => 'title_tagline'
   	));

	$wp_customize->add_setting('my_resume_site_title_initials_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_site_title_initials_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Initials Font Size','my-resume'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'my_resume_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'my-resume' ),
		'description' => __( 'Description of what this panel does.', 'my-resume' ),
	) );

	$wp_customize->add_section( 'my_resume_theme_options_section', array(
    	'title'      => __( 'General Settings', 'my-resume' ),
		'priority'   => 30,
		'panel' => 'my_resume_panel_id'
	) );

	$wp_customize->add_setting('my_resume_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'my_resume_sanitize_choices'
	));
	$wp_customize->add_control('my_resume_theme_options',array(
		'type' => 'radio',
		'label' => __('Do you want this section','my-resume'),
		'section' => 'my_resume_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','my-resume'),
		   'Right Sidebar' => __('Right Sidebar','my-resume'),
		   'One Column' => __('One Column','my-resume'),
		   'Three Columns' => __('Three Columns','my-resume'),
		   'Four Columns' => __('Four Columns','my-resume'),
		   'Grid Layout' => __('Grid Layout','my-resume')
		),
	));

	$wp_customize->add_setting( 'my_resume_boxfull_width', array(
		'default'           => '',
		'sanitize_callback' => 'my_resume_sanitize_choices'
	));
	
	$wp_customize->add_control( 'my_resume_boxfull_width', array(
		'label'    => __( 'Section Width', 'my-resume' ),
		'section'  => 'my_resume_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'container'  => __('Box Width', 'my-resume'),
			'container-fluid' => __('Full Width', 'my-resume'),
			'none' => __('None', 'my-resume')
		),
	));

	$wp_customize->add_setting( 'my_resume_dropdown_anim', array(
		'default'           => 'None',
		'sanitize_callback' => 'my_resume_sanitize_choices'
	));
	$wp_customize->add_control( 'my_resume_dropdown_anim', array(
		'label'    => __( 'Menu Dropdown Animations', 'my-resume' ),
		'section'  => 'my_resume_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInUp'  => __('bounceInUp', 'my-resume'),
			'fadeInUp' => __('fadeInUp', 'my-resume'),
			'zoomIn'    => __('zoomIn', 'my-resume'),
			'None'    => __('None', 'my-resume')
		),
	));

	//Banner Section
	$wp_customize->add_section( 'my_resume_banner_section' , array(
    	'title' => __( 'Banner Section', 'my-resume' ),
		'priority' => null,
		'panel' => 'my_resume_panel_id'
	) );

	$wp_customize->add_setting( 'my_resume_slider_effect', array(
		'default'           => '',
		'sanitize_callback' => 'my_resume_sanitize_choices'
	));
	$wp_customize->add_control( 'my_resume_slider_effect', array(
		'label'    => __( 'Onload Transactions Effects', 'my-resume' ),
		'section'  => 'my_resume_banner_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInLeft'  => __('bounceInLeft', 'my-resume'),
			'bounceInRight' => __('bounceInRight', 'my-resume'),
			'bounceInUp'    => __('bounceInUp', 'my-resume'),
			'bounceInDown'    => __('bounceInDown', 'my-resume'),
			'zoomIn'  => __('zoomIn', 'my-resume'),
			'zoomOut' => __('zoomOut', 'my-resume'),
			'fadeInDown'    => __('fadeInDown', 'my-resume'),
			'fadeInUp'    => __('fadeInUp', 'my-resume'),
			'fadeInLeft'  => __('fadeInLeft', 'my-resume'),
			'fadeInRight' => __('fadeInRight', 'my-resume'),
			'flip-up'    => __('flip-up', 'my-resume'),
			'none'    => __('none', 'my-resume')
		),
	));

	$wp_customize->add_setting( 'my_resume_banner_page', array(
		'default' => '',
		'sanitize_callback' => 'my_resume_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'my_resume_banner_page', array(
		'label' => __( 'Select Banner Page', 'my-resume' ),
		'description' => __('Image Size (524px 553px)', 'my-resume'),
		'section' => 'my_resume_banner_section',
		'type' => 'dropdown-pages'
	) );

	$wp_customize->add_setting('my_resume_banner_designation',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('my_resume_banner_designation',array(
   	'type' => 'text',
   	'label' => __('Designation','my-resume'),
   	'section' => 'my_resume_banner_section',
	));

	$wp_customize->add_setting('my_resume_banner_candidate_name',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('my_resume_banner_candidate_name',array(
   	'type' => 'text',
   	'label' => __('Candidate Name','my-resume'),
   	'section' => 'my_resume_banner_section',
	));

	$wp_customize->add_setting('my_resume_banner_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'my_resume_sanitize_phone_number'
	));	
	$wp_customize->add_control('my_resume_banner_phone',array(
		'label'	=> __('Phone No.','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('my_resume_banner_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('my_resume_banner_email',array(
		'label'	=> __('Email Address','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('my_resume_banner_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_banner_address',array(
		'label'	=> __('Address','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('my_resume_banner_date_of_birth',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_banner_date_of_birth',array(
		'label'	=> __('Date of Birth','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('my_resume_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('my_resume_facebook',array(
		'label'	=> __('Add Facebook Link','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('my_resume_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('my_resume_twitter',array(
		'label'	=> __('Add Twitter Link','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('my_resume_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('my_resume_linkedin',array(
		'label'	=> __('Add Linkedin Link','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting( 'my_resume_bnrname_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_bnrname_color', array(
		'label' => 'Name Color',
		'section' => 'my_resume_banner_section',
	)));

	$wp_customize->add_setting( 'my_resume_bnrnamebg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_bnrnamebg_color', array(
		'label' => 'Name Bg Color',
		'section' => 'my_resume_banner_section',
	)));

	$wp_customize->add_setting( 'my_resume_bnr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	 ));
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_bnr_color', array(
		'label' => 'Text Color',
		'section' => 'my_resume_banner_section',
	 )));

	$wp_customize->add_setting( 'my_resume_bnricon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_bnricon_color', array(
		'label' => 'Icon Color',
		'section' => 'my_resume_banner_section',
	)));

	$wp_customize->add_setting( 'my_resume_bnrbdr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_bnrbdr_color', array(
		'label' => 'Border Color',
		'section' => 'my_resume_banner_section',
	)));

	// Our Skills
	$wp_customize->add_section('my_resume_skills_section',array(
		'title'	=> __('Our Skills','my-resume'),
		'panel' => 'my_resume_panel_id',
	));

	$wp_customize->add_setting('my_resume_skills_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_skills_title',array(
		'label'	=> __('Section Title','my-resume'),
		'section'	=> 'my_resume_skills_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cats[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('my_resume_skills_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'my_resume_sanitize_choices',
	));
	$wp_customize->add_control('my_resume_skills_cat',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category To Display Skills Post','my-resume'),
		'description' => __('Image Size (70px 70px)', 'my-resume'),
		'section' => 'my_resume_skills_section',
	));

	$wp_customize->add_setting('my_resume_skills_section_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
	));
	$wp_customize->add_control('my_resume_skills_section_padding',array(
		'type' => 'number',
		'label' => __('Section Top Bottom Padding','my-resume'),
		'section' => 'my_resume_skills_section',
	));

	$wp_customize->add_setting( 'my_resume_skills_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_skills_color', array(
		'label' => 'Title Color',
		'section' => 'my_resume_skills_section',
	)));

	$wp_customize->add_setting( 'my_resume_skills_border_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_skills_border_color', array(
		'label' => 'Border Color',
		'section' => 'my_resume_skills_section',
	)));

	$wp_customize->add_setting( 'my_resume_skills_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_skills_text_color', array(
		'label' => 'Text Color',
		'section' => 'my_resume_skills_section',
	)));

	$wp_customize->add_setting( 'my_resume_skills_icons_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_skills_icons_color', array(
		'label' => 'Icon Color',
		'section' => 'my_resume_skills_section',
	)));

	$wp_customize->add_setting( 'my_resume_skills_no_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_skills_no_color', array(
		'label' => 'Number Color',
		'section' => 'my_resume_skills_section',
	)));

	$wp_customize->add_setting( 'my_resume_skills_nobg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_resume_skills_nobg_color', array(
		'label' => 'Number Bg Color',
		'section' => 'my_resume_skills_section',
	)));

	//Footer
   $wp_customize->add_section( 'my_resume_footer', array(
    	'title'      => __( 'Footer Setting', 'my-resume' ),
		'priority'   => null,
		'panel' => 'my_resume_panel_id'
	) );

	$wp_customize->add_setting('my_resume_show_back_totop',array(
 		'default' => true,
   		'sanitize_callback'	=> 'my_resume_sanitize_checkbox'
	));
	$wp_customize->add_control('my_resume_show_back_totop',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Back to Top','my-resume'),
	   	'section' => 'my_resume_footer'
	));

 	$wp_customize->add_setting('my_resume_footer_link',array(
		'default'	=> 'https://www.luzuk.com/themes/free-resume-wordpress-theme/',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_footer_link',array(
		'label'	=> __('Copyright Link','my-resume'),
		'section'	=> 'my_resume_footer',
		'setting'	=> 'my_resume_footer_link',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('my_resume_footer_copy',array(
		'default'	=> 'Resume WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_footer_copy',array(
		'label'	=> __('Copyright Text','my-resume'),
		'section'	=> 'my_resume_footer',
		'setting'	=> 'my_resume_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('my_resume_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'my_resume_sanitize_float'
 	));
 	$wp_customize->add_control('my_resume_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','my-resume'),
		'section' => 'my_resume_footer',
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'my_resume_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'my_resume_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'my_resume_customize_register' );

function my_resume_customize_partial_blogname() {
	bloginfo( 'name' );
}

function my_resume_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function my_resume_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function my_resume_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}