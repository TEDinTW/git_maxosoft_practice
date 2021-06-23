<?php
/**
 * @package FunTwanGoPlugin
 */
namespace Includes\Base;

class Enqueue
{
    public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        // enqueue all our scripts
        wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . '/assets/mystyle.css' );
        
        wp_enqueue_script( 'mypluginscript', PLUGIN_URL . '/assets/myscript.js' );
        wp_localize_script('mypluginscript', 'ajax_var', array(
            'nonce' => wp_create_nonce('ajax-nonce')
        ));

    }
}