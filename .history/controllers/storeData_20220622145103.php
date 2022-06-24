<?php
require_once('config.php');


class StoreEmployee
{

    public function StoreNewEmployee($firstname = null,$lastname = null,  $email = null)
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
                $_REQUEST['lastname'] ?? '',
                $_REQUEST['email'] ?? '',
                $_REQUEST['dob'] ?? '',
                $_REQUEST['contactno'] ?? '',
                $_REQUEST['address'] ?? '',
                $_REQUEST['city'] ?? '',
                $_REQUEST['code'] ?? '',
                $_REQUEST['country'] ?? '',
                $_REQUEST['skills'] ?? '',
                $_REQUEST['years'] ?? '',
                $_REQUEST['rating'] ?? '',

            ));



            break;
        }
}
