<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>
<ul class="woocommerce-error uk-list uk-width-1-1" role="alert">
	<?php foreach ( $messages as $message ) : ?>
		<li class="uk-flex uk-flex-middle"><span class="uk-margin-small-right" data-uk-icon="warning"></span><?php echo wp_kses_post( $message ); ?></li>
	<?php endforeach; ?>
</ul>
