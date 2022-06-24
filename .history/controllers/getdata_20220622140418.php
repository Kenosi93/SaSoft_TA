<?php
require_once('config.php');


class GetEmployee
{


    public function getEmployeeByID($id = null)
    {
        global  $db;
        $return                             = [];

        $db->where('employeeID', $id);
        $db->where('Status', 'A');
        $query = $db->getOne("employees");

        if ($db->count != 0) {

            //get data

        } else {
            $return['Error']    = 'Employee not found'; //error handler
        }
    }
}
