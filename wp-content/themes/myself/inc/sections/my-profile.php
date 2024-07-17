<?php
/**
 * My Profile section
 *
 * This is the template for the content of my_profile section
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */
if ( ! function_exists( 'myself_add_my_profile_section' ) ) :
    /**
    * Add my_profile section
    *
    *@since Myself 1.0.0
    */
    function myself_add_my_profile_section() {
    	$options = myself_get_theme_options();
        // Check if my_profile is enabled on frontpage
        $my_profile_enable = apply_filters( 'myself_section_status', true, 'my_profile_section_enable' );

        if ( true !== $my_profile_enable ) {
            return false;
        }
        // Get my_profile section details
        $section_details = array();
        $section_details = apply_filters( 'myself_filter_my_profile_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render my_profile section now.
        myself_render_my_profile_section( $section_details );
    }
endif;

if ( ! function_exists( 'myself_get_my_profile_section_details' ) ) :
    /**
    * my_profile section details.
    *
    * @since Myself 1.0.0
    * @param array $input my_profile section details.
    */
    function myself_get_my_profile_section_details( $input ) {
        $options = myself_get_theme_options();

        $content = array();
                $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['my_profile_content_page_' . $i] ) )
                $page_ids[] = $options['my_profile_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = myself_trim_content( 4 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// my_profile section content details.
add_filter( 'myself_filter_my_profile_section_details', 'myself_get_my_profile_section_details' );


if ( ! function_exists( 'myself_render_my_profile_section' ) ) :
  /**
   * Start my_profile section
   *
   * @return string my_profile content
   * @since Myself 1.0.0
   *
   */
   function myself_render_my_profile_section( $content_details = array() ) {
        $options = myself_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="my-profile" class="relative page-section">
            <div class="wrapper">
                <div class="profile-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":false, "autoplay": true, "draggable": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                            <header class="entry-header">
                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                    <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </a>
                            </header>

                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <div class="overlay"></div>
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="more-link">
                                    <?php echo myself_get_svg( array( 'icon' => 'right-arrow' ) ); ?>
                                </a>
                            </div><!-- .featured-iimage -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .profile-slider -->
            </div><!-- .wrapper -->
        </div><!-- #my-profile -->

    <?php }
endif;