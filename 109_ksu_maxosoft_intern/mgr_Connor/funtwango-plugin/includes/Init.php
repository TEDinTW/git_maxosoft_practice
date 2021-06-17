<?php
/**
 * @package FunTwanGoPlugin
 */
namespace Includes;

final class Init 
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services() 
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Classes\WooFrontend::class,
            Classes\WooBackend::class,
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     */
    public static function register_services() {
        foreach ( self::get_services() as $class ) {
            // $service = new $class();
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    private static function instantiate( $class ) {
        $service = new $class();

        return $service;
    }

}