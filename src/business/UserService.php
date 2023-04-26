<?php

class UserService
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllUsers() {
        return $this->db->getAllUsers();
    }

    public function getUserById($id) {
        return $this->db->getUserById($id);
    }

    public function getUserByEmail($email) {
        return $this->db->getUserByEmail($email);
    }

    public function getUserByEmailAndPassword($email, $password) {
        return $this->db->getUserByEmailAndPassword($email, $password);
    }

    public function addUser($name, $surname, $email, $password) {
        return $this->db->addUser($name, $surname, $email, $password);
    }

    public function getUserRole($id) {
        return $this->db->getUserRole($id);
    }

    public function removeUser($id) {
        return $this->db->removeUser($id);
    }

    public function updateUser($id, $name, $surname, $email) {
        return $this->db->updateUser($id, $name, $surname, $email);
    }

    public function updateUserPassword($id, $password) {
        return $this->db->updateUserPassword($id, $password);
    }

}