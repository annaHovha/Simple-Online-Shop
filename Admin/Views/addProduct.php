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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="../index.php?action=addProduct" enctype="multipart/form-data">
                <input type="text" name="productName" placeholder="Input product's name" class="form-control"><br>
                <input type="text" name="productDesc" placeholder="Input product's description" class="form-control"><br>
                <input type="number" name="productPrice" placeholder="Input product's price" class="form-control"><br>
                <input type="file" name="productImage" value="uploadImage" class="form-control"><br>
                <input class="btn btn-primary" type="submit" value="Add item" name="addProduct">
            </form>
        </div>
    </div>
</div>
</body>
</html>