<?php
require_once(__DIR__ . '/../vendor/thingengineer/MysqliDb.php'); //Use thingengineeer mysql class
$return = [];
$db = new MysqliDb('localhost', 'root', '', 'sasoft_em'); //Connect to DB

//Catch warnings
set_error_handler('error_handler');
function error_handler($errno, $errmsg, $filename, $linenum, $vars)
{
    // error was suppressed with the @-operator
    if (0 === error_reporting())
        return false;

    if ($errno !== E_ERROR) {
        $return['Error']  = $errmsg;
  
    }
    
}
echo $return;
//Catch uncaught exceptions
set_exception_handler('my_exception_handler');
function my_exception_handler($e)
{
    if (!empty($e)) {
        $return['Error']  = $e;
        
    }

}


