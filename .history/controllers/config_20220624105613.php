<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class

$db = new MysqliDb('localhost', 'root', '', 'sasoft_em');//Connect to DB
set_exception_handler('my_exception_handler');
function my_exception_handler($e) {
 // print_r($e);
}
?>