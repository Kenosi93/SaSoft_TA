<?php
require_once('config.php');


class StoreEmployee
{

    public function UpdateEmployee($firstname = null, $lastname = null, $email = null, $dob = null, $contactno = null, $address = null, $city = null, $code = null, $country = null, $skills = null, $years = null, $rating = null)
    {
        global  $db;
        $return                             = [];
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($dob) && !empty($contactno) && !empty($address) && !empty($city) && !empty($code) && !empty($country) && !empty($skills) && !empty($years) && !empty($rating)) {

        $db->where('email', $Email);
        $db->where('status', 'A');

        $query = $db->get("employees");

        if ($db->count > 0) {
            $return['Error']    = 'Employee email already exists';
        } else {
            //store
        }
    } else {
        if (empty($firstname)) {
            $return['Error']    = 'first name is required';
        }
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
