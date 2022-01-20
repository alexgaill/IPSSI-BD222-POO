<?php
namespace Core\Interface;

/**
 * Une interface est comme une class qui ne possède que des méthodes abstract. Elle permet de définir un schéma à respecter pour nos class
 * Une interface ne s'"extends" pas sur une class mais elle s'"implements"
 * 
 * Une class peut implémenter plusieurs interfaces
 * Une interface extends une autre interface
 */
interface UserInterface{

    /**
     * Retourne le password de l'utilisateur
     *
     * @return string
     */
    public function getPassword():string;

    /**
     * Retourne les rôles de l'utilisateur
     *
     * @return array
     */
    public function getRoles(): array;
}