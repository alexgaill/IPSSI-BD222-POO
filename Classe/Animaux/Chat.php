<?php
namespace Classe\Animaux;

// require_once "Mammifere.php";
class Chat extends Mammifere
{

    public function cri(): string
    {
        return "Miaou!";
    }
}
