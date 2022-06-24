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
                $dataEmp = array(
                    "firstname"           => $firstname,
                    "lastname"            => $lastname,
                    "contactno"           => $contactno,
                    "email"               => $email,
                    "address"             => $address,
                    "city"                => $city,
                    "poscode"             => $code,
                    "country"             => $country,
                    "dob"                 => $dob,
                    "status"              => 'A',

                );
                $storeEmp = $db->insert('employees', $dataEmp);

                $return = $storeEmp;
            }
        } else {
            if (empty($firstname)) {
                $return['Error']    = 'first name is required';
            }
            if (empty($lastname)) {
                $return['Error']    = 'Last name is required';
            }
            if (empty($contactno)) {
                $return['Error']    = 'contactno is required';
            }
            if (empty($email)) {
                $return['Error']    = 'email is required';
            }
            if (empty($dob)) {
                $return['Error']    = 'Date of Birth is required';
            }
            if (empty($address)) {
                $return['Error']    = 'address is required';
            }
            if (empty($city)) {
                $return['Error']    = 'city is required';
            }
            if (empty($code)) {
                $return['Error']    = 'code is required';
            }
            if (empty($country)) {
                $return['Error']    = 'country is required';
            }
            if (empty($skills)) {
                $return['Error']    = 'skills is required';
            }
            if (empty($years)) {
                $return['Error']    = 'years is required';
            }
            if (empty($rating)) {
                $return['Error']    = 'rating is required';
            }
        }
        return $return;
    }
}
$StoreEmployee = new StoreEmployee();




$func = $_REQUEST['_FUNCTION'] ?? '';

switch ($func) {
    case 'StoreNewEmployee': {
            $StoreEmployee = new StoreEmployee();

            $skills = [];
            $years = [];
            $rating = [];
            
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
                // $_REQUEST['skills'] ?? '',
                // $_REQUEST['years'] ?? '',
                // $_REQUEST['rating'] ?? '',

            ));



            break;
        }
}
