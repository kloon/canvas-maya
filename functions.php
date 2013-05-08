<?php
/*-----------------------------------------------------------------------------------*/
/* Start Theme Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Remove mini cart from main navigation
remove_action( 'woo_nav_inside', 'woo_add_nav_cart_link' );

// Always show top nav and add mini cart
function woo_top_navigation() {
	global $woocommerce;
	?>
	<div id="top">
		<div class="col-full">
			<?php
				if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) {
			?>
					<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fr', 'theme_location' => 'top-menu' ) ); ?>
			<?php
				} else {
			?>
					<ul id="top-nav" class="nav fr">
						<li class="menu-item menu-item-object-page"><a href="<?php echo get_permalink( woocommerce_get_page_id( 'myaccount' ) ); ?>"><?php ( is_user_logged_in() ) ? _e( 'My Account', 'woothemes' ) : _e( 'Login/Register', 'woothemes' ); ?></a></li>
					</ul>
			<?php
				}
			?>
			<div id="cart" class="col-full">
				<a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'woothemes' ); ?>"><span class="minicart"><?php echo sprintf( _n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count ); ?></span></a>
			</div>
		</div><!-- /.col-full -->
	</div><!-- /#top -->
<?php
} // End woo_top_navigation()

// Update cart when items added via ajax
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'woothemes' ); ?>"><span class="minicart"><?php echo sprintf( _n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count ); ?></span></a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
} // End woocommerce_header_add_to_cart_fragment()

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/










/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>