<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Getaway
 */
 
$homeid = get_option('page_on_front');
 
?>
    <div id="bottom">
        <div class="container">
            <footer id="colophon" class="site-footer">
                <div id="footer-col-1" class="col res-15 large-1 tab-1 wide-1 ph-1" >
                    <?php wp_nav_menu( 'footer' ); ?>
                </div>
                <div id="footer-col-2" class="col res-15 large-14 tab-12 wide-12 ph-1" >
                <a><h3><?php echo get_the_title( 554); ?></h3></a>
                	<ul>
                    <li>
                    <ul>
                        <li class="page_item"><a href="/product-category/packages/">Packages</a></li>
                	<?php $ratespages = array(
						'child_of'     => 554,
						'depth'        => 1,
						'post_type'    => 'page',
						'post_status'  => 'publish',
						'show_date'    => '',
						'sort_column'  => 'menu_order, post_title',
						'sort_order'   => '',
						'title_li'     => __('')
					); wp_list_pages( $ratespages );
					?>
                        </ul></li>
                    </ul>
                </div>
                <div id="footer-col-3" class="col res-15 large-14 tab-12 wide-12 ph-1" >
                <a><h3><?php echo get_the_title( 461); ?></h3></a>
                	<ul>
                    <li>
                    <ul>
                	<?php $ratespages = array(
						'child_of'     => 461,
						'depth'        => 1,
						'post_type'    => 'page',
						'post_status'  => 'publish',
						'show_date'    => '',
						'sort_column'  => 'menu_order, post_title',
						'sort_order'   => '',
						'title_li'     => __('')
					); wp_list_pages( $ratespages );
					?></ul></li>
                    </ul>
                </div>
                <div id="footer-col-4" class="col res-15 large-14 tab-12 wide-12 ph-1" >
                <a><h3><?php echo get_the_title( 13); ?></h3></a>
                	<ul>
                    <li>
                    <ul>
                	<?php $ratespages = array(
						'child_of'     => 13,
						'depth'        => 1,
						'post_type'    => 'page',
						'post_status'  => 'publish',
						'show_date'    => '',
						'sort_column'  => 'menu_order, post_title',
						'sort_order'   => '',
						'title_li'     => __('')
					); wp_list_pages( $ratespages );
					?></ul></li>
                    </ul>
                </div>
                <div id="footer-col-5" class="col res-15 large-14 tab-12 wide-12 ph-1" >
                <a><h3>My Account</h3></a>
                	<ul>
                    <li><ul>
                    	<?php if (is_user_logged_in()){ ?>
                        <li class="page_item"><a href="/my-account/edit-account/">Update Account</a></li>
                        <li class="page_item"><a href="/my-account/orders/">My Orders</a></li>
                        <li class="page_item"><a href="/my-account/edit-address/">My Addresses</a></li>
                        <li class="page_item"><a href="/login/?a=logout" >Log out</a></li>
                    	<?php } else { ?>
                        <li class="page_item"><a href="/my-account/">Log in</a></li>
                        <li class="page_item"><a href="/create-an-account/">Register</a></li>
                    	<?php } ?>
                        </ul></li>
                    </ul>
                </div>
                <div id="social-media" class="col res-1" >
                
                </div>
                <hr>
                <div id="copyright" class="col res-12 wide-12 ph-1" >
                    <p class="copyright"><span class="ph-block">&copy; <?php echo date('Y'); ?> Getaway Groceries</span></p> 
                </div>
                <div id="siteby" class="col res-12 wide-12 ph-1">
                    <p><span class="siteby" ><img src="<?php echo get_template_directory_uri(); ?>/images/kma.png" alt="Designed &amp; Programmed by Kerigan Marketing Associates" />Site by <a href="http://keriganmarketing.com" target="_blank">KMA</a>.</span></p>    
                </div>
            </footer><!-- #colophon -->
        </div>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
