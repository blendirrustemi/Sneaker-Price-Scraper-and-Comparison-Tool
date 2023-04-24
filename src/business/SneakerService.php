<?php

class SneakerService {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSneakers() {
        return $this->db->getAllSneakers();
    }

    public function getSneakersById($id) {
        return $this->db->getSneakersById($id);
    }

    public function getSpecificSneaker($id) {
        return $this->db->getSpecificSneaker($id);
    }

    public function addSneakers($model, $image, $price) {
        return $this->db->addSneakers($model, $image, $price);
    }
}