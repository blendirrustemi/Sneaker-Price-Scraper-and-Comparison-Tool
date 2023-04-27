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

    // Sneakers table functions ------------------------------------------------------
    public function getAllSneakers(){
        $result = $this->query("SELECT * FROM sneakers");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSneakersById($id) {
        $result = $this->query("SELECT * FROM sneakers WHERE sneaker_id = ?", [$id]);
        return $result->fetch_assoc();
    }

    public function getSneakersbyModel($model) {
        $result = $this->query("SELECT * FROM sneakers WHERE model = ?", [$model]);
        return $result->fetch_assoc();
    }

    public function getSpecificSneaker($id) {
        $result = $this->query("SELECT sizes.name FROM sneakers JOIN sneaker_sizes ON sneakers.sneaker_id = sneaker_sizes.sneaker_id JOIN sizes ON sneaker_sizes.size_id = sizes.size_id WHERE sneakers.sneaker_id = ?", [$id]);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addSneakers($model, $image, $price) {
        $stmt = $this->conn->prepare("INSERT INTO sneakers (model, image, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $model, $image, $price);
        $stmt->execute();
        $id = $this->conn->insert_id;

        return $id;
    }

    public function searchSneakers($search) {
        $query = "SELECT * FROM sneakers WHERE model LIKE '%".$search."%'";
        $result = $this->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function removeSneakers($id) {
        $this->conn->query("SET FOREIGN_KEY_CHECKS = 0"); // Disable foreign key checks

        $stmt1 = $this->conn->prepare("DELETE FROM sneakers WHERE sneaker_id = ?");
        $stmt1->bind_param("i", $id);
        $stmt1->execute();

        $stmt2 = $this->conn->prepare("DELETE FROM sneaker_sizes WHERE sneaker_id = ?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();

        $stmt3 = $this->conn->prepare("
        DELETE cart_items, shopping_carts
        FROM cart_items
        INNER JOIN shopping_carts ON cart_items.cart_id = shopping_carts.cart_id
        WHERE cart_items.sneaker_id = ?
    ");
        $stmt3->bind_param("i", $id);
        $stmt3->execute();

        $this->conn->query("SET FOREIGN_KEY_CHECKS = 1"); // Enable foreign key checks

    }


    // Users table functions ------------------------------------------------------
    public function getAllUsers(){
        $result = $this->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $result = $this->query("SELECT * FROM users WHERE user_id = ?", [$id]);
        return $result->fetch_assoc();
    }

    public function getUserByEmail($email) {
        $result = $this->query("SELECT * FROM users WHERE email = ?", [$email]);
        return $result->fetch_assoc();
    }

    public function getUserByEmailAndPassword($email, $password) {
        $result = $this->query("SELECT * FROM users WHERE email = ? AND password = ?", [$email, $password]);
        return $result->fetch_assoc();
    }

    public function addUser($name, $surname, $email, $password) {
        // Insert user
        $sql = "INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $surname, $email, $password);
        $stmt->execute();

        // Get the new user's ID
        $user_id = $stmt->insert_id;

        // Insert default user_role record
        $default_role_id = 1; // 1 for User role, 2 for Admin role
        $sql = "INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $default_role_id);
        $stmt->execute();

        return $user_id;
    }

    public function getUserRole($id) {
        $result = $this->query("SELECT u.user_id, r.name AS role_name 
        FROM users u 
        JOIN user_roles ur ON u.user_id = ur.user_id 
        JOIN roles r ON ur.role_id = r.role_id 
        WHERE u.user_id = ?", [$id]);
        return $result->fetch_assoc();
    }

    public function removeUser($user_id) {
        $this->conn->query("SET FOREIGN_KEY_CHECKS = 0"); // Disable foreign key checks

        $stmt1 = $this->conn->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt2 = $this->conn->prepare("DELETE FROM cart_items WHERE cart_id IN (SELECT cart_id FROM shopping_carts WHERE user_id = ?)");
        $stmt3 = $this->conn->prepare("DELETE FROM shopping_carts WHERE user_id = ?");
        $stmt4 = $this->conn->prepare("DELETE FROM user_roles WHERE user_id = ?");

// Bind the parameter to each statement
        $stmt1->bind_param("i", $user_id);
        $stmt2->bind_param("i", $user_id);
        $stmt3->bind_param("i", $user_id);
        $stmt4->bind_param("i", $user_id);

// Execute the statements
        $stmt1->execute();
        $stmt2->execute();
        $stmt3->execute();
        $stmt4->execute();

        $this->conn->query("SET FOREIGN_KEY_CHECKS = 1");
    }

    public function updateUser($user_id, $name, $surname, $email) {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, surname = ?, email = ? WHERE user_id = ?");
        $stmt->bind_param("sssi", $name, $surname, $email, $user_id);
        $stmt->execute();
    }

    public function updateUserPassword($user_id, $password) {
        $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $stmt->bind_param("si", $password, $user_id);
        $stmt->execute();
    }





    // Shopping cart table functions ------------------------------------------------------
    public function getShoppingCartItems($userId) {
        $sql = "SELECT ci.cart_id, ci.sneaker_id, ci.quantity, ci.size, s.model, s.price, s.image FROM cart_items ci
            JOIN shopping_carts sc ON ci.cart_id = sc.cart_id
            JOIN sneakers s ON ci.sneaker_id = s.sneaker_id
            WHERE sc.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $cartItems = array();
        while ($row = $result->fetch_assoc()) {
            array_push($cartItems, $row);
        }

        return $cartItems;
    }


    public function addShoppingCartItem($userId, $sneakerId, $quantity, $size) {
        try {
//       If user does not have an active shopping cart, create a new one
                $sql = "INSERT INTO shopping_carts (user_id) VALUES (?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $cartId = $stmt->insert_id;
//            }

            // Check if the same sneaker is already in the shopping cart
            $sql = "SELECT * FROM cart_items WHERE sneaker_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $sneakerId);
            $stmt->execute();
            $result = $stmt->get_result();
            $sameSneakerExists = false;
            while($row = $result->fetch_assoc()) {
                if ($row['size'] == $size) {
                    // If the same sneaker and size is already in the shopping cart, update the quantity
                    $newQuantity = $row['quantity'] + $quantity;
                    $sql = "UPDATE cart_items SET quantity = ? WHERE sneaker_id = ? AND size = ?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("iid", $newQuantity, $sneakerId, $size);
                    $stmt->execute();
                    return $row['id'];
                } else {
                    // If the sneaker is in the cart but with a different size
                    $sameSneakerExists = true;
                }
            }

            if ($sameSneakerExists) {
                // If the sneaker is already in the shopping cart with a different size, add a new item
                $sql = "INSERT INTO cart_items (cart_id, sneaker_id, quantity, size) VALUES (?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("iiid", $cartId, $sneakerId, $quantity, $size);
                $stmt->execute();
                return $stmt->insert_id;
            } else {
                // If the sneaker is not in the shopping cart, add a new item
                $sql = "INSERT INTO cart_items (cart_id, sneaker_id, quantity, size) VALUES (?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("iiid", $cartId, $sneakerId, $quantity, $size);
                $stmt->execute();
                return $stmt->insert_id;
            }
        } catch (Exception $e) {
            // Handle database errors here
            echo "Error: " . $e->getMessage();
            return false;
        }
    }



    public function removeShoppingCartItem($userId, $sneakerId, $size) {
        try {
            // Get the current quantity of the sneaker in the shopping cart
            $sql = "SELECT * FROM cart_items WHERE sneaker_id = ? AND size = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("id", $sneakerId, $size);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $newQuantity = $row['quantity'] - 1;
                if ($newQuantity == 0) {
                    // If new quantity is 0, remove the item from the shopping cart
                    $sql = "DELETE FROM cart_items WHERE sneaker_id = ? AND size = ?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("id", $sneakerId, $size);
                    $stmt->execute();
                } else {
                    // If new quantity is not 0, update the quantity in the shopping cart
                    $sql = "UPDATE cart_items SET quantity = ? WHERE sneaker_id = ? AND size = ?";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bind_param("iid", $newQuantity, $sneakerId, $size);
                    $stmt->execute();
                }
            } else {
                // Sneaker is not in the shopping cart
                return false;
            }

            return true;
        } catch (Exception $e) {
            // Handle database errors here
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function addOrder($userId, $sneakers) {
        // Prepare the INSERT statement for the orders table
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, order_date) VALUES (?, CURRENT_TIMESTAMP)");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        // Get the generated order_id
        $order_id = $this->conn->insert_id;

        // Prepare the INSERT statement for the order_items table
        $stmt = $this->conn->prepare("INSERT INTO order_items (order_id, sneaker_id, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)");

        // Insert each sneaker into the order_items table
        foreach ($sneakers as $sneaker) {
            $sneaker_id = $sneaker['sneaker_id'];
            $quantity = $sneaker['quantity'];
            $stmt->bind_param("iii", $order_id, $sneaker_id, $quantity);
            $stmt->execute();
        }

        $deleteCartItemsQuery = "DELETE FROM cart_items WHERE cart_id IN (SELECT cart_id FROM shopping_carts WHERE user_id = ?)";
        $deleteCartQuery = "DELETE FROM shopping_carts WHERE user_id = ?";

        $stmt = $this->conn->prepare($deleteCartItemsQuery);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();

        $stmt = $this->conn->prepare($deleteCartQuery);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $stmt->close();

    }

    public function getOrder($userId) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $order = $result->fetch_assoc();
        return $order;
    }




}