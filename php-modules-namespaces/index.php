<?php

// include("autoload.php");
include("vendor/autoload.php");

use Carbon\Carbon;
use Libs\Databases\MySQL as Database;
use Support\HTTP;

$db = new Database;
$db->connect();

$http = new HTTP;
$http->redrect();


echo Carbon::now();