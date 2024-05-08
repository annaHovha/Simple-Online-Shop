<?php
class UserModel extends DBConnectionn
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
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertOrder($customerInfo, $deliveryAddress, $userPhone, $total)
    {

        $this->db->beginTransaction();

        $stmt = $this->db->prepare('INSERT INTO orders (customer_info, delivery_address, phone_number, order_date, total) VALUES (:customer_info, :delivery_address, :phone_number, NOW(), :total)');
        $stmt->execute([':customer_info' => $customerInfo, ':delivery_address' => $deliveryAddress, ':phone_number' => $userPhone, ':total' => $total]);

        $orderId = $this->db->lastInsertId();

        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $stmt = $this->db->prepare('INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)');
            $stmt->execute([$orderId, $productId, $quantity]);
        }

        $this->db->commit();
    }

}