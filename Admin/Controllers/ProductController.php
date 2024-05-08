<?php

class ProductController
{

    public function getAllProducts()
    {
        $productModel = ProductModel::getInstance();
        $products = $productModel->getAllProducts();
        include 'Views/adminView.php';
    }

    public function editProduct($id)
    {
        $productModel = ProductModel::getInstance();
        $product = $productModel->getProductById($id);
        include 'Views/editProduct.php';
        return $product;
    }
    public function addProduct() {
        $name = $_POST['productName'] ?? null;
        $description = $_POST['productDesc'] ?? null;
        $price = $_POST['productPrice'] ?? null;

        $uploadDir = '../uploads/';
        $targetFile = $uploadDir . basename($_FILES['productImage']['name']);

        if (!empty($_FILES['productImage']['tmp_name'])) {
            if (move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFile)) {
                $productImage = $targetFile;
            } else {
                $productImage = null;
            }
        } else {
            $productImage = null;
        }

        $productModel = ProductModel::getInstance();
        $productModel->addProduct($name, $description, $price, $productImage);

        header('Location: index.php');
        exit();
    }


    public function updateProduct() {
        $id = $_POST['id'] ?? null;
        $name = $_POST['productName'] ?? null;
        $description = $_POST['productDesc'] ?? null;
        $price = $_POST['productPrice'] ?? null;
        $image = $_POST['productImage'] ?? null;

        // Check if a new image file is uploaded
        if (!empty($_FILES['productImage']['name'])) {
            $uploadDir = '../uploads/';
            $targetFile = $uploadDir . basename($_FILES['productImage']['name']);

            // Try to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFile)) {
                $image = $targetFile;
            } else {
                echo 'Sorry, there was an error uploading your file.';
                return; // Exit the method if file upload fails
            }
        } elseif (empty($image)) {
            // If no new image is uploaded and no existing image, retain existing image
            $productModel = ProductModel::getInstance();
            $existingProduct = $productModel->getProductById($id);
            $image = $existingProduct['image_path'];
        }

        // Call the model method to update the product
        $productModel = ProductModel::getInstance();
        $productModel->updateProduct($id, $name, $description, $price, $image);

        // Redirect back to index.php
        header('Location: index.php');
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