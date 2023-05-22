<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$user = Auth::check();


$name = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];


if ($type === "image/jpeg" or $type === "image/png") {
    move_uploaded_file($tmp, "photos/$name");
    $table = new UsersTable(new MySQL);

    $table->updatePhoto($user->id, $name);

    $user->photo = $name;

    HTTP::redirect("/profile.php");
}

HTTP::redirect("profile.php", "error=upload");