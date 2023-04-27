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

    public function getSneakersbyModel($model) {
        return $this->db->getSneakersbyModel($model);
    }

    public function getSpecificSneaker($id) {
        return $this->db->getSpecificSneaker($id);
    }

    public function addSneakers($model, $image, $price) {
        return $this->db->addSneakers($model, $image, $price);
    }

    public function removeSneakers($id) {
        return $this->db->removeSneakers($id);
    }

    public function searchSneakers($search) {
        return $this->db->searchSneakers($search);
    }
}