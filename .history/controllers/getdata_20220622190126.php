<?php
require_once('config.php');


class GetEmployee
{


    public function getEmployeeByID($id = null)
    {
        global  $db;
        $return                             = [];

        if ($id != NULL) {

            $db->where('employeeID', $id);
            $db->where('Status', 'A');
            $query = $db->getOne("employees");

            if ($db->count != 0) {

                $return[0]['employeeID']      = $query['employeeID'];

            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Employee ID is required';
        }
        return $return;
    }

    public function getEmployeeByEmail($email = null)
    {
        global  $db;
        $return                             = [];

        if ($email != NULL) {

            $db->where('email', $email);
            $db->where('Status', 'A');
            $query = $db->getOne("employees");

            if ($db->count != 0) {

                //get data

            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Email address is required';
        }
        return $return;
    }


    public function getEmployeeByFirstName($firstname = null)
    {
        global  $db;
        $return                             = [];

        if ($firstname != NULL) {

            $db->where('firstname', $firstname);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {

                //get data

            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Fist name is required';
        }
        return $return;
    }



    public function getEmployeeByLastName($lastname = null)
    {
        global  $db;
        $return                             = [];

        if ($lastname != NULL) {

            $db->where('firstname', $lastname);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {

                //get data

            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Fist name is required';
        }
        return $return;
    }

        public function getAllEmployees()
    {
        global  $db;
        $return                             = [];

            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {

                //get data

            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
   
        return $return;
    }
}
$GetEmployees = new GetEmployee();

$func = $_REQUEST['_FUNCTION'] ?? '';

switch ($func) {

    case 'getEmployeeByID': {
        $GetEmployees = new GetEmployee();
        echo json_encode($GetEmployees->getEmployeeByID(!empty($_REQUEST['id']) ? $_REQUEST['id'] : ''));
        break;
    }
    case 'GetEmployeeByEmail': {
        $GetEmployees = new GetEmployee();
        echo json_encode($GetEmployees->getEmployeeByEmail(!empty($_REQUEST['email']) ? $_REQUEST['email'] : ''));
        break;
    }
    case 'GetEmployeeByFirstName': {
        $GetEmployees = new GetEmployee();
        echo json_encode($GetEmployees->GetEmployeeByFirstName(!empty($_REQUEST['firstname']) ? $_REQUEST['firstname'] : ''));
        break;
    }
    case 'GetEmployeeByLastName': {
        $GetEmployees = new GetEmployee();
        echo json_encode($GetEmployees->GetEmployeeByLastName(!empty($_REQUEST['lastname']) ? $_REQUEST['lastname'] : ''));
        break;
    }
    case 'GetAllEmployees': {
        $GetEmployees = new GetEmployee();
        echo json_encode($GetEmployees->getAllEmployees());
        break;
    }

}