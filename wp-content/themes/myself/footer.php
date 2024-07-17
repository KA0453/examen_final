<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

/**
 * myself_footer_primary_content hook
 *
 * @hooked myself_add_contact_section -  10
 *
 */
do_action( 'myself_footer_primary_content' );

/**
 * myself_content_end_action hook
 *
 * @hooked myself_content_end -  10
 *
 */
do_action( 'myself_content_end_action' );

/**
 * myself_content_end_action hook
 *
 * @hooked myself_footer_start -  10
 * @hooked Myself_Footer_Widgets->add_footer_widgets -  20
 * @hooked myself_footer_site_info -  40
 * @hooked myself_footer_end -  100
 *
 */
do_action( 'myself_footer' );

/**
 * myself_page_end_action hook
 *
 * @hooked myself_page_end -  10
 *
 */
do_action( 'myself_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
