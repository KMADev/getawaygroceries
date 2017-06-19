<?php
/**
 * Registration form.
 *
 * @author 	Jeroen Sormani
 * @package 	WooCommerce-Simple-Registration
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;


?><div class="registration-form woocommerce">

	<?php wc_print_notices(); ?>

	<form method="post" class="register">

		<?php do_action( 'woocommerce_register_form_start' ); ?>
        
        <!--<div class="row">
        <div class="col res-12 ph-1">
            <p class="form-row form-row-wide" >
                <label for="first_name">First Name <span class="required">*</span></label>
                <input type="text" name="account_first_name" id="first_name" class="input-text" value="" size="25">
            </p>
        </div>
        <div class="col res-12 ph-1">
            <p class="form-row form-row-wide" >
                <label for="last_name">Last Name <span class="required">*</span></label>
                <input type="text" name="account_last_name" id="last_name" class="input-text" value="" size="25">
            </p>
        </div>
        </div>-->
        
        <div class="row">
		<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
        <div class="col res-12 ph-1">
			<p class="form-row form-row-wide">
				<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
			</p>
        </div>
		<?php endif; ?>
        <div class="col res-12 ph-1">
            <p class="form-row form-row-wide">
                <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
            </p>
        </div>
		<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
        <div class="col res-12 ph-1">
			<p class="form-row form-row-wide">
				<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="password" class="input-text" name="password" id="reg_password" />
			</p>
        </div>
		<?php endif; ?>
        </div>
        <div class="row">
        <div class="col res-34 tab-23 ph-1">
            <p class="form-row form-row-wide" >
                <label for="addr1">Address 1 <span class="required">*</span></label>
                <input type="text" name="billing_address_1" id="addr1" class="input-text" value="" size="25">
            </p>
        </div>
        <div class="col res-14 tab-13 ph-1">
            <p class="form-row form-row-wide" >
                <label for="addr2">Address 2</label>
                <input type="text" name="billing_address_2" id="addr2" class="input-text" value="" size="25">
            </p>
        </div>
        </div>    
        <div class="row">
        <div class="col res-12 tab-13 ph-1">    
            <p class="form-row form-row-wide" >
                <label for="city">City <span class="required">*</span></label>
                <input type="text" name="billing_city" id="city" class="input-text" value="" size="25">
            </p>
        </div>
        <div class="col res-14 tab-13 ph-1">
            <p class="form-row form-row-wide" >
                <label for="thestate">State <span class="required">*</span></label>
                <input type="text" name="billing_state" id="thestate" class="input-text" value="" size="25">
            </p>
        </div>
        <div class="col res-14 tab-13 ph-1">
            <p class="form-row form-row-wide" >
                <label for="zip">Zip <span class="required">*</span></label>
                <input type="text" name="billing_postcode" id="zip" class="input-text" value="" size="25">
            </p>
        </div>    
        </div>  
		<!-- Spam Trap -->
		<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

		<?php do_action( 'woocommerce_register_form' ); ?>
		<?php //do_action( 'register_form' ); ?>

		<p class="form-row">
			<?php wp_nonce_field( 'woocommerce-register' ); ?>
			<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
		</p>

		<?php do_action( 'woocommerce_register_form_end' ); ?>

	</form>

</div>
