<!DOCTYPE html>
<html lang="en">
<head>
    <title>User View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<a href="index.php?action=cart" class="btn btn-info m-2">Cart</a>
<h1 class="text-center mb-5">Welcome to the User View</h1>
<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="product mb-5 text-center p-3" id="<?= $product['id']?>">
                    <?php if (!empty($product['image_path'])): ?>
                        <img src="<?= $product['image_path'] ?>" alt="Product Image" class="img-fluid" style="max-height: 200px; max-width: 200px;">
                        <br>
                        <h3><?= $product['name'] ?></h3>
                        <p><?= $product['description'] ?></p>
                        <p class="price" id="<?= $product['price'] ?>">Price: $<?= $product['price'] ?></p>
                    <?php endif; ?>
                    <button class="btn btn-primary add-to-cart" onclick="addToCart(this)" >Add to Cart</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="Views/public/js/cart.js"></script>
</html>
