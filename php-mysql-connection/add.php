<?php

$name = $_POST['name'];
$value = $_POST['value'];

$sql = "INSERT INTO roles (name, value) VALUES ('$name', $value)";

$db = include("mysql.php");
$db = connect();

$db->query($sql);

header("location: ./index.php");
