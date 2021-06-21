<?php

/**
 * @package FunTwanGoPlugin
 */

namespace Includes\Classes;

use WC_Order;

class WooBackend
{
    public function register()
    {

        // check woocommerce is active
        if (!$this->checkWoocommerceActive()) {
            return;
        }

        // shop-order
        add_filter('manage_edit-shop_order_columns', array($this, 'ftg_order_items_column'));

        add_action('manage_shop_order_posts_custom_column', array($this, 'ftg_order_items_column_cnt'));

        // Display Fields
        add_action('woocommerce_product_options_general_product_data', array($this, 'woocommerce_product_custom_fields'));
        // Save Fields
        add_action('woocommerce_process_product_meta', array($this, 'woocommerce_product_custom_fields_save'));
    }


    /**
     * shop-order
     */
    function ftg_order_items_column($order_columns)
    {
        $order_columns['order_products'] = "pv";
        return $order_columns;
    }

    function ftg_order_items_column_cnt($colname)
    {
        global $the_order; // you can use the global WP_Order object here
        // global $post; // is also available here

        if ($colname == 'order_products') {

            // do stuff, ex: get_post_meta( $post->ID, 'key', true );
            $order_items = $the_order->get_items();

            $total_pv = 0;

            if (!is_wp_error($order_items)) {
                foreach ($order_items as $order_item) {

                    $product_pv = (int) get_post_meta($order_item['product_id'], '_ftg_product_pv', true);
                    $total_pv += $product_pv * $order_item['quantity'];
                }
            }

            echo $total_pv;
        }
    }

    /**
     * 在商品編輯頁面顯示 pv textfield
     */
    function woocommerce_product_custom_fields()
    {
        global $woocommerce, $post;
        echo '<div class="product_custom_field">';
        // Custom Product Text Field
        woocommerce_wp_text_input(
            array(
                'id' => '_ftg_product_pv',
                'placeholder' => '',
                'label' => __('pv', 'woocommerce'),
                'desc_tip' => 'true'
            )
        );

        echo '</div>';
    }

    function woocommerce_product_custom_fields_save($post_id)
    {
        // Custom Product Text Field
        $woocommerce_ftg_product_pv = $_POST['_ftg_product_pv'];
        if (!empty($woocommerce_ftg_product_pv)) {
            update_post_meta($post_id, '_ftg_product_pv', esc_attr($woocommerce_ftg_product_pv));
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
