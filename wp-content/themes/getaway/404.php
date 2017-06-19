<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Getaway
 */

get_header(); ?>
	<div id="mid">
    	<div id="main-image" >
            <div class="container" >
            
            </div>
        </div>
    	<div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        
                    <article class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e( '404. Page not found.', 'getaway' ); ?></h1>
                        </header><!-- .page-header -->
        
                        <div class="page-content">
                            <p><?php _e( 'The page you are looking for does not exist. Try a search.', 'getaway' ); ?></p>
        
                            <?php get_search_form(); ?>
        
                           
        
                        </div><!-- .page-content -->
                    </article><!-- .error-404 -->
        
                </main><!-- #main -->
            </div><!-- #primary -->
		</div><!-- .container -->
    </div><!-- #mid -->
<?php get_footer(); ?>
