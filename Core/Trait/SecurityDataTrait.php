<?php
namespace Core\Trait;

/**
 * Un trait est un ensemble de propriété et de méthode que l'on va attribuer à une class.
 * La class utilisant ce trait aura donc les propriétés prop1 et prop2 ainsi que la méthode secureData
 * et pourra les utilliser comme si l'ensemble était définit dans la class (même si tout est private)
 */
trait SecurityDataTrait {

    private $prop1;

    private $prop2;

    private function secureData (array $data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }
        return $data;
    }
}