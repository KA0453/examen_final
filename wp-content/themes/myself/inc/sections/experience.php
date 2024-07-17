<?php
/**
 * Work Experience section
 *
 * This is the template for the content of experience section
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */
if ( ! function_exists( 'myself_add_experience_section' ) ) :
    /**
    * Add experience section
    *
    *@since Myself 1.0.0
    */
    function myself_add_experience_section() {
        $options = myself_get_theme_options();
        // Check if experience is enabled on frontpage
        $experience_enable = apply_filters( 'myself_section_status', true, 'experience_section_enable' );

        if ( true !== $experience_enable ) {
            return false;
        }
        // Get experience section details
        $section_details = array();
        $section_details = apply_filters( 'myself_filter_experience_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render experience section now.
        myself_render_experience_section( $section_details );
    }
endif;

if ( ! function_exists( 'myself_get_experience_section_details' ) ) :
    /**
    * experience section details.
    *
    * @since Myself 1.0.0
    * @param array $input experience section details.
    */
    function myself_get_experience_section_details( $input ) {
        $options = myself_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['experience_content_page_' . $i] ) ) :
                $page_ids[] = $options['experience_content_page_' . $i];
            endif;
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = myself_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// experience section content details.
add_filter( 'myself_filter_experience_section_details', 'myself_get_experience_section_details' );


if ( ! function_exists( 'myself_render_experience_section' ) ) :
  /**
   * Start experience section
   *
   * @return string experience content
   * @since Myself 1.0.0
   *
   */
   function myself_render_experience_section( $content_details = array() ) {
        $options = myself_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="working-experience" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['experience_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['experience_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="clear"></div>

                <div class="working-experience-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .working-experience-slider -->
            </div><!-- .wrapper -->
        </div><!-- #working-experience -->
        
    <?php }
endif;