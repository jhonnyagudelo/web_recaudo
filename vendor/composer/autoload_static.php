<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3178ffa7db174a640c2317c00fd84d26
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3178ffa7db174a640c2317c00fd84d26::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3178ffa7db174a640c2317c00fd84d26::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
