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

                //get data

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

}