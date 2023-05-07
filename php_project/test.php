<?php

require("vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

print_r($_FILES);

Auth::check();
HTTP::redirect();

$db = new MySQL;
$db->connect();

$table = new UsersTable;
$table->insert();