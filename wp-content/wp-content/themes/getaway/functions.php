<?php
/**
 * Getaway functions and definitions
 *
 * @package Getaway
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}
if ( ! function_exists( 'getaway_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function getaway_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Getaway, use a find and replace
	 * to change 'getaway' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'getaway', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'getaway' ),
		'mini' => __( 'Footer Menu', 'getaway' ),
		'footer' => __( 'Mini Menu', 'getaway' ),
	) );


	//Register custom post types
	register_post_type( 'testimonial', array(
			'labels'             => array(
				'name' 		         => _x( 'Testimonials', 'post type general name', 'getaway' ),
				'singular_name'      => _x( 'Testimonial', 'post type singular name', 'getaway' ),
				'menu_name'          => _x( 'Testimonials', 'admin menu', 'getaway' ),
				'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'getaway' ),
				'add_new'            => _x( 'Add New', 'testimonial', 'getaway' ),
				'add_new_item'       => __( 'Add New Testimonial', 'getaway' ),
				'new_item'           => __( 'New Testimonial', 'getaway' ),
				'edit_item'          => __( 'Edit Testimonial', 'getaway' ),
				'view_item'          => __( 'View Testimonial', 'getaway' ),
				'all_items'          => __( 'All Testimonials', 'getaway' ),
				'search_items'       => __( 'Search Testimonials', 'getaway' ),
				'parent_item_colon'  => __( 'Parent Testimonials:', 'getaway' ),
				'not_found'          => __( 'No testimonials found.', 'getaway' ),
				'not_found_in_trash' => __( 'No testimonials found in Trash.', 'getaway' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' 			=> 'testimonial',   	//string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
				'with_front' 	=> false, 				//bool Should the permalink structure be prepended with the front base. <br>
														//(example: if your permalink structure is /blog/, then your links will be: false-> /news/, true->/blog/news/). Defaults to true
				'feeds' 		=> true, 				//bool Should a feed permalink structure be built for this post type. Defaults to has_archive value
				'pages' 		=> false				//bool Should the permalink structure provide for pagination. Defaults to true
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title' )
	));

	//Register custom post types
	/*register_post_type( 'package', array(
			'labels'             => array(
				'name' 		         => _x( 'Packages', 'post type general name', 'getaway' ),
				'singular_name'      => _x( 'Package', 'post type singular name', 'getaway' ),
				'menu_name'          => _x( 'Packages', 'admin menu', 'getaway' ),
				'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'getaway' ),
				'add_new'            => _x( 'Add New', 'package', 'getaway' ),
				'add_new_item'       => __( 'Add New Package', 'getaway' ),
				'new_item'           => __( 'New Package', 'getaway' ),
				'edit_item'          => __( 'Edit Package', 'getaway' ),
				'view_item'          => __( 'View Package', 'getaway' ),
				'all_items'          => __( 'All Packages', 'getaway' ),
				'search_items'       => __( 'Search Packages', 'getaway' ),
				'parent_item_colon'  => __( 'Parent Packages:', 'getaway' ),
				'not_found'          => __( 'No packages found.', 'getaway' ),
				'not_found_in_trash' => __( 'No packages found in Trash.', 'getaway' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' 			=> 'package',   		//string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
				'with_front' 	=> false, 				//bool Should the permalink structure be prepended with the front base. <br>
														//(example: if your permalink structure is /blog/, then your links will be: false-> /news/, true->/blog/news/). Defaults to true
				'feeds' 		=> true, 				//bool Should a feed permalink structure be built for this post type. Defaults to has_archive value
				'pages' 		=> false				//bool Should the permalink structure provide for pagination. Defaults to true
			),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title','custom-fields' )
	));*/

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'getaway_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'woocommerce' );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

}
endif; // getaway_setup
add_action( 'after_setup_theme', 'getaway_setup' );
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function getaway_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Left', 'getaway' ),
		'id'            => 'header-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Right', 'getaway' ),
		'id'            => 'header-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'getaway' ),
		'id'            => 'sidebar-shop',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'getaway_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function getaway_scripts() {
	wp_enqueue_style( 'getaway-style', get_stylesheet_uri() );
	wp_enqueue_script( 'getaway-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'getaway-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'getaway_scripts' );
