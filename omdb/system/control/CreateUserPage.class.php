<?php

class CreateUserPage extends AbstractPage {

    private $name;
    private $password;

    protected function setUser($name, $password) {
        $sql = "INSERT INTO users(name, password) VALUES(?, ?)";
        $stmt = AppCore::getDB()->prepare($sql);
        $stmt->execute([$name, $password]);

    }
}