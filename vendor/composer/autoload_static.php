<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit02a9b219a943120f25dfdda90ba2dc0c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Asus\\Epemira\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Asus\\Epemira\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit02a9b219a943120f25dfdda90ba2dc0c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit02a9b219a943120f25dfdda90ba2dc0c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit02a9b219a943120f25dfdda90ba2dc0c::$classMap;

        }, null, ClassLoader::class);
    }
}
