<?php

namespace Classes\Helpers;

class SpellBook
{

    static function describeSpell(string $spell): string
    {
        $spellBook = [
        "fireball" => "Shoots a fiery projectile",
        "freeze food" => "Freezing some food",
        "magic answer" => "ChatGPT works again :)",
        ];

        foreach($spellBook as $spellFromBook => $describe){
            if($spell === $spellFromBook){
                return (string)$describe . PHP_EOL;
            }
        }
        return (string)$spell . "is unknown" . PHP_EOL;
    }

}
