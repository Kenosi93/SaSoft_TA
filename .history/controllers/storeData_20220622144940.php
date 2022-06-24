<?php
require_once('config.php');


class StoreEmployee
{

    public function StoreNewEmployee()
    {
        global  $db;
        $return                             = [];


        $db->where('email', $Email);
        $db->where('status', 'A');

        $query = $db->get("employees");

        if ($db->count > 0) {
            $return['Error']    = 'Employee email already exists';
        } else {
            //store
        }
    }
}
$StoreEmployee = new StoreEmployee();

$func = $_REQUEST['_FUNCTION'] ?? '';

switch ($func) {
    case 'StoreNewEmployee': {
            $StoreEmployee = new StoreEmployee();

            echo json_encode($StoreEmployee->StoreNewEmployee(
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['firstname'] ?? '',



            ));



            break;
        }
}