function truncateText($string, $your_desired_width) {
	$parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
	$parts_count = count($parts);
	$length = 0;
	$last_part = 0;
	for (; $last_part < $parts_count; ++$last_part) {
		$length += strlen($parts[$last_part]);
		if ($length > $your_desired_width) { break; }
	}
	return implode(array_slice($parts, 0, $last_part));
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
// http://www.gravityhelp.com/forums/topic/entry-ids
// update the 93 here to your form ID

function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');

function custom_woocommerce_is_purchasable( $purchasable, $product ){
    if( $product->get_price() == 0 ||  $product->get_price() == '')
        $purchasable = true;
    return $purchasable;
}
add_filter( 'woocommerce_is_purchasable', 'custom_woocommerce_is_purchasable', 10, 2 );

 //Change number of products per row to 1
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 1; // 1 products per row
	}
}

//remove reviews and additional information from products
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);
 unset($tabs['additional_information']);

 return $tabs;
}


//remove product thumbnails in shopping cart
add_filter( 'woocommerce_cart_item_thumbnail', 'woo_remove_cart_item_thumbnail');
function woo_remove_cart_item_thumbnail($thumbnail) {

  unset($thumbnail);

  return $thumbnail;
}


//Only show packages category on shop page. This only works when “Shop Page Display” is set to
//‘Show Products’ under WooCommerce > Settings > Products > Display.

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

function custom_pre_get_posts_query( $q ) {

	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;

	if ( ! is_admin() && is_shop() ) {

		$q->set( 'tax_query', array(array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => array( 'condiments-spices', 'crackers-cookies-other-snacks', 'deli', 'fresh-produce', 'frozen-foods', 'gluten-free', 'local-flavors', 'meats', 'pasta-rice-canned-foods', 'bakery', 'beverages', 'breakfast', 'cheese-dairy', 'household', 'additional-items', 'uncategorized' ), // Don't display products in the knives category on the shop page
			'operator' => 'NOT IN'
		)));

	}

	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

}
add_filter( 'add_to_cart_text', 'package_button' );
apply_filters( 'variable_add_to_cart_url', 'package_button' );

function package_button( $text ) {
     global $post;

     if ( has_term( 'packages', 'product_cat', $post ) ) {
          $text = __('View Package', 'woocommerce' );
					$link = get_permalink( $product->id );
     }
     return $text;
		 return $link;
}
//removes sku from product page
add_filter( 'wc_product_sku_enabled', '__return_false' );

//hides prices from shop page
add_filter('woocommerce_get_price_html','hide_price');
add_filter( 'woocommerce_variable_sale_price_html', 'hide_price');
add_filter( 'woocommerce_variable_price_html', 'hide_price');
function hide_price($price){
		unset($price);
		return $price;
}
//ajax add to cart
function cs_wc_loop_add_to_cart_scripts() {
    if ( is_shop() || is_product_category() || is_product_tag() || is_product() ) : ?>

<script>
    jQuery(document).ready(function($) {
        $(document).on( 'change', '.quantity .qty', function() {
            $(this).parent('.quantity').next('.add_to_cart_button').attr('data-quantity', $(this).val());
        });
				<?php /* remove old "view cart" text, only need latest one thanks! */ ?>
$(document.body).on("adding_to_cart", function() {
		$("a.added_to_cart").remove();
});
    });
</script>

    <?php endif;
}
/**
 * Add the field to the checkout

add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

    echo '<div id="my_custom_checkout_field"><h3>' . __('Rental Info') . '</h3>';

    woocommerce_form_field( 'rental_comany_name', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Rental Company Name'),
        'placeholder'   => __('Enter rental company name'),
			), $checkout->get_value( 'rental_company_name' ));
    woocommerce_form_field( 'arrival_date', array(
        'type'          => 'date',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Arrival Date'),
        'placeholder'   => __('Enter the date of your arrival'),
			), $checkout->get_value( 'arriaval_date' ));

    echo '</div>';

}
*/
add_action( 'wp_footer', 'cs_wc_loop_add_to_cart_scripts' );
//removes the product prices from the cart page
add_filter('woocommerce_cart_item_price', 'hide_price');
// Update items in cart via AJAX
add_filter('add_to_cart_fragments', 'woo_add_to_cart_ajax');
function woo_add_to_cart_ajax( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
            <span class="cart"><a class="cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>
    <?php
    $fragments['a.cart'] = ob_get_clean();
    return $fragments;
}
//removes the subtotal from the cart page
add_filter('woocommerce_cart_subtotal', '__return_false');


