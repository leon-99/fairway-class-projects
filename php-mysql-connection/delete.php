<?php

include("mysql.php");

$db = connect();

$id = $_GET['id'];

$db->query("DELETE FROM roles WHERE id = $id");

header("location: ./index.php");