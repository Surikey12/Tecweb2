<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e9a4335b0409214b4c8b8e8859cad5f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyApi\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyApi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e9a4335b0409214b4c8b8e8859cad5f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e9a4335b0409214b4c8b8e8859cad5f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1e9a4335b0409214b4c8b8e8859cad5f::$classMap;

        }, null, ClassLoader::class);
    }
}
