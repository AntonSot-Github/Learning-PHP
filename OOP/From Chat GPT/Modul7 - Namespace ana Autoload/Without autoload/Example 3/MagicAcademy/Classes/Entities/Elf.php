<?php

namespace Classes\Entities;

require_once __DIR__ . "/Wizard.php";
require_once __DIR__ . "/../../Classes/Config/Constants.php";
require_once __DIR__ . "/../../Classes/Helpers/SpellBook.php";
require_once __DIR__ . "/../../Classes/Traits/MagicLogger.php";
require_once __DIR__ . "/../../Classes/Interfaces/SpellCaster.php";

use Classes\Entities\Wizard;
use Classes\Helpers\SpellBook;
use Classes\Interfaces\SpellCaster;
use Classes\Config\Constants;
use Classes\Traits\MagicLogger;

class Elf extends Wizard implements SpellCaster
{
    use MagicLogger;

    //public string $spell;

    public function __construct($name, $mana = Constants::DEFAULT_MANA)
    {
        parent::__construct($name, $mana);
        //$this->spell = $spell;
    }

    public function getTitle(): string
    {
        return "Forest Elf";
    }


    public function castSpell(string $spell): void
    {
        $this->mana = $this->mana * 0;
        $this->log("{$this->getTitle()} {$this->getName()} casts $spell");
        echo SpellBook::describeSpell($spell);
    }
}