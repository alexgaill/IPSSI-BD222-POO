<?php
namespace Core\Interface;

interface UserControllerInterface {

    public function login();

    public function signup();

    public function logout();
}