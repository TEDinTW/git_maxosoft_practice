<?php
/**
 * @package FunTwanGoPlugin
 */

namespace Includes\Classes;

class WooFrontend
{

    public function register()
    {

        // check woocommerce is active
        if ( ! $this->checkWoocommerceActive() ) {
            return;
        }
        // shop page 顯示 ftg_pv
        add_action( 'woocommerce_after_shop_loop_item_title', array( $this, 'custom_shop_product_pv' ), 5 );
        // product page 顯示 ftg_pv
        add_action('woocommerce_single_product_summary', array( $this, 'custom_product_product_pv' ), 15);
        // cart page 顯示 ftg_pv
        add_filter('woocommerce_get_item_data', array( $this, 'customizing_cart_item_data' ), 10, 2);
        // cart page total 顯示 ftg_pv 加總
        add_action('woocommerce_cart_totals_before_shipping', array( $this, 'custom_cart_total_pv' ), 10, 0);
        // checkout 加入 ftg_pv 加總
        add_action('woocommerce_review_order_before_shipping', array( $this, 'custom_checkout_total_pv' ), 10, 0);
    }

    /**
     * 在 shop page 商品項目加上 ftg_pv 顯示
     */
    function custom_shop_product_pv()
    {
        global $product;
        $pv = get_post_meta($product->get_id(), '_ftg_product_pv', true);

        if (isset($pv)) {
            echo '<div class="items"><p><strong>pv : ' . $pv . '</strong></p></div>';
        }
    }

    /**
     * 在 product page 商品介紹加上 ftg_pv 顯示
     * color: #fc7978
     */
    function custom_product_product_pv()
    {
        global $product;
        $pv = get_post_meta($product->get_id(), '_ftg_product_pv', true);

        if (isset($pv)) {
            echo '<div class="items"><p style="color: #fc7978"><strong>pv : ' . $pv . '</strong></p></div>';
        }
    }

    /**
     * 在 cart page 商品加上 ftg_pv 顯示
     */
    function customizing_cart_item_data($item_data, $cart_item)
    {

        $pv = get_post_meta($cart_item['product_id'], '_ftg_product_pv', true);

        $item_data[] = array(
            'key'     => 'pv',
            'value'   => $pv,
            'display' => '',
        );

        return $item_data;
    }

    /**
     * 在 cart totals 加上 pv 總量
     */
    function custom_cart_total_pv()
    {

        $total_pv = 0;
        foreach (WC()->cart->get_cart() as $cart_item) {
            $product_pv = (int) get_post_meta($cart_item['product_id'], '_ftg_product_pv', true);
            $total_pv += $product_pv * $cart_item['quantity'];
        }

        if ($total_pv > 0) {

            echo ' <tr class="cart-total-pv">
            <th>' . __("pv 總計", "woocommerce") . '</th>
            <td data-title="pv 總計">
            <strong>' . number_format($total_pv) . '</strong>
            </td>
        </tr>';
        }
    }

    /**
     * 在 checkout 加上 pv 總量
     */
    function custom_checkout_total_pv()
    {
        $total_pv = 0;
        foreach (WC()->cart->get_cart() as $cart_item) {
            $product_pv = (int) get_post_meta($cart_item['product_id'], '_ftg_product_pv', true);
            $total_pv += $product_pv * $cart_item['quantity'];
        }

        if ($total_pv > 0) {

            echo ' <tr class="cart-total-pv">
            <th>' . __("pv 總計", "woocommerce") . '</th>
            <td data-title="pv 總計">
            <strong>' . number_format($total_pv) . '</strong>
            </td>
        </tr>';
        }
    }

    public function checkWoocommerceActive()
    {
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            return true;
        }
        if (is_multisite()) {
            $plugins = get_site_option('active_sitewide_plugins');
            if (isset($plugins['woocommerce/woocommerce.php']))
                return true;
        }
        return false;
    }
}
