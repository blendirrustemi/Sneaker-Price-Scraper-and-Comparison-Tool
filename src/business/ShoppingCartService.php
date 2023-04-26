<?php

class ShoppingCartService
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function getShoppingCartItems($user_id) {
        return $this->db->getShoppingCartItems($user_id);
    }

    public function addShoppingCartItem($user_id, $sneaker_id, $quantity, $size) {
        return $this->db->addShoppingCartItem($user_id, $sneaker_id, $quantity, $size);
    }


    public function removeShoppingCartItem($user_id, $sneaker_id, $size) {
        return $this->db->removeShoppingCartItem($user_id, $sneaker_id, $size);
    }

    public function addOrder($user_id, $sneakers) {
        return $this->db->addOrder($user_id, $sneakers);
    }

    public function getOrder($user_id) {
        return $this->db->getOrder($user_id);
    }

}