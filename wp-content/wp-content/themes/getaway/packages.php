<?php
/**
 * Template Name: Packages
 *
 * @package Getaway
 */

$featuredImage = get_field('featured_photo');

get_header(); ?>
	<div id="mid">
    	<div id="main-image" >
            <div class="container wrap" >
            	<img src="<?php echo $featuredImage['url']; ?>" alt="<?php echo $featuredImage['alt']; ?>" />
            </div>
        </div>
    	<div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
        		
                <?php
					$post = get_post($id); 
					echo '<h1>'.$post->post_title.'</h1>';
					$content = apply_filters('the_content', $post->post_content); 
					echo $content;  
				?>
                
                <div id="package-list">
                <?php

					$args = array(
					  'posts_per_page'   => -1,
					  'offset'           => 0,
					  'orderby'          => 'meta_value',
					  'order'            => 'ASC',
					  'include'          => '',
					  'exclude'          => '',
					  'post_type'        => 'package',
					  'post_mime_type'   => '',
					  'post_parent'      => '',
					  'post_status'      => 'publish' );
					  
					  $packages = get_posts( $args );
					  $i = 1;
					  foreach($packages as $package){
						  $id = $package->ID;
						  $details = get_field('package_details',$id);
						  $price = get_field('package_price',$id);
					  
						  echo '<div id="package_'.$i.'" class="package">';
						  echo '<h2 class="title">'.$package->post_title.'</h2>';
						  
						  echo '<div class="details">'.$details.'</div>';
						  
						  echo '</div>';
						  //echo '<p class="cta"><a href="">Start your order.</a></p>';
						  
						  $i++;
					  }
				
				?>
        		</div>
                
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #mid -->
<?php get_footer(); ?>
