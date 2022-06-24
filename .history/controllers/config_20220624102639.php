<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class

$db = new MysqliDb('localhost', 'root', '', 'sasoft_em');//Connect to DB
// try {
//     throw new Exception("This is an example exception");
// }
// catch(Exception $e) {
   
// }