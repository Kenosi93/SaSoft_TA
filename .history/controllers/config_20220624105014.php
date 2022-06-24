<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class

set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }

    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

try {
    $db = new MysqliDb('localhost', 'root', '', 'sasoft_em');//Connect to DB
} catch (ErrorException $e) {
    print_r($e);
}

$return = [];

// set_exception_handler('my_exception_handler');
// function my_exception_handler($e) {
// $return['Error']    = 'Error connecting to database';
// return $return;
// }
?>