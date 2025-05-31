<?php

require_once __DIR__ . "/Classes/Entities/Elf.php";

use Classes\Entities\Elf;

$elf = new Elf("Lorian");

$elf->castSpell("fireball");
$elf->castSpell("freeze food");