<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5 text-center">
    <h1>Cart</h1>
    <?php if(empty($_SESSION['cart'])):?>
        <p class="alert alert-info">There are no items in your shopping cart!</p>
    <?php else:?>
    <form id="updateQuantityForm" method="post" action="index.php?action=placeOrder">
        <input type="hidden" name="cartTotal" value="<?= $cartTotal ?>">
        <table>
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($product as $val => $key): ?>
                <tr id="product-row-<?= $val ?>">
                    <td><?= $key[0]['name'] ?></td>
                    <td><?= $key[0]['description'] ?></td>
                    <td>$<?= $key[0]['price'] ?></td>
                    <td><img src="<?= $key[0]['image_path'] ?>" alt="Product Image" style="width: 100px;"></td>

                    <td class="bigTd">
                        <input type="number" class="quantity" name="quantity[<?= $val ?>]" min="1" value="<?= $_SESSION['cart'][$val] ?>" data-product-id="<?= $val ?>">
                    </td>

                    <td>$<?= $key[0]['price'] * $_SESSION['cart'][$val] ?></td>

                    <td>
                        <button class="delete-btn btn btn-danger" type="button" data-product-id="<?= $val ?>" onclick="deleteFromCart(<?= $val ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    <?php endif; ?>
    <a href="Views/userInfo.php" class="btn btn-success ml-3">Checkout</a>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="Views/public/js/updateQuantity.js"></script>
<script src="Views/public/js/deleteFromCart.js"></script>
</html>
