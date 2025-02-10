<?php
header('Content-type: application/json');
include_once 'connect.php';

$table = "products";
$data = getAllData($table, 10);

?>