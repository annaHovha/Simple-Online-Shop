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
<a href="index.php" class="btn btn-info m-3">Home</a>
<table class="table">
    <thead class="thead-dark">
    <tr class="text-center align-middle">
        <th scope="col">Customer info</th>
        <th scope="col">Delivery address</th>
        <th scope="col">Phone number</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order):?>
        <tr class="text-center font-weight-bold">
            <td class="align-middle"><?= $order['customer_info'] ?></td>
            <td class="align-middle"><?= $order['delivery_address'] ?></td>
            <td class="align-middle"><?= $order['phone_number'] ?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
