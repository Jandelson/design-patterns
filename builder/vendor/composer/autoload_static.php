<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5aacd4b392b2b3525564ec4312cefa8
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jandelson\\Builder\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jandelson\\Builder\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5aacd4b392b2b3525564ec4312cefa8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5aacd4b392b2b3525564ec4312cefa8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc5aacd4b392b2b3525564ec4312cefa8::$classMap;

        }, null, ClassLoader::class);
    }
}
