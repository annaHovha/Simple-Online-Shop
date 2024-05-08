<?php

class ProductController
{

    public function getAllProducts()
    {
        $productModel = ProductModel::getInstance();
        return $productModel->getAllProducts();
    }

    public function editProduct($id)
    {
        $productModel = ProductModel::getInstance();
        $product = $productModel->getProductById($id);
        include 'Views/editProduct.php';
        return $product;
    }
    public function addProduct($name, $description, $price, $image)
    {
        $uploadDir = '../uploads/';
        $targetFile = $uploadDir . basename($_FILES['productImage']['name']);
        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFile)) {
            $productImage = $targetFile;
        } else {
            $productImage = null;
        }
        $productModel = ProductModel::getInstance();
        $productModel->addProduct($name, $description, $price, $productImage);
        header('location:index.php');
        exit();
    }

    public function updateProduct($id, $name, $description, $price, $image)
    {
        if (!empty($_FILES['productImage']['name'])) {
            $uploadDir = '../uploads/';
            $targetFile = $uploadDir . basename($_FILES['productImage']['name']);
            if (move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFile)) {
                $image = $targetFile;
            } else {
                echo 'Sorry there was an error uploading your file.';
            }
        } elseif (empty($_FILES['productImage']['name']) && empty($image)) {
            $productModel = ProductModel::getInstance();
            $existingProduct = $productModel->getProductById($id);
            $image = $existingProduct['image_path'];
        }

        $productModel = ProductModel::getInstance();
        $productModel->updateProduct($id, $name, $description, $price, $image);

        header('location:index.php');
        exit();
    }

    public function deleteProduct($id)
    {
        $productModel = ProductModel::getInstance();
        $productModel->deleteProduct($id);
        header('location:index.php');
        exit();
    }

    public function getAllOrders()
    {
        $productModel = ProductModel::getInstance();
        $orders = $productModel->getAllOrders();
        include 'Views/ordersView.php';
    }

}