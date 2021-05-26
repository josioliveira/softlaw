<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit187a8f1df449d331c8f51879e3d9211f
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit187a8f1df449d331c8f51879e3d9211f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit187a8f1df449d331c8f51879e3d9211f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit187a8f1df449d331c8f51879e3d9211f::$classMap;

        }, null, ClassLoader::class);
    }
}