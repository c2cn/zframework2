<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ("../vendor/autoload.php");

$bootstrap = new zframework\Bootstrap();
$bootstrap->run();

?>