<?php

/*our functions for changing the Free! price string*/

//Check if WooCommerce is active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {


	// Hook me in!
	add_filter( 'woocommerce_email_headers', 'wcme_multiple_recipients', 10, 2);
		

	function wcme_multiple_recipients( $headers, $object ) {
	//get our options
	$wcme_options = get_option('wcme_settings');
	
	// replace the emails below to your desire email
	$emails = array( $wcme_options['email_1'], $wcme_options['email_2'], $wcme_options['email_3'], $wcme_options['email_4'], $wcme_options['email_5'] );
		
    if ($object == 'new_order'  && $wcme_options['enable_new'] == true) {
        $headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			//break;
		
	}

	if ($object == 'cancelled_order'  && $wcme_options['enable_cancelled'] == true) {
        $headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			//break;
		
	}


	if ($object == 'customer_processing_order'  && $wcme_options['enable_processing'] == true) {
        $headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			//break;
		
	}

	if ($object == 'customer_completed_order'  && $wcme_options['enable_completed'] == true) {
        $headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			//break;
		
	}

	if ($object == 'customer_invoice'  && $wcme_options['enable_invoice'] == true) {
        $headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			//break;
		
	}

	if ($object == 'customer_refunded_order'  && $wcme_options['enable_refunded'] == true) {
        $headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			//break;
		
	}
 
	return $headers;
}
/*	switch($object) {
		case 'new_order':
		case 'customer_processing_order':
		case 'customer_completed_order':
		case 'customer_invoice':
			$headers .= 'Bcc: ' . implode(',', $emails) . "\r\n";
			break;
		default:
	}
 
	return $headers;

	}*/

}

else {return 'WooCommerce is not active, please install and activate it first';}