//adds custom fee named deposit to the shopping cart page & payment portal
add_action( 'woocommerce_cart_calculate_fees','deposit_fee' );
function deposit_fee() {
     global $woocommerce;

     if ( is_admin())
          return;

     $fee = 300.00;
     $woocommerce->cart->add_fee( 'Deposit', $fee, true, 'standard' );
}

//removes the product subtotals from shopping cart ("Total" column)
add_filter('woocommerce_cart_item_subtotal', '__return_false');

// Limit Quantity
add_filter( 'woocommerce_quantity_input_args', 'quantity_input_args', 10, 2 );

function quantity_input_args( $args, $product ) {
//$args['input_value']  = 1;    // Starting value
$args['max_value']      = 50;   // Maximum value
$args['min_value']      = 0;    // Minimum value
//$args['step']         = 1;    // Quantity steps
return $args;
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 30;' ), 20 );
add_action('init', 'woocommerce_clear_cart_url');
function woocommerce_clear_cart_url() {
    global $woocommerce;
    if( isset($_REQUEST['clear-cart']) ) {
        $woocommerce->cart->empty_cart();
    }
}


if(!is_admin()){
    
    // Function to check starting char of a string
    function startsWith($haystack, $needle){
        return $needle === "" || strpos($haystack, $needle) === 0;
    }

    // Custom function to display the Billing Address form to registration page
    function my_custom_function(){
        global $woocommerce;
        $checkout = $woocommerce->checkout();
        ?>
        <!--<h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>-->
        <?php
        foreach ($checkout->checkout_fields['billing'] as $key => $field) :
        if($key == 'billing_first_name' || $key == 'billing_last_name' || $key == 'billing_phone' || $key == 'billing_state' || $key == 'billing_address_1' || $key == 'billing_address_2' || $key == 'billing_city'){
            woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
        }
        endforeach;
        
        //print_r($checkout->checkout_fields['billing']);
    }
    add_action('register_form','my_custom_function');

    function wc_ninja_remove_password_strength() {
	if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );

    // Custom function to save Usermeta or Billing Address of registered user
    function save_address($user_id){
        global $woocommerce;
        $address = $_POST;
        foreach ($address as $key => $field) :
        if(startsWith($key,'billing_')){
            // Condition to add firstname and last name to user meta table
            if($key == 'billing_first_name' || $key == 'billing_last_name'){
                $new_key = explode('billing_',$key);
                update_user_meta( $user_id, $new_key[1], $_POST[$key] );
            }
            update_user_meta( $user_id, $key, $_POST[$key] );
        }
        endforeach;

    }
    add_action('woocommerce_created_customer','save_address');

    // Registration page billing address form Validation
    function custom_validation(){
        global $woocommerce;
        $address = $_POST;

        foreach ($address as $key => $field) :
        
        // Validation: Required fields
        if(startsWith($key,'billing_')){

            if($key == 'billing_first_name' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter first name.', 'woocommerce' ) );
            }
            if($key == 'billing_last_name' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter last name.', 'woocommerce' ) );
            }
            if($key == 'billing_address_1' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter address.', 'woocommerce' ) );
            }
            if($key == 'billing_city' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter city.', 'woocommerce' ) );
            }
            if($key == 'billing_state' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter state.', 'woocommerce' ) );
            }
            if($key == 'billing_postcode' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter a postcode.', 'woocommerce' ) );
            }
            if($key == 'billing_phone' && $field ==''){
                $woocommerce->add_error( '<strong>' . __( 'ERROR', 'woocommerce' ) . '</strong>: ' . __( 'Please enter phone number.', 'woocommerce' ) );
            }

        }
        endforeach;
    }
    add_action('register_post','custom_validation');

}

function registration_email_alert( $user_id ) {
    $templatetop ='<!DOCTYPE html><html dir="ltr"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Getaway Groceries</title>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="ltr" style="background-color: #f5f5f5; margin: 0; padding: 70px 0 70px 0; -webkit-text-size-adjust: none !important; width: 100%;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"><tr>
<td align="center" valign="top">
						<div id="template_header_image">
													</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #fdfdfd; border: 1px solid #dcdcdc; border-radius: 3px !important;">
<tr>
<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color: #bbde98; border-radius: 3px 3px 0 0 !important; color: #202020; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><tr>
<td id="header_wrapper" style="padding: 36px 48px; display: block;">
												<h1 style="color: #202020; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: left; text-shadow: 0 1px 0 #c9e5ad; -webkit-font-smoothing: antialiased;">New Customer Registration</h1>
											</td>
										</tr></table>
<!-- End Header -->
</td>
							</tr>
<tr>
<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body"><tr>
<td valign="top" id="body_content" style="background-color: #fdfdfd;">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%"><tr>
<td valign="top" style="padding: 48px;">
															<div id="body_content_inner" style="color: #737373; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;">';
    
                                                $templatebot =  '</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- End Content -->
</td>
										</tr></table>
<!-- End Body -->
</td>
							</tr>
<tr>
<td align="center" valign="top">
									<!-- Footer -->
									<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer"><tr>
<td valign="top" style="padding: 0; -webkit-border-radius: 6px;">
												<table border="0" cellpadding="10" cellspacing="0" width="100%"><tr>
<td colspan="2" valign="middle" id="credit" style="padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #d6ebc1; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;">
															<p>Getaway Groceries</p>
														</td>
													</tr></table>
</td>
										</tr></table>
<!-- End Footer -->
</td>
							</tr>
</table>
</td>
				</tr></table>
</div>
	</body>
</html>';
    
    $user = get_userdata( $user_id );
    //$firstName = get_user_meta($user->ID, 'first_name', true);
    //$lastName = get_user_meta($user->ID, 'last_name', true);
    $firstName = $user->first_name;
    $lastName = $user->last_name;
    
    $style = 'class="td" style="text-align: left; vertical-align: middle; border: 1px solid #eee; font-family: \'Helvetica Neue\', Helvetica,
Roboto, Arial, sans-serif; word-wrap: break-word; color: #737373; padding: 12px;"';
    
    $message = '<p>A new user has registered on the website. Thier information is as follows: </p>';
    $message .= '<table><tr><td '.$style.' ><strong>ID</strong></td><td '.$style.' >'.$user_id.'</td></tr>';
    $message .= '<tr><td '.$style.' ><strong>Name</strong></td><td '.$style.' >'.$firstName.' '.$lastName.'</td></tr>';
    $message .= '<tr><td '.$style.' ><strong>Username</strong></td><td '.$style.' >'.$user->user_login.'</td></tr>';
    $message .= '<tr><td '.$style.' ><strong>Email</strong></td><td '.$style.' >'.$user->user_email.'</td></tr>';
    $message .= '</table>';
    
    $sendadmin = array(
		'to'		=> 'info@getawaygroceries.com',
		'from'		=> 'Getaway Groceries Website <noreply@getawaygroceries.com>',
		'subject'	=> 'New Customer Registration',
		'bcc'		=> 'support@kerigan.com'
	);
    
    $emaildata = array(
		'headline'	=> 'New Customer Registration', 
		'introcopy'	=> $message
	);
        
    $eol = "\r\n";
		
    //build headers
    $headers = 'From: ' . $sendadmin['from'] . $eol;
    if($sendadmin['cc'] != ''){ $headers .= 'Cc: ' . $sendadmin['cc'] . $eol; }
    if($sendadmin['bcc'] != ''){ $headers .= 'Bcc: ' . $sendadmin['bcc'] . $eol; }

    $headers .= 'MIME-Version: 1.0' . $eol;

    $headers .= 'Content-type: text/html; charset=utf-8' . $eol;
    $emailcontent  = $templatetop . $eol . $eol;
    $emailcontent .= $emaildata['introcopy'];
    $emailcontent .= $templatebot . $eol . $eol;

    mail( $sendadmin['to'], $sendadmin['subject'], $emailcontent, $headers );
    
}
add_action('user_register', 'registration_email_alert');

?>
