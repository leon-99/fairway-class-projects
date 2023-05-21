<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL);

$users = $table->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managr Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="navbar bg-primary navbar-bark navbar-expand">
        <div class="container">
            <a href="admin.php" class="navbar-brand">Manage Users</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        Profile ( <?= $auth->name ?> )
                    </a>
                </li>
                <li class="nav-item">
                    <a href="_actions/logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </div>


    <div class="container">
        <table class="table table-striped mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
            <tr>
              <th><?= $user->id ?></th>
              <td><?= $user->name ?></td>
              <td><?= $user->email ?></td>
              <td><?= $user->phone ?></td>
              <td>
                <?php if ($user->role_id == 3): ?>
                    <span class="badge bg-success"><?= $user->role ?></span>
                <?php elseif ($user->role_id == 2): ?>
                    <span class="badge bg-primary"><?= $user->role ?></span>
                <?php elseif ($user->role_id == 1): ?>
                    <span class="badge bg-secondary"><?= $user->role ?></span>
                <?php else: ?>
                    <span class="badge bg-secondary"><?= $user->role ?></span>
                <?php endif ?>            
                </td>
                <td>
                    <div class="btn-group dropdown">
                        <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                            Change Role
                        </a>
                        
                        <div class="dropdown-menu">
                            <a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">
                                User
                            </a>
                            <a href="_actions/role.php?id=<?= $user->id ?>&role=2" cclass="dropdown-item">
                                Manager
                            </a>
                            <a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">
                                Admin
                            </a>
                        </div>

                    <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-primary">
                            
                        </a>
                    <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-warning">
                            Ban
                        </a>
                        <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger">
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
    <?php endforeach ?>
  </tbody>
</table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>