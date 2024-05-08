<?php
class UserController
{
    public function displayProducts()
    {
        $userModel = UserModel::getInstance();
        return $userModel->getAllProducts();
    }

    public function getProductForCart()
    {
        if (isset($_SESSION['cart'])) {
            $array = $_SESSION['cart'];
            $userModel = UserModel::getInstance();
            $productIds = array_keys($array);
            $quantity = array_keys($array);
            foreach ($array as $key => $value) {
                $product[$key] = $userModel->getProductById($key);
            }
            include 'Views/cart.php';
        }
    }

    public function placeOrder($customerInfo, $deliveryAddress, $userPhone)
    {
        $userModel = UserModel::getInstance();

        $cartTotal = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $product = $userModel->getProductById($productId);
                $cartTotal += $product['price'] * $quantity;
            }
        }

        $userModel->insertOrder($customerInfo, $deliveryAddress, $userPhone, $cartTotal);

        session_unset();
        session_destroy();

        header("Location: index.php");
        exit();
    }

}
