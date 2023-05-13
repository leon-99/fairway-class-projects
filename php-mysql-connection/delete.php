<?php

include("mysql.php");

$db = connect();

$id = $_GET['id'];

$sql = "DELETE FROM roles WHERE id = :id";

$statement = $db->prepare($sql);
$statement->execute(["id" => $id]);

header("location: ./index.php");