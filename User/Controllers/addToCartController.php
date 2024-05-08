<?php
session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            if (isset($_POST['id'], $_POST['price'])) {
                $id = $_POST['id'];
                $price = $_POST['price'];

                addToCart($id, $price, 1);

                echo json_encode(['success' => true]);
                exit;
            } else {
                echo json_encode(['error' => 'Missing data']);
                exit;
            }
            break;
        case 'update':
            if (isset($_POST['id'], $_POST['quantity'])) {
                $id = $_POST['id'];
                $quantity = $_POST['quantity'];

                $_SESSION['cart'][$id] = $quantity;

                echo json_encode(['success' => true]);
                exit;
            } else {
                echo json_encode(['error' => 'Missing data']);
                exit;
            }
            break;
        case 'delete':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                if (isset($_SESSION['cart'][$id])) {
                    unset($_SESSION['cart'][$id]);


                    echo json_encode(['success' => true]);
                    exit;
                } else {
                    echo json_encode(['error' => 'Product not found in cart']);
                    exit;
                }
            } else {
                echo json_encode(['error' => 'Missing data']);
                exit;
            }
            break;
        default:
            echo json_encode(['error' => 'Invalid action']);
            exit;

    }
} else {
    echo json_encode(['error' => 'No action specified']);
    exit;
}

function addToCart($id, $price, $quantity) {
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = $quantity;
    } else {
        $_SESSION['cart'][$id] += $quantity;
    }

}
