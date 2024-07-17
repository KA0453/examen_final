<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Myself
	 * @since Myself 1.0.0
	 */

	/**
	 * myself_doctype hook
	 *
	 * @hooked myself_doctype -  10
	 *
	 */
	do_action( 'myself_doctype' );

?>
<head>
<?php
	/**
	 * myself_before_wp_head hook
	 *
	 * @hooked myself_head -  10
	 *
	 */
	do_action( 'myself_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * myself_page_start_action hook
	 *
	 * @hooked myself_page_start -  10
	 *
	 */
	do_action( 'myself_page_start_action' ); 

	/**
	 * myself_header_action hook
	 *
	 * @hooked myself_header_start -  10
	 * @hooked myself_site_branding -  20
	 * @hooked myself_site_navigation -  30
	 * @hooked myself_header_end -  50
	 *
	 */
	do_action( 'myself_header_action' );

	/**
	 * myself_content_start_action hook
	 *
	 * @hooked myself_content_start -  10
	 *
	 */
	do_action( 'myself_content_start_action' );

	/**
	 * myself_header_image_action hook
	 *
	 * @hooked myself_header_image -  10
	 *
	 */
	do_action( 'myself_header_image_action' );

    if ( myself_is_frontpage() ) {

    	$sections = myself_sortable_sections();
    	$i = 1;
		foreach ( $sections as $section => $value ) {
			add_action( 'myself_primary_content', 'myself_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'myself_primary_content' );
	}