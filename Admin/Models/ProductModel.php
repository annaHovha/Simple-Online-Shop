<?php

class ProductModel extends DBConnection
{
    public static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function getAllProducts()
    {
        $stmt = $this->db->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addProduct($name, $description, $price, $image)
    {
        $stmt = $this->db->prepare('INSERT INTO products (name, description, price, image_path) VALUES (:name, :description, :price, :image)');
        $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'image' => $image]);
    }

    public function updateProduct($id, $name, $description, $price, $image)
    {
        $stmt = $this->db->prepare('UPDATE products SET name=:name, description=:description, price=:price, image_path=:image_path WHERE id=:id');
        $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'image_path' => $image, 'id' => $id]);
    }

    public function deleteProduct($id)
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function getAllOrders()
    {
        $stmt = $this->db->query('SELECT * FROM orders');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}