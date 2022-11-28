<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit822dafff77f8d4e1de447fd77559ff3d
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'vendor\\' => 7,
        ),
        't' => 
        array (
            'twig\\' => 5,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'vendor\\' => 
        array (
            0 => 'C:\\xampp\\htdocs\\blogSP.blog\\vendor',
        ),
        'twig\\' => 
        array (
            0 => __DIR__ . '/../..' . '/twig',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit822dafff77f8d4e1de447fd77559ff3d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit822dafff77f8d4e1de447fd77559ff3d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit822dafff77f8d4e1de447fd77559ff3d::$classMap;

        }, null, ClassLoader::class);
    }
}
