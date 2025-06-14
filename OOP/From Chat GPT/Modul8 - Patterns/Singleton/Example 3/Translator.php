<?php

class Translator
{
    private static ?Translator $instance = null;
    private array $translations = [];
    private string $currentLanguage = 'en';

    public function __construct()
    {}

    public static function getInstance(): Translator
    {
        if(self::$instance === null){
            self::$instance = new Translator();
        }
        return self::$instance;
    }

    public function setLang(string $lang): void
    {
        $this->
    }
}