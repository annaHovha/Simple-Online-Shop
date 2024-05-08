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
        $userController->placeOrder();
        break;
    default:
        $userController = new UserController();
        $userController->displayProducts();
        break;
}
