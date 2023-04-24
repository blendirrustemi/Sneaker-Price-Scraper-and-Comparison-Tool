<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database_name = 'SneakerStyleX';
    private $conn;
    private static $instance = null;

    public static function getInstance($host=null, $username=null, $password=null, $dbname=null) {
        if (self::$instance == null) {
            self::$instance = new self($host, $username, $password, $dbname);
        }

        return self::$instance;
    }

    public function query($sql, $params = []) {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing query: " . $this->conn->error);
        }

        if (count($params) > 0) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Error executing query: " . $this->conn->error);
        }

        return $result;
    }

    //Sneakers table functions
    public function getAllSneakers(){
        $result = $this->query("SELECT * FROM sneakers");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSneakersById($id) {
        $result = $this->query("SELECT * FROM sneakers WHERE sneaker_id = ?", [$id]);
        return $result->fetch_assoc();
    }

    public function getSpecificSneaker($id) {
        $result = $this->query("SELECT sizes.name FROM sneakers JOIN sneaker_sizes ON sneakers.sneaker_id = sneaker_sizes.sneaker_id JOIN sizes ON sneaker_sizes.size_id = sizes.size_id WHERE sneakers.sneaker_id = ?", [$id]);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addSneakers($model, $image, $price){
        $stmt = $this->query("INSERT INTO sneakers (model, image, price) VALUES (?, ?, ?)", [$model, $image, $price]);
        $id = $this->conn->insert_id;
        $stmt->close();

        return $id;
    }


}