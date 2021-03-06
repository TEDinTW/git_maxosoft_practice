<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd569218b0f00b6bb54af8a02fa254904
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Includes\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Includes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd569218b0f00b6bb54af8a02fa254904::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd569218b0f00b6bb54af8a02fa254904::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd569218b0f00b6bb54af8a02fa254904::$classMap;

        }, null, ClassLoader::class);
    }
}
