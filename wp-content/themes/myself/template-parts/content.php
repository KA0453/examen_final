<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Myself
 * @since Myself 1.0.0
 */

$options = myself_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image">
            <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ) ?>
        </div><!-- .featured-image -->
    <?php endif; ?>

    <div class="entry-container">
        <div class="entry-meta">
            <span class="cat-links">
                <?php echo myself_article_footer_meta(); ?>
            </span><!-- .cat-links -->
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-meta">
            <?php if ( ! $options['hide_author'] ) :
                echo myself_author();
            endif;

            if ( ! $options['hide_date'] ) :
                myself_posted_on();
            endif; ?> 
        </div><!-- .entry-meta -->
    </div><!-- .entry-container -->

</article><!-- #post-## -->
