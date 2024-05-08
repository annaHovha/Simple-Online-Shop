<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="index.php?action=updateProduct&updateProduct=<?= $product['id']; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="productName" value="<?= $product['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="productDesc">Product Description</label>
                    <input type="text" class="form-control" id="productDesc" name="productDesc" value="<?= $product['description'] ?>">
                </div>
                <div class="form-group">
                    <label for="productPrice">Product Price</label>
                    <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?= $product['price'] ?>">
                </div>
                <?php if (!empty($product['image_path'])): ?>
                    <img src="<?= $product['image_path']; ?>" alt="Product Image" class="product-image" style="max-width: 200px; max-height: 200px;"><br>
                    <label for="productImage">Choose a new image:</label>
                <?php endif; ?>
                <div class="form-group">
                    <input type="file" class="form-control-file" id="productImage" name="productImage">
                </div>
                <button type="submit" class="btn btn-primary" name="updateProduct">Update item</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
