<!DOCTYPE html>
<html>
<head>
    <title>Information about customer</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 p-5 border border-dark">
            <form action="../index.php?action=placeOrder" method="post">
                <input class="form-control" type="text" name="customerInfo" placeholder="Input your Full name" required><br>
                <input class="form-control" type="text" name="deliveryAddress" placeholder="Input your address" required><br>
                <input class="form-control" type="tel" name="userPhone" placeholder="Input your phone Number" required><br>
                <input class="btn btn-info" type="submit" value="Place Order">
            </form>
        </div>
    </div>
</div>

</body>
</html>
