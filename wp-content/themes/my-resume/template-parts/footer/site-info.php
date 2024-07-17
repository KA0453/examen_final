<?php
/**
 * Displays footer site info
 *
 * @subpackage My Resume
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info">
	<a href="<?php echo esc_html(get_theme_mod('my_resume_footer_link',__('https://www.luzuk.com/themes/free-resume-wordpress-theme/','my-resume'))); ?>" target="_blank">
		<p><?php echo esc_html(get_theme_mod('my_resume_footer_copy',__('Resume WordPress Theme By Luzuk','my-resume'))); ?></p>
	</a>
</div>