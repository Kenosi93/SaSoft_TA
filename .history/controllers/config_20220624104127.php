<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class
$return = [];
$db = new MysqliDb('localhost', 'root', '', 'sasoft_em');//Connect to DB
set_exception_handler('my_exception_handler');
function my_exception_handler($e) {
$return['Error']    = 'Error connecting to database';
print_r($e);
}
?>