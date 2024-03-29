<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order" data-uk-margin="margin:uk-margin-large">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>
			<div>
				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed uk-h3"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'baklon' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'baklon' ) ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'baklon' ); ?></a>
					<?php endif; ?>
				</p>
			</div>
		<?php else : ?>
			<div>
				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received uk-h3"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'baklon' ), $order ); ?></p>

				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details uk-list">

					<li class="woocommerce-order-overview__order order">
						<?php _e( 'Order number:', 'baklon' ); ?>
						<?php echo sprintf( '<strong>%1$s</strong>', $order->get_order_number() );?>
					</li>
					<li class="woocommerce-order-overview__date date">
						<?php _e( 'Date:', 'baklon' ); ?>
						<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
					</li>

					<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
						<li class="woocommerce-order-overview__email email">
							<?php _e( 'Email:', 'baklon' ); ?>
							<?php echo sprintf( '<strong>%1$s</strong>', $order->get_billing_email() );?>
						</li>
					<?php endif; ?>

					<li class="woocommerce-order-overview__total total">
						<?php _e( 'Total:', 'baklon' ); ?>
						<?php echo sprintf( '<strong>%1$s</strong>', $order->get_formatted_order_total() );?>
					</li>

					<?php if ( $order->get_payment_method_title() ) : ?>
						<li class="woocommerce-order-overview__payment-method method">
							<?php _e( 'Payment method:', 'baklon' ); ?>
							<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
						</li>
					<?php endif; ?>

				</ul>
			</div>
		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'baklon' ), null ); ?></p>

	<?php endif; ?>

</div>
