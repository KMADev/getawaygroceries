<?php
/*
Plugin Name: WC Fields Factory
Plugin URI: http://sarkware.com/wc-fields-factory-a-wordpress-plugin-to-add-custom-fields-to-woocommerce-product-page/
Description: It allows you to add custom fields to your woocommerce product page. You can add custom fields and validations without tweaking any of your theme's code & templates, It also allows you to group the fields and add them to particular products or for particular product categories. Supported field types are text, numbers, email, textarea, checkbox, radio and select.
Version: 1.3.4
Author: Saravana Kumar K
Author URI: http://www.iamsark.com/
License: GPL
Copyright: sarkware
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

if( !class_exists('wcff') ):

class wcff {
	
	var $info,
	$fields,
	$request,
	$response;
	
	public function __construct() {

		$this->info = array(
			'path'				=> plugin_dir_path( __FILE__ ),
			'dir'				=> plugin_dir_url( __FILE__ ),
			'version'			=> '1.3.4'
		);
		/* Will be used to holds all field's instances */
		$this->fields = array();
		
		add_action( 'init', array( $this, 'init' ), 1 );		
		$this->wcff_includes();
		
	}
	
	function admin_menu() {
		
		$admin = add_menu_page( 
			"WC Fields Factory", 
			"Fields Factory", 
			'manage_options', 
			'edit.php?post_type=wccpf', 
			false,
			null
		);	
		add_submenu_page(
			'edit.php?post_type=wccpf',
			"Product Fields",
			"Product Fields",
			"manage_options",
			"edit.php?post_type=wccpf"
		);
		add_submenu_page(
			'edit.php?post_type=wccpf',
			"Add WC Product Fields",
			"Add Product Field",
			"manage_options",
			'post-new.php?post_type=wccpf'
		);
		add_submenu_page(
			'edit.php?post_type=wccpf',
			"Admin Fields",
			"Admin Fields",
			"manage_options",
			"edit.php?post_type=wccaf"			
		);
		add_submenu_page(
			'edit.php?post_type=wccpf',
			"Add WC Product Fields",
			"Add Admin Field",
			"manage_options",
			'post-new.php?post_type=wccaf'
		);
		add_submenu_page( 
			'edit.php?post_type=wccpf', 
			'Wc Fields Factory Options', 
			'Settings', 
			'manage_options', 
			'wccpf_settings', 
			'wccpf_render_option_page' 
		);
		
	}
	
	function init() {	
		$wccpf_labels = array (
			'name' => 'WC Product&nbsp;Field&nbsp;Groups',
			'singular_name' => 'WC Product Custom Fields',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New WC Product Field Group',
			'edit_item' => 'Edit WC Product Field Group',
			'new_item' =>  'New WC Product Field Group',
			'view_item' => 'View Product Field Group',
			'search_items' => 'Search WC Product Field Groups',
			'not_found' =>  'No WC Product Field Groups found',
			'not_found_in_trash' => 'No WC Product Field Groups found in Trash',
		);
		
		$wccaf_labels = array (
			'name' => 'WC Admin&nbsp;Field&nbsp;Groups',
			'singular_name' => 'WC Custom Admin Fields',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New WC Admin Field Group',
			'edit_item' => 'Edit WC Admin Field Group',
			'new_item' =>  'New WC Admin Field Group',
			'view_item' => 'View Admin Field Group',
			'search_items' => 'Search WC Admin Field Groups',
			'not_found' =>  'No WC Admin Field Groups found',
			'not_found_in_trash' => 'No WC Admin Field Groups found in Trash'
		);
	
		register_post_type(
			'wccpf', 
			array (
				'labels' => $wccpf_labels,
				'public' => false,
				'show_ui' => true,
				'_builtin' =>  false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => false,
				'query_var' => "wccpf",
				'supports' => array( 'title' ),
				'show_in_menu'	=> false
			)
		);	
		
		register_post_type(
			'wccaf',
			array (
				'labels' => $wccaf_labels,
				'public' => false,
				'show_ui' => true,
				'_builtin' =>  false,
				'capability_type' => 'page',
				'hierarchical' => true,
				'rewrite' => false,
				'query_var' => "wccaf",
				'supports' => array( 'title' ),
				'show_in_menu'	=> false
			)
		);

		wp_register_script( 'wcff-script', $this->info['dir'] . "assets/js/wcff.js", 'jquery', $this->info['version'] );	
		wp_register_style( 'wcff-style', $this->info['dir'] . 'assets/css/wcff.css' );
		
		if( is_admin() ) {
			include_once('classes/wcff-options.php');
			add_action( 'admin_menu', array($this,'admin_menu' ) );			
		}
	}
	
	function wcff_includes() {				
		
		include_once('classes/misc/wcff-request.php');
		include_once('classes/misc/wcff-response.php');
		include_once('classes/wcff-dao.php');
		include_once('classes/wcff-builder.php');
		include_once('classes/wcff-listener.php');		
		include_once('classes/wcff-post-form.php');
		include_once('classes/wcff-product-form.php');
		
		if( is_admin() ) {
			include_once('classes/wcff-admin-form.php');
		}
		
		include_once('classes/fields/wcff-fields.php');
		include_once('classes/fields/wcff-text.php');
		include_once('classes/fields/wcff-number.php');
		include_once('classes/fields/wcff-email.php');
		include_once('classes/fields/wcff-hidden.php');
		include_once('classes/fields/wcff-label.php');
		include_once('classes/fields/wcff-textarea.php');			
		include_once('classes/fields/wcff-checkbox.php');			
		include_once('classes/fields/wcff-radio.php');
		include_once('classes/fields/wcff-select.php');
		include_once('classes/fields/wcff-datepicker.php');
		include_once('classes/fields/wcff-colorpicker.php');
		include_once('classes/fields/wcff-file.php');
		
	}
	
}


function wcff() {
	
	global $wcff;
	
	if( !isset( $wcff ) ) {
		$wcff = new wcff();
	}
	
	return $wcff;
	
}

wcff();

endif;

?>