<?php
/**
 * The template for displaying all single posts.
 *
 * @package Getaway
 */

get_header(); ?>
<div id="mid">
    <div id="main-image" >
        <div class="container" >
        
        </div>
    </div>
    <div class="container archive">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
