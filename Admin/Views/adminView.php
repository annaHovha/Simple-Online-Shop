<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<a href="Views/addProduct.php" class="btn btn-primary m-1">Add Product</a>
<a href="index.php?action=getOrders" class="btn btn-secondary m-3">Orders</a>
<table class="table">
    <thead class="thead-dark">
        <tr class="text-center align-middle">
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product):?>
            <tr class="text-center font-weight-bold ">
                <td class="align-middle"><?= $product['name'] ?></td>
                <td class="align-middle"><?= $product['description'] ?></td>
                <td class="align-middle"><?= $product['price'] ?></td>
                <td class="align-middle"><img src="<?= $product['image_path'] ?>" alt="Product Image" class="product-image"></td>
                <td class="align-middle">
                    <a href="index.php?action=editProduct&id=<?= $product['id']; ?>" class="btn btn-success">Edit</a>
                </td>
                <td class="align-middle">
                    <a href="index.php?action=deleteProduct&id=<?= $product['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
