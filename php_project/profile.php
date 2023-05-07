<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-3">John Doe (Manager)</h1>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-warning">
                Cannot upload file
            </div>
        <?php endif ?>
        <?php if (file_exists('_actions/photos/profile.jpg')): ?>
            <img class="img-thumbnail mb-3" src="_actions/photos/profile.jpg" alt="Profile Photo" width="200">
        <?php endif ?>
        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button class="btn btn-secondary" type="submit">Upload</button>
            </div>
        </form>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> john.doe@gmail.com
            </li>
            <li class="list-group-item">
                <b>Phone:</b> (09) 243 867 645
            </li>
            <li class="list-group-item">
                <b>Address:</b> No. 321, Main Street, West City
            </li>
        </ul>
        <br>
        <a href="_actions/logout.php">Logout</a>
    </div>
</body>

</html>