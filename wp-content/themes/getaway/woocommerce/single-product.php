<?php
/**
 * The template for displaying all single posts.
 *
 * @package Getaway
 */
$featuredImage = get_field('featured_photo');

get_header(); ?>
	<div id="mid">
    <?php if($featuredImage != ''){ ?>
    	<div id="main-image" >
            <div class="container wrap" >
            	<img src="<?php echo $featuredImage['url']; ?>" alt="<?php echo $featuredImage['alt']; ?>" />
            </div>
        </div>
        <?php } ?>
    <div class="container archive">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
		
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php wc_get_template_part( 'content', 'single-product' ); ?>
		
				<?php endwhile; // end of the loop. ?>
		
			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
		
			<?php
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
