<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class
$return = [];
$db = new MysqliDb('localhost', 'root', '', 'sasoft_em'); //Connect to DB


if(!$db){
	echo "Databese Connection Failed";
}