<?php

/**
 * Plugin Name: WooCommerce-FunTwanGo
 * Plugin URI: 
 * Description: This is WooCommerce used by FTG.
 * Version: 1.0.0
 * Author: Connor
 * Author URI: 
 * License: GPLv2 or later
 * Text Domain: rvps
 */

// Make sure we dont expose any info if called directly

if ( !function_exists('add_action')) {
    echo 'Not allowed to call directly';
    exit;
}

/*=====================
Check wordpress version
========================*/
if (version_compare(get_bloginfo('version'), '4.0', '<')) {
    $message = 'Need Wordpress version 4.0 or higher';
    die($message);
}

/********
 CONTANTS
 ********/
define('WFTG_PATH', plugin_dir_path( __FILE__ ));
define('WFTG_URI', plugin_dir_url( __FILE__ ));

/***************************************
 Check if Woocommerce is activate or not
 ***************************************/
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    // Put your plugin code here
    if (class_exists('WFTG_core')) {
        class WFTG_core {
            public function __construct()
            {
                //
            }
        }
        $WFTG_core = new WFTG_core();
    }
}

/**==========
 * front-page
 *===========/
/**
 * 在 shop page 商品項目加上 ftg_pv 顯示
 */

add_action('woocommerce_after_shop_loop_item_title', 'custom_shop_product_pv', 5, 2);

function custom_shop_product_pv()
{
    global $product;
    $pv = get_post_meta( $product->get_id(), '_ftg_product_pv', true);

    if (isset($pv)) {
        echo '<div class="items"><p><strong> test </strong></p></div>';
        echo '<div class="items"><p><strong>pv : ' . $pv . '</strong></p></div>';
        echo '<div class="items"><p><strong> test </strong></p></div>';
    }
}
/**
 * 在 product page 商品介紹加上 ftg_pv 顯示
 * color: #fc7978
 */
add_action('woocommerce_single_product_summary', 'custom_product_product_pv', 15);

function custom_product_product_pv()
{
    global $product;
    $pv = get_post_meta( $product->get_id(), '_ftg_product_pv', true);

    if (isset($pv)) {
        echo '<div class="items"><p style="color: #fc7978"><strong>pv : ' . $pv . '</strong></p></div>';
    }

}

/**
 * 在 cart page 商品加上 ftg_pv 顯示
 */
