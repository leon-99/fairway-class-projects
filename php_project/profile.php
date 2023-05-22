<?php
include("vendor/autoload.php");
use Helpers\Auth;

$user = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-3 text-center">Profile</h3>
        <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-warning">
            Cannot upload file
        </div>
        <?php endif ?>
        <?php if ($user->photo): ?>
        <img class="img-thumbnail mb-3" src="_actions/photos/<?= $user->photo ?>" alt="Profile Photo" width="200">
        <?php endif ?>
        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button class="btn btn-secondary" type="submit">Upload</button>
            </div>
        </form>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Name:</b> <?= $user->name ?>
            </li>
            <li class="list-group-item">
                <b>Email:</b> <?= $user->email ?>
            </li>
            <li class="list-group-item">
                <b>Phone:</b> <?= $user->phone ?>
            </li>
            <li class="list-group-item">
                <b>Address:</b> <?= $user->address ?>
            </li>
        </ul>
        <br>
        <a href="admin.php">Manage Users</a>
        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>

</html>