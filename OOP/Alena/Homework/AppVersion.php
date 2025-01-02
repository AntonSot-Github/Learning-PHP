<?php

class AppVersion 
{
    public static $version = "";

    public static function getVersion()
    {
        return self::$version;
    }

    public static function updateVersion($data)
    {
        self::$version = $data;
    }
}

AppVersion::updateVersion("Version: 2.07.08");
echo AppVersion::getVersion(), "\n";

AppVersion::updateVersion("Version: 3.43.09");
echo AppVersion::getVersion(), "\n";

AppVersion::updateVersion("Version: 4.55.77");
echo AppVersion::getVersion(), "\n";


