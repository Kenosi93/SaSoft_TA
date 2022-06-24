<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class

function throwErrorException($errstr = null,$code = null, $errno = null, $errfile = null, $errline = null) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
  }
  function warning_handler($errno, $errstr, $errfile, $errline, array $errcontext) {
    return false && throwErrorException($errstr, 0, $errno, $errfile, $errline);
    # error_log("AAA"); # will never run after throw
    /* Do execute PHP internal error handler */
    # return false; # will never run after throw
  }
  set_error_handler('warning_handler', E_WARNING); 

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
