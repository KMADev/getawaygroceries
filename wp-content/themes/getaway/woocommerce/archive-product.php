<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
        
            <div id="primary" class="content-area col res-23 large-1 ph-1">
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
				
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<header class="page-header">
							<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
						</header><!-- .page-header -->
						<?php endif; ?>
				
						<?php
							/**
							 * woocommerce_archive_description hook.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );
						?>
				
						<?php if ( have_posts() ) : ?>
				
							<?php
								/**
								 * woocommerce_before_shop_loop hook.
								 *
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								//do_action( 'woocommerce_before_shop_loop' );
							?>
				
							<?php woocommerce_product_loop_start(); ?>
				
								<?php woocommerce_product_subcategories(); ?>
				
								<?php while ( have_posts() ) : the_post(); ?>
				
									<?php wc_get_template_part( 'content', 'product' ); ?>
				
								<?php endwhile; // end of the loop. ?>
				
							<?php woocommerce_product_loop_end(); ?>
				
							<?php
								/**
								 * woocommerce_after_shop_loop hook.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action( 'woocommerce_after_shop_loop' );
							?>
				
						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
				
							<?php wc_get_template( 'loop/no-products-found.php' ); ?>
				
						<?php endif; ?>
				
					<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
            <div id="secondary" class="col res-13 large-1 ph-1">
            <?php dynamic_sidebar( 'sidebar-shop' ); ?>
        </div>
        <div class="clear"></div>
		</div><!-- .container -->
    </div><!-- #mid -->
<?php get_footer(); ?>