add_filter('woocommerce_get_item_data', 'customizing_cart_item_data', 10, 2);
function customizing_cart_item_data($item_data, $cart_item) {
    
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
add_action('woocommerce_cart_totals_before_shipping', 'custom_cart_total_pv', 10, 0);
function custom_cart_total_pv() {

    $total_pv = 0;
    foreach(WC()->cart->get_cart() as $cart_item) {
        $product_pv = (int) get_post_meta($cart_item['product_id'], '_ftg_product_pv', true);
        $total_pv += $product_pv * $cart_item['quantity'];
    }

    if ($total_pv > 0) {
        
        echo ' <tr class="cart-total-pv">
            <th>' . __( "pv 總計", "woocommerce" ) . '</th>
            <td data-title="pv 總計">
            <strong>' . number_format($total_pv) . '</strong>
            </td>
        </tr>';
    }
}

/**
 * 在 checkout 加上 pv 總量
 */
add_action('woocommerce_review_order_before_shipping', 'custom_checkout_total_pv', 10, 0);
function custom_checkout_total_pv() {
    $total_pv = 0;
    foreach(WC()->cart->get_cart() as $cart_item) {
        $product_pv = (int) get_post_meta($cart_item['product_id'], '_ftg_product_pv', true);
        $total_pv += $product_pv * $cart_item['quantity'];


    if ($total_pv > 0) {
        
        echo ' <tr class="cart-total-pv">
            <th>' . __( "pv 總計", "woocommerce" ) . '</th>
            <td data-title="pv 總計">
            <strong>' . number_format($total_pv) . '</strong>
            </td>
        </tr>';
        }
    }

}


/**
 * 在edit order的total加上 pv總量
 */
add_action('woocommerce_admin_order_totals_after_tax', 'custom_admin_order_totals_after_tax', 10, 0 );
function custom_admin_order_totals_after_tax( ) {
        global $the_order;
        $order = new WC_Order( $order_id );
        $items = $order->get_items(); 
        $label = __( 'pv 總量', 'woocommerce' );   
        $total_pv = 0;
        print_r($order);
            foreach($order as $order_item){
                $product_pv = (int) get_post_meta($order_item['product_id'], '_ftg_product_pv', true);
                $total_pv += $product_pv * $order_item['quantity'];
            }
            ?>
            <tr>
                <td class="label"><?php echo $label; ?>:</td>
                <td width="1%"></td>
                <td class="custom-total"><?php echo $total_pv; ?></td>
            </tr>
        <?php
        
}
/**
 * 在orders 加上pv 總量
 */
/**
 * 於頁面中新增一列並設定其內容及變數
 **/ 
    add_filter( 'manage_edit-shop_order_columns', 'misha_order_items_column' );
    function misha_order_items_column ($order_columns ) {
        $order_columns['order_products'] = 'pv';
        return $order_columns;
    }
/**
 *設定各條訂單pv總量資料抓取
 */
    add_action( 'manage_shop_order_posts_custom_column', 'misha_order_items_column_cnt');

    function misha_order_items_column_cnt($colname) { 
        global $the_order;
    
        if ( $colname == 'order_products') {

            $order_items = $the_order->get_items();
            $total_pv = 0;
            if (!is_wp_error($order_items)){
                foreach($order_items as $order_item){

                    $product_pv = (int) get_post_meta($order_item['product_id'], '_ftg_product_pv', true);
                    $total_pv += $product_pv * $order_item['quantity'];
                }
        }
            echo $total_pv;       
    }

}
/**
 * 送出訂單至泛團購
 */
add_action('woocommerce_payment_complete', 'payment_complete');
function payment_complete($order_id) {
    $order = wc_get_order($order_id);
    $user = $order -> get_user();
    if ($user) {
        # code...
    }
}






/**==========
 * back-page
 *===========/
/**
 * 
 */

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
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

    //Custom Product Number Field
    // woocommerce_wp_text_input(
    //     array(
    //         'id' => '_custom_product_number_field',
    //         'placeholder' => 'Custom Product Number Field',
    //         'label' => __('Custom Product Number Field', 'woocommerce'),
    //         'type' => 'number',
    //         'custom_attributes' => array(
    //             'step' => 'any',
    //             'min' => '0'
    //         )
    //     )
    // );

    //Custom Product  Textarea
    // woocommerce_wp_textarea_input(
    //     array(
    //         'id' => '_custom_product_textarea',
    //         'placeholder' => 'Custom Product Textarea',
    //         'label' => __('Custom Product Textarea', 'woocommerce')
    //     )
    // );

    echo '</div>';
}
    
function woocommerce_product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $woocommerce_ftg_product_pv = $_POST['_ftg_product_pv'];
    if (!empty($woocommerce_ftg_product_pv)) {
        update_post_meta($post_id, '_ftg_product_pv', esc_attr($woocommerce_ftg_product_pv));
    }
// Custom Product Number Field
    // $woocommerce_custom_product_number_field = $_POST['_custom_product_number_field'];
    // if (!empty($woocommerce_custom_product_number_field))
    //     update_post_meta($post_id, '_custom_product_number_field', esc_attr($woocommerce_custom_product_number_field));
// Custom Product Textarea Field
    // $woocommerce_custom_procut_textarea = $_POST['_custom_product_textarea'];
    // if (!empty($woocommerce_custom_procut_textarea))
    //     update_post_meta($post_id, '_custom_product_textarea', esc_html($woocommerce_custom_procut_textarea));
}



/**
 * 測試簡易 plugin
 */

function ideapro_example_function()
{
    $content = "This is simple plugin.";
    return $content;
}
add_shortcode('example', 'ideapro_example_function');