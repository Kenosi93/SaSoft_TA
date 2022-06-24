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



    }
}
$StoreEmployee = new StoreEmployee();
