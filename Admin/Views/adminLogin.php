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
<div class="d-flex justify-content-center">
<form action="adminView.php" method="post">
    <input type="text" name="adminUsername" placeholder="Input your username" class="form-control "><br>
    <input type="password" name="adminPassword" placeholder="Input your password" class="form-control"><br>
    <input type="submit" value="LOGIN" class="btn btn-primary">
</form>
</div>
</body>
</html>