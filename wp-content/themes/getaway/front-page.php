<?php
/**
 * Template Name: Home
 *
 * @package Getaway
 */
$homeid = get_option('page_on_front');

get_header(); ?>

	<div id="mid">
        <div id="main-image" >
            <div class="container" >   	
                <div class="flexslider">
                    <ul class="slides">
                    <?php
                    
                    $slider = get_field('slide_show_gallery');
            
                    if($slider){
                        $p = 1; 
                        foreach($slider[0] as $ph){
                            echo '<li>';
                            echo '<img src="'.$ph['imageURL'].'" alt="'.$ph['alttext'].'" />';
                            echo '</li>';
                            $p++;
                        }
                    }
                    
                    ?>
                    </ul>
                </div>
                <script type="text/javascript">
				  $(window).load(function() {
					$('.flexslider').flexslider({
						controlNav: true,                //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
						directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
					});
				  });
				</script>

            </div>            
        </div>
        <div id="beach">
    	<div class="container">
    		<div id="content" class="site-content">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                    	<div class="row">
                        <div id="copy" class="col res-23 large-1 wide-1 ph-1 wrap" >
                            <?php 
                        
                            $post = get_post($id); 
                            $content = apply_filters('the_content', $post->post_content); 
                            echo $content;  
                            
                             ?>
<!--                        </div>-->
<!--                            <div id="login" class="col res-13 tab-1 wide-1 ph-1 right">-->
<!--                                <div id="login-box-container">-->
<!--                                    <div id="login-box-top" class="col res-1">-->
<!--                                        <a class="big-button purple" href="/shop/">Start Your Order</a>-->
<!--                                    </div>-->
<!--                                    <div id="login-box-bot" class="col res-1">-->
<!--                                        --><?php //if (is_user_logged_in()) { ?>
<!--                                            <p>Hi --><?php //echo do_shortcode('[wp-members field="user_login"]'); ?><!--,</p>-->
<!--                                            <ul>-->
<!--                                                <li><a href="/account-management/update-account/">Update Account</a>-->
<!--                                                </li>-->
<!--                                                <li><a href="/shop/">Continue Order</a></li>-->
<!--                                                <!--<li><a href="/account-management/my-orders/">View My Orders</a></li>-->-->
<!--                                            </ul>-->
<!---->
<!--                                        --><?php //} else { ?>
<!--                                            <p>Continue Saved Order</p>-->
<!--                                            <form name="form" method="post" action="/shop">-->
<!--                                                <fieldset>-->
<!--                                                    <div class="col res-1">-->
<!--                                                        <input type="text" name="log" class="username" id="username"-->
<!--                                                               placeholder="username"/>-->
<!--                                                    </div>-->
<!--                                                    <div class="col res-1">-->
<!--                                                        <input type="password" name="pwd" class="password" id="password"-->
<!--                                                               placeholder="password"/>-->
<!--                                                    </div>-->
<!--                                                    <div class="col res-12 half">-->
<!--                                                        <p class="small"><a href="/my-account/lost-password/">forgot-->
<!--                                                                password?</a></p>-->
<!--                                                    </div>-->
<!--                                                    <div class="col res-12 half aright">-->
<!--                                                        <input type="hidden" name="rememberme" value="forever"/>-->
<!--                                                        <input type="hidden" name="redirect_to" value="/shop"/>-->
<!--                                                        <input type="hidden" name="a" value="login"/>-->
<!--                                                        <input type="hidden" name="slog" value="true"/>-->
<!--                                                        <input type="submit" name="Submit" class="button green"-->
<!--                                                               value="log in"/>-->
<!--                                                    </div>-->
<!--                                                </fieldset>-->
<!--                                            </form>-->
<!--                                        --><?php //} ?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                       </div>-->

                      <div id="featured-box" class="row">
                        <div id="area" class="featurebox col res-13 tab-12 wide-1 ph-1" >
                            <h2>Areas We Serve</h2>
                            <div class="area-map">
                            	<img src="<?php echo get_template_directory_uri(); ?>/images/area-map.png"  alt="area map" />
                            </div>
                            <a class="big-button mocha" href="/links-local-flavor/helpful-links/" >Links & Local Flavor</a>
                        </div>
                        <div id="testimonial" class="featurebox col res-13 tab-12 wide-1 ph-1" >
                        	<div class="quote">                             
                                
                                <?php
									$args = array(
									'posts_per_page'   => 1,
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
									
										echo '<blockquote cite="http://www.worldwildlife.org/who/index.html">';
										echo '<span class="quote-icon">&#8220;</span>'.truncateText(strip_tags($quote, '<p></p>'), 285).'<span class="close-quote">&#8221;</span>';	
										echo '</blockquote>';
										echo '<p class="testimonial-author">'.$author;
										if($author2!=''){ echo '<br>'.$author2; }
										echo '</p><span class="mdash">&#8212;</span>';
										
										$i++;
									}
								?>
                				<div class="clear"></div>
                            </div>
                            <a class="big-button mocha" href="/testimonials/" >More Testimonials</a>
                        </div>
                       	
                        <div id="fb-like-box" class="featurebox col res-13 tab-12 wide-1 ph-1" >
                        <div class="fb-like-box" data-href="https://www.facebook.com/getawaygroceries" data-width="307" data-height="407" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
                        </div>
                     </div>
                    </main><!-- #main -->
                </div><!-- #primary -->
			</div><!-- #content -->
        </div><!-- .container -->
        </div><!-- beach -->
    </div><!-- #mid -->
<?php get_footer(); ?>
