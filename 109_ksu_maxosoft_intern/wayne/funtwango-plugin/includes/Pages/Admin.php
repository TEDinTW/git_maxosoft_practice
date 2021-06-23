<?php

/**
 * @package FunTwanGoPlugin
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Api\Callbacks\AdminCallbacks;
$host = 'localhost';
$dbuser ='root';
$dbpassword = 'root1234';
$dbname = 'ksu_wordpress';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

class Admin
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        // $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->addSubPages($this->subpages)->register();

        add_action('wp_ajax_nopriv_post_site_data', array( $this, 'post_site_data') );
        add_action('wp_ajax_post_site_data', array( $this, 'post_site_data') );
    }

    function post_site_data() {
        $site_ID = get_option('site_ID', '');
        $site_key = get_option('site_key', '');
        $site_hash = get_option('site_hash', '');

        if ($site_ID === '' || $site_key === '' || $site_hash ===''){
            wp_die('', 'data is null');
        }

        $url = "http://dev.funtwango.com/api/v1/for_connor_echo";

        $args = array(
            'headers' => array(),
            'body' => array(
                'web_name' => 'FTG',
                'site_ID' => $site_ID,
                'site_key' => $site_key,
                'site_hash' => $site_hash,
                'code' => array(
                    'site_ID' => $site_ID,
                    'site_key' => $site_key,
                    'site_hash' => $site_hash,
                ),

            ),
        );
        $response = wp_remote_post($url, $args);
    
        // print_r($response);
    
        $response_code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);

        // print_r($response_code);
        // print_r($body);
    
        if ( 401 === $response_code ) {
            return "Unauthorized access";
        }
        if ( 200 !== $response_code ) {
            return "Error in pinging API";
        }
        if ( 200 === $response_code ) {
            echo $body;
        }
    
        die();
    }




    /**
     * Set Pages
     */
    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'FTG Plugin',
                'menu_title' => 'FTG',
                'capability' => 'manage_options',
                'menu_slug' => 'ftg_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 1
            )
        );
    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'ftg_plugin',
                'page_title' => 'Dashboards',
                'menu_title' => 'Dashboard',
                'capability' => 'manage_options',
                'menu_slug' => 'ftg_dashboard',
                'callback' => function () {
                    echo '<h1>Dashboard Test</h1>';
                }
            )
        );
    }

    public function setSettings()
    {

        $args = array(
            array(
                'option_group' => 'ftg_options_group',
                'option_name' => 'site_ID',
                'callback' => array($this->callbacks, 'ftgOptionsGroup')
            ),
            array(
                'option_group' => 'ftg_options_group',
                'option_name' => 'site_key'
            ),
            array(
                'option_group' => 'ftg_options_group',
                'option_name' => 'site_hash'
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {

        $args = array(
            array(
                'id' => 'ftg_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'ftgAdminSection'),
                'page' => 'ftg_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {

        $args = array(
            array(
                'id' => 'site_ID',
                'title' => 'Site ID',
                'callback' => array($this->callbacks, 'ftgSiteID'),
                'page' => 'ftg_plugin',
                'section' => 'ftg_admin_index',
                'args' => array(
                    'label_for' => 'site_ID',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'site_key',
                'title' => 'Site Key',
                'callback' => array($this->callbacks, 'ftgSiteKey'),
                'page' => 'ftg_plugin',
                'section' => 'ftg_admin_index',
                'args' => array(
                    'label_for' => 'site_key',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'site_hash',
                'title' => 'Site Hash',
                'callback' => array($this->callbacks, 'ftgSiteHash'),
                'page' => 'ftg_plugin',
                'section' => 'ftg_admin_index',
                'args' => array(
                    'label_for' => 'site_hash',
                    'class' => 'example-class'
                )
            )
        );

        $this->settings->setFields($args);
    }
}
