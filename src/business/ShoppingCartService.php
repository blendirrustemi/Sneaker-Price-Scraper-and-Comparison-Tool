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


}