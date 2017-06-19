<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Getaway
 */
$homeid = get_option('page_on_front');

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="<?php echo get_template_directory_uri() ?>/css/normalize.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/flexslider/flexslider.css" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/inc/flexslider/jquery.flexslider.js"></script>

<?php wp_head(); ?>

<link href="<?php echo get_template_directory_uri() ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/css/brickwork.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/css/theme.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=394796190677969&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60898780-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'getaway' ); ?></a>
	<div id="top">
		<div class="container">
            <header id="masthead" class="site-header">
        		<div id="header-left" class="col res-13 large-13 tab-1 ph-1" >
                	<div id="mini-menu" >
                    <a href="/" >Home</a> | <?php if (is_user_logged_in()){ ?><a href="/my-account/customer-logout/" >Log out</a><?php } else { ?><a href="/my-account/" >Login</a><?php } ?>
                    </div>

                    <?php dynamic_sidebar( 'header-left' ); ?>
                </div>
                <div id="header-center" class="col res-13 large-13 tab-12 ph-1" >
                	<a href="/"><img src="<?php echo get_template_directory_uri() ?>/images/getaway_groceries_logo.png" alt="Getaway Groceries" id="logo" /></a>
                </div>
                <div id="header-right" class="col res-13 large-13 tab-12 ph-1" >
                	<div class="contact">
                        <span class="headerphone" ><?php echo get_field('phone_number',$homeid); ?></span>
                        <span class="headeremail" ><a href="mailto:<?php echo get_field('email_address',$homeid); ?>" ><?php echo get_field('email_address',$homeid); ?></a></span>
                    </div>
                    <div class="checkout-bar">
                    <?php
						global $woocommerce;

						// get cart quantity
						$qty = $woocommerce->cart->get_cart_contents_count();

						// get cart total
						$total = $woocommerce->cart->get_cart_total();

						// get checkout urrl
						$checkout_url = $woocommerce->cart->get_checkout_url();

						// get cart url
						$cart_url = $woocommerce->cart->get_cart_url();

						//echo '<span class="cart" ><a href="'.$cart_url.'"><span id="mini-num" data-quantity="'.$qty.'">'.$qty.'</span> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>';
						//echo '<span class="checkout" ><a href="'.$checkout_url.'">Checkout</a></span>';
            ?>
            <span class="cart"><a class="cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>
<span class="checkout" ><a href="<?php echo $checkout_url; ?>">Checkout</a></span>



                    </div>
                    <?php //dynamic_sidebar( 'header-right' ); ?>
                </div>
        	</header><!-- #masthead -->
		</div>
    </div>
    <div id="navmenu">
    	<div class="container">
        	<nav id="site-navigation" class="main-navigation">
            	<button class="menu-toggle" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> <?php _e( 'Navigation Menu', 'getaway' ); ?></button>
            	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        	</nav><!-- #site-navigation -->
    	</div>
    </div>
