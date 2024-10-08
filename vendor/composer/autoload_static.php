<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb5e0df2f6a2b5cb949c94ef841aa650d
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grav\\Plugin\\ClockworkWeb\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grav\\Plugin\\ClockworkWeb\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Grav\\Plugin\\ClockworkWebPlugin' => __DIR__ . '/../..' . '/clockwork-web.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb5e0df2f6a2b5cb949c94ef841aa650d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb5e0df2f6a2b5cb949c94ef841aa650d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb5e0df2f6a2b5cb949c94ef841aa650d::$classMap;

        }, null, ClassLoader::class);
    }
}
