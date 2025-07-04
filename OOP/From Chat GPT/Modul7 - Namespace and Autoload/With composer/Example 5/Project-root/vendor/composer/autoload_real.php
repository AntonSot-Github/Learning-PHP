<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfa467b65b3607dcb8862924c0bf8f315
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

        spl_autoload_register(array('ComposerAutoloaderInitfa467b65b3607dcb8862924c0bf8f315', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfa467b65b3607dcb8862924c0bf8f315', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfa467b65b3607dcb8862924c0bf8f315::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
