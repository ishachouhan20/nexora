<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getCategory() {
        return $this->db->query("SELECT * FROM categories")->fetchAll();
    }

    public function getProducts(){
        return $this->db->query("SELECT * FROM products")->fetchAll();
    }

    public function create($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO students (name,email,class) VALUES (?,?,?)"
        );
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['class']
        ]);
    }
}

