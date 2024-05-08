<?php

session_start();

require_once 'DBConnectionn.php';
require_once 'Controllers/UserController.php';
require_once 'Models/UserModel.php';


$action = $_GET['action'] ?? Null;
switch ($action) {
    case 'cart':
        $userController = new UserController();
        $userController->getProductForCart();
        break;
    case 'placeOrder':
        $userController = new UserController();
        $userController->placeOrder($_POST['customerInfo'] , $_POST['deliveryAddress'], $_POST['userPhone']);
        break;
    default:
        $userController = new UserController();
        $products = $userController->displayProducts();
        require_once 'Views/UserView.php';
}
