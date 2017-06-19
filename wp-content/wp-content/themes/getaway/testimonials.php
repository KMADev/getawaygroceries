<?php
/**
 * Template Name: Testimonials
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
					$content = apply_filters('the_content', $post->post_content); 
					echo $content;  
				?>
                
                <div id="testimonial-list">
                <?php
   				$args = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'orderby'          => 'meta_value',
				'order'            => 'ASC',
				'include'          => '',
				'exclude'          => '',
				'post_type'        => 'testimonial',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish' );
				
				$testimonials = get_posts( $args );
				$i = 1;
				foreach($testimonials as $testimonial){
					$id = $testimonial->ID;
					$quote = get_field('testimonial_content',$id);
					$author = get_field('author',$id);
					$author2 = get_field('author_line_two',$id);
					
					echo '<div id="testimonial_'.$i.'" >';
					echo '<p class="testimonial-text">';
					echo '<span class="open-quote">&#8220;</span><em>'.strip_tags($quote,'<p></p>').'</em><span class="close-quote">&#8221;</span>';	
					echo '</p>';
					echo '<p class="testimonial-author" align="right">&#8212; '.$author;
					if($author2!=''){ echo ', '.$author2; }
					echo '</p>';
					echo '</div>';
					
					$i++;
				}
				
				?>
        		</div>
                
                <div class="clear"></div>
                
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #mid -->
<?php get_footer(); ?>
