<?php
/**
 * WP-Members Admin API Functions
 * 
 * This file is part of the WP-Members plugin by Chad Butler
 * You can find out more about this plugin at http://rocketgeek.com
 * Copyright (c) 2006-2016  Chad Butler
 * WP-Members(tm) is a trademark of butlerblog.com
 *
 * @package WP-Members
 * @author Chad Butler
 * @copyright 2006-2016
 *
 * Functions included:
 * - wpmem_add_custom_email
 * - wpmem_add_custom_dialog
 */

/**
 * Wrapper function for adding custom emails.
 *
 * @since 3.1.1
 *
 * @global object $wpmem         The WP_Members object class.
 * @param  string $tag           Slug for the custom email.
 * @param  string $heading       Heading to display in admin panel.
 * @param  string $subject_input Slug for the subject. 
 * @param  string $message_input Slug for the message body.
 */
function wpmem_add_custom_email( $tag, $heading, $subject_input, $message_input ) {
	global $wpmem;
	$args = array(
		'name'          => $tag,
		'heading'       => $heading, 
		'subject_input' => $subject_input,
		'body_input'    => $message_input,	
	);
	$wpmem->admin->add_email( $args );
}

/**
 * Wrapper function for adding custom dialogs.
 *
 * @since 3.1.1
 *
 * @param  array  $dialogs Dialog settings array.
 * @param  string $tag     Slug for dialog to be added.
 * @param  string $msg     The dialog message.
 * @param  string $label   Label for admin panel.
 * @return array  $dialogs Dialog settings array with prepped custom dialog added.
 */
function wpmem_add_custom_dialog( $dialogs, $tag, $msg, $label ) {
	if ( is_admin() && isset( $_GET['tab'] ) && 'dialogs' == $_GET['tab'] ) {
		$dialogs[ $tag ] = array(
			'name'  => $tag,
			'label' => $label,
			'value' => ( ! isset( $dialogs[ $tag ] ) ) ? $msg : $dialogs[ $tag ],
		);
	}
	return $dialogs;
}