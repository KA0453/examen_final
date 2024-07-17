<?php 

	$my_resume_custom_style = '';

	// Logo Size
	$my_resume_logo_top_padding = get_theme_mod('my_resume_logo_top_padding');
	$my_resume_logo_bottom_padding = get_theme_mod('my_resume_logo_bottom_padding');
	$my_resume_logo_left_padding = get_theme_mod('my_resume_logo_left_padding');
	$my_resume_logo_right_padding = get_theme_mod('my_resume_logo_right_padding');

	if( $my_resume_logo_top_padding != '' || $my_resume_logo_bottom_padding != '' || $my_resume_logo_left_padding != '' || $my_resume_logo_right_padding != ''){
		$my_resume_custom_style .=' .logo {';
			$my_resume_custom_style .=' padding-top: '.esc_attr($my_resume_logo_top_padding).'px; padding-bottom: '.esc_attr($my_resume_logo_bottom_padding).'px; padding-left: '.esc_attr($my_resume_logo_left_padding).'px; padding-right: '.esc_attr($my_resume_logo_right_padding).'px;';
		$my_resume_custom_style .=' }';
	}

	// service section padding
	$my_resume_skills_section_padding = get_theme_mod('my_resume_skills_section_padding');

	if( $my_resume_skills_section_padding != ''){
		$my_resume_custom_style .=' #our_skill {';
			$my_resume_custom_style .=' padding-top: '.esc_attr($my_resume_skills_section_padding).'px; padding-bottom: '.esc_attr($my_resume_skills_section_padding).'px;';
		$my_resume_custom_style .=' }';
	}

	// Site Title Initials Font Size
	$my_resume_site_title_initials_font_size = get_theme_mod('my_resume_site_title_initials_font_size');
	if( $my_resume_site_title_initials_font_size != ''){
		$my_resume_custom_style .=' .logo-initials h1 {';
			$my_resume_custom_style .=' font-size: '.esc_attr($my_resume_site_title_initials_font_size).'px;';
		$my_resume_custom_style .=' }';
	}

	// Site Title Font Size
	$my_resume_site_title_font_size = get_theme_mod('my_resume_site_title_font_size');
	if( $my_resume_site_title_font_size != ''){
		$my_resume_custom_style .=' #banner .banner-content h1.site-title, #banner .banner-content p.site-title {';
			$my_resume_custom_style .=' font-size: '.esc_attr($my_resume_site_title_font_size).'px;';
		$my_resume_custom_style .=' }';
	}

	// Site Tagline Font Size
	$my_resume_site_tagline_font_size = get_theme_mod('my_resume_site_tagline_font_size');
	if( $my_resume_site_tagline_font_size != ''){
		$my_resume_custom_style .=' .logo p.site-description {';
			$my_resume_custom_style .=' font-size: '.esc_attr($my_resume_site_tagline_font_size).'px;';
		$my_resume_custom_style .=' }';
	}

	//layout width
	$my_resume_boxfull_width = get_theme_mod('my_resume_boxfull_width');
	if ($my_resume_boxfull_width !== '') {
		switch ($my_resume_boxfull_width) {
			case 'container':
				$my_resume_custom_style .= ' body {
					max-width: 1140px;
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'container-fluid':
				$my_resume_custom_style .= ' body { 
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
				 }';
				break;
			case 'none':
				// No specific width specified, so no additional style needed.
				break;
			default:
				// Handle unexpected values.
				break;
		}
	}

	//Menu animation
	$my_resume_dropdown_anim = get_theme_mod('my_resume_dropdown_anim');

	if ( $my_resume_dropdown_anim != '') {
		$my_resume_custom_style .=' .nav-menu ul ul {';
			$my_resume_custom_style .=' animation:'.esc_attr($my_resume_dropdown_anim).' 1s ease;';
		$my_resume_custom_style .=' }';
	}

	// Copyright padding
	$my_resume_copyright_padding = get_theme_mod('my_resume_copyright_padding');

	if( $my_resume_copyright_padding != ''){
		$my_resume_custom_style .=' .site-info {';
			$my_resume_custom_style .=' padding-top: '.esc_attr($my_resume_copyright_padding).'px; padding-bottom: '.esc_attr($my_resume_copyright_padding).'px;';
		$my_resume_custom_style .=' }';
	}

	//Banner color
	$my_resume_bnr_color = get_theme_mod('my_resume_bnr_color');

	if ( $my_resume_bnr_color != '') {
		$my_resume_custom_style .=' .banner-content p,#banner p.phone, .social-icons span, #banner p.phone a{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_bnr_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_bnricon_color = get_theme_mod('my_resume_bnricon_color');

	if ( $my_resume_bnricon_color != '') {
		$my_resume_custom_style .=' #banner p.phone i, .social-icons i{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_bnricon_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_bnrbdr_color = get_theme_mod('my_resume_bnrbdr_color');
	if ( $my_resume_bnrbdr_color != '') {
		$my_resume_custom_style .=' .contact-details{';
			$my_resume_custom_style .=' border-top-color:'.esc_attr($my_resume_bnrbdr_color).';';
		$my_resume_custom_style .=' }';
	}

	//our skills color
	$my_resume_bnrname_color = get_theme_mod('my_resume_bnrname_color');
	$my_resume_bnrnamebg_color = get_theme_mod('my_resume_bnrnamebg_color');
	if ( $my_resume_bnrname_color != '') {
		$my_resume_custom_style .=' .banner-img p.candidate-name{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_bnrname_color).'; background-color:'.esc_attr($my_resume_bnrnamebg_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_skills_color = get_theme_mod('my_resume_skills_color');
	if ( $my_resume_skills_color != '') {
		$my_resume_custom_style .=' .skill-content h3 a{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_skills_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_skills_border_color = get_theme_mod('my_resume_skills_border_color');
	if ( $my_resume_skills_border_color != '') {
		$my_resume_custom_style .=' .skill-content h3:after{';
			$my_resume_custom_style .=' border-bottom-color:'.esc_attr($my_resume_skills_border_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_skills_text_color = get_theme_mod('my_resume_skills_text_color');
	if ( $my_resume_skills_text_color != '') {
		$my_resume_custom_style .=' .skill-content p{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_skills_text_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_skills_icons_color = get_theme_mod('my_resume_skills_icons_color');
	if ( $my_resume_skills_icons_color != '') {
		$my_resume_custom_style .=' .more-btn i.far.fa-image{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_skills_icons_color).';';
		$my_resume_custom_style .=' }';
	}

	$my_resume_skills_no_color = get_theme_mod('my_resume_skills_no_color');
	$my_resume_skills_nobg_color = get_theme_mod('my_resume_skills_nobg_color');
	if ( $my_resume_skills_no_color != '') {
		$my_resume_custom_style .=' .skill-content p.skillno{';
			$my_resume_custom_style .=' color:'.esc_attr($my_resume_skills_no_color).'; background-color:'.esc_attr($my_resume_skills_nobg_color).';';
		$my_resume_custom_style .=' }';
	}