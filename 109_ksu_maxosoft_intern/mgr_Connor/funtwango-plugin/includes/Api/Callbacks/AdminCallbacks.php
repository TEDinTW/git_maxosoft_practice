<?php
/**
 * @package FunTwanGoPlugin
 */
namespace Includes\Api\Callbacks;

class AdminCallbacks 
{
    public function adminDashboard() {
        return require_once PLUGIN_PATH . 'templates/admin.php';
    }

    public function ftgOptionsGroup( $input ) {
        return $input;
    }

    public function ftgAdminSection() {
        echo 'Check section';
    }

    public function ftgSiteID() {
        $value = esc_attr( get_option( 'site_ID' ) );
        echo '<input type="text" class="regular-text" name="site_ID" value="' . $value . '" placeholder="">';
    }

    public function ftgSiteKey() {
        $value = esc_attr( get_option( 'site_key' ) );
        echo '<input type="text" class="regular-text" name="site_key" value="' . $value . '" placeholder="">';
    }

    public function ftgSiteHash() {
        $value = esc_attr( get_option( 'site_hash' ) );
        echo '<input type="text" class="regular-text" name="site_hash" value="' . $value . '" placeholder="">';
    }


    
    
}