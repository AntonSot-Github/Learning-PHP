<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbb71d058d1fcc2acf7533603bb167263
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitbb71d058d1fcc2acf7533603bb167263', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbb71d058d1fcc2acf7533603bb167263', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbb71d058d1fcc2acf7533603bb167263::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
