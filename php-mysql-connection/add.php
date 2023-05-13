<?php

$name = $_POST['name'];
$value = $_POST['value'];

$sql = "INSERT INTO roles (name, value) VALUES (:name, :value)";
// $sql = "INSERT INTO roles (name, value) VALUES (?, ?)";

$db = include("mysql.php");
$db = connect();

$statement = $db->prepare($sql);
$statement->execute(["name" => $name, "value" => $value]);
// $statement->execute($name, $value);

header("location: ./index.php");
