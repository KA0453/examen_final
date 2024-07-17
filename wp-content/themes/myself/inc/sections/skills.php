<?php
/**
 * Skills section
 *
 * This is the template for the content of skills section
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */
if ( ! function_exists( 'myself_add_skills_section' ) ) :
    /**
    * Add skills section
    *
    *@since Myself 1.0.0
    */
    function myself_add_skills_section() {
    	$options = myself_get_theme_options();
        // Check if skills is enabled on frontpage
        $skills_enable = apply_filters( 'myself_section_status', true, 'skills_section_enable' );

        if ( true !== $skills_enable ) {
            return false;
        }
        // Get skills section details
        $section_details = array();
        $section_details = apply_filters( 'myself_filter_skills_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render skills section now.
        myself_render_skills_section( $section_details );
    }
endif;

if ( ! function_exists( 'myself_get_skills_section_details' ) ) :
    /**
    * skills section details.
    *
    * @since Myself 1.0.0
    * @param array $input skills section details.
    */
    function myself_get_skills_section_details( $input ) {
        $options = myself_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['skills_content_page'] ) ? $options['skills_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = myself_trim_content( 30 );

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// skills section content details.
add_filter( 'myself_filter_skills_section_details', 'myself_get_skills_section_details' );


if ( ! function_exists( 'myself_render_skills_section' ) ) :
  /**
   * Start skills section
   *
   * @return string skills content
   * @since Myself 1.0.0
   *
   */
   function myself_render_skills_section( $content_details = array() ) {
        $options = myself_get_theme_options();
        $background = ! empty( $options['skills_image'] ) ? $options['skills_image'] : get_template_directory_uri() . '/assets/uploads/custom-header-image.jpg';

        if ( empty( $content_details ) ) {
            return;
        } ?>

            <div id="my-skills" class="relative page-section" style="background-image: url('<?php echo esc_url( $background ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="col-2">
                        <?php foreach ( $content_details as $content ) : ?>
                            <div class="hentry">
                                <div class="section-header text-center">
                                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                </div>
                                <div class="section-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                                <?php if ( ! empty( $options['skills_btn_title'] ) ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $options['skills_btn_title'] ); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .hentry -->
                        <?php endforeach;

                        if ( class_exists( 'TP_PieBuilder' ) && ! empty( $options['skills_shortcode'] ) ) : ?>
                            <div class="hentry">
                                <?php echo do_shortcode( wp_kses_post( $options['skills_shortcode'] ) ); ?>
                            </div><!-- .hentry -->
                        <?php endif; ?>
                    </div><!-- .col-2 -->
                </div><!-- .wrapper -->
            </div><!-- #my-skills -->

    <?php }
endif;