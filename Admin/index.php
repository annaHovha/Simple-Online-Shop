<?php
session_start();

require_once 'DBConnection.php';
require_once 'Controllers/ProductController.php';
require_once 'Models/ProductModel.php';


$action = $_GET['action'] ?? null;

switch ($action) {
    case 'editProduct':
        $productController = new ProductController();
        $productController->editProduct($_GET['id']);
        break;
    case 'addProduct':
        $productController = new ProductController();
        $productController->addProduct($_POST['productName'], $_POST['productDesc'], $_POST['productPrice'], $_POST['productImage']);
        break;
    case 'updateProduct':
        $productController = new ProductController();
        $productController->updateProduct($_POST['id'], $_POST['productName'], $_POST['productDesc'], $_POST['productPrice'], $_POST['productImage']);
        break;
    case 'deleteProduct':
        $productController = new ProductController();
        $productController->deleteProduct($_GET['id']);
        break;
    case 'getOrders':
        $productController = new ProductController();
        $productController->getAllOrders();
        break;
    default:
        $productController = new ProductController();
        $products = $productController->getAllProducts();
        require_once 'Views/adminView.php';
        break;
}

