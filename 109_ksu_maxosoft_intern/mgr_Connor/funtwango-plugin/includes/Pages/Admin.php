<?php

/**
 * @package FunTwanGoPlugin
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Api\Callbacks\AdminCallbacks;

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

    }

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
