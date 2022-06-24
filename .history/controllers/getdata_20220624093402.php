<?php
require_once('config.php');


class GetEmployee
{

    //Get employee data by employee id
    public function getEmployeeByID($id = null)
    {
        global  $db;
        $return                             = [];

        if ($id != NULL) {
            //query to get data from database
            $db->where('employeeID', $id);
            $db->where('Status', 'A');
            $query = $db->getOne("employees");

            if ($db->count != 0) {

                $return[0]['employeeID']      = $query['employeeID'];
                $return[0]['firstname']       = $query['firstname'];
                $return[0]['lastname']        = $query['lastname'];
                $return[0]['dob']             = $query['dob'];
                $return[0]['contactno']       = $query['contactno'];
                $return[0]['email']           = $query['email'];
                $return[0]['address']         = $query['address'];
                $return[0]['city']            = $query['city'];
                $return[0]['poscode']         = $query['poscode'];
                $return[0]['country']         = $query['country'];
                $return[0]['status']          = $query['status'];

                $db->where('employeeID', $query['employeeID']);
                $getSkills = $db->get("skills");

                foreach ($getSkills as $key2 => $value2) {
                    $skills[$key2]          =   !empty($value2['skill']) ? $value2['skill'] : '-';
                    $rating[$key2]          =   !empty($value2['rating']) ? $value2['rating'] : '-';
                    $exp[$key2]             =   !empty($value2['years']) ? $value2['years'] : '-';
                }

                $return[0]['skills']        =  $skills;
                $return[0]['rating']        = $rating;
                $return[0]['experience']    = $exp;
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

                $skills  = '';
                $rating = '';
                $exp = '';

                $return[0]['employeeID']      = $query['employeeID'];
                $return[0]['firstname']       = $query['firstname'];
                $return[0]['lastname']        = $query['lastname'];
                $return[0]['dob']             = $query['dob'];
                $contactdeatils               = "Email:";
                $contactdeatils              .= '<br />';
                $contactdeatils              .=  $query['email'];
                $contactdeatils              .= '<br />';
                $contactdeatils              .= '<br />';
                $contactdeatils              .= "contactno: ";
                $contactdeatils              .= '<br />';
                $contactdeatils              .= $query['contactno'];
                $return[0]['contactdeatils']  = $contactdeatils;

                $address                      = $query['address'];
                $address                     .= '<br />';
                $address                     .= $query['city'];
                $address                     .= '<br />';
                $address                     .= $query['country'];
                $address                     .= '<br />';
                $address                     .= $query['poscode'];
                $return[0]['address']         = $address;



                $db->where('employeeID', $query['employeeID']);
                $getSkills = $db->get("skills");

                foreach ($getSkills as $key2 => $value2) {

                    $skills  .=   !empty($value2['skill']) ? $value2['skill'] : '-';
                    $skills  .= '<br/>';
                    $rating  .=   !empty($value2['rating']) ? $value2['rating'] : '-';
                    $rating  .= '<br/>';
                    $exp     .=   !empty($value2['years']) ? $value2['years'] : '-';
                    $exp     .= '<br/>';
                }

                $return[0]['skills']        =  $skills;
                $return[0]['rating']        = $rating;
                $return[0]['experience']    = $exp;
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
        // $return                             = [];

        if ($firstname != NULL) {

            $db->where('firstname', $firstname);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {

                foreach ($query  as $key => $value) {

                    $return[$key]['employeeID']      = $value['employeeID'];
                    $return[$key]['firstname']       = $value['firstname'];
                    $return[$key]['lastname']        = $value['lastname'];
                    $return[$key]['dob']             = $value['dob'];
                    $contactdeatils                  = "Email:";
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .=  $value['email'];
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .= "contactno: ";
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .= $value['contactno'];
                    $return[$key]['contactdeatils']  = $contactdeatils;

                    $address                         = $value['address'];
                    $address                        .= '<br />';
                    $address                        .= $value['city'];
                    $address                        .= '<br />';
                    $address                        .= $value['country'];
                    $address                        .= '<br />';
                    $address                        .= $value['poscode'];
                    $return[$key]['address']        = $address;

                    $db->where('employeeID', $value['employeeID']);
                    $getSkills = $db->get("skills");

                    $skills  = '';
                    $rating = '';
                    $exp = '';

                    foreach ($getSkills  as $key2 => $value2) {

                        $skills       .=   !empty($value2['skill']) ? $value2['skill'] : '-';
                        $skills       .= '<br/>';
                        $rating       .=   !empty($value2['rating']) ? $value2['rating'] : '-';
                        $rating       .= '<br/>';
                        $exp          .=   !empty($value2['years']) ? $value2['years'] : '-';
                        $exp          .= '<br/>';
                    }

                    $return[$key]['skills']      = $skills;
                    $return[$key]['rating']      = $rating;
                    $return[$key]['experience']  = $exp;
                }
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

            $db->where('lastname', $lastname);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {

                foreach ($query  as $key => $value) {

                    $return[$key]['employeeID']      = $value['employeeID'];
                    $return[$key]['firstname']       = $value['firstname'];
                    $return[$key]['lastname']        = $value['lastname'];
                    $return[$key]['dob']             = $value['dob'];
                    $contactdeatils                  = "Email:";
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .=  $value['email'];
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .= "contactno: ";
                    $contactdeatils                 .= '<br />';
                    $contactdeatils                 .= $value['contactno'];
                    $return[$key]['contactdeatils']  = $contactdeatils;

                    $address                         = $value['address'];
                    $address                        .= '<br />';
                    $address                        .= $value['city'];
                    $address                        .= '<br />';
                    $address                        .= $value['country'];
                    $address                        .= '<br />';
                    $address                        .= $value['poscode'];
                    $return[$key]['address']        = $address;

                    $db->where('employeeID', $value['employeeID']);
                    $getSkills = $db->get("skills");

                    $skills  = '';
                    $rating = '';
                    $exp = '';

                    foreach ($getSkills  as $key2 => $value2) {

                        $skills       .=   !empty($value2['skill']) ? $value2['skill'] : '-';
                        $skills       .= '<br/>';
                        $rating       .=   !empty($value2['rating']) ? $value2['rating'] : '-';
                        $rating       .= '<br/>';
                        $exp          .=   !empty($value2['years']) ? $value2['years'] : '-';
                        $exp          .= '<br/>';
                    }

                    $return[$key]['skills']      = $skills;
                    $return[$key]['rating']      = $rating;
                    $return[$key]['experience']  = $exp;
                }
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


            foreach ($query  as $key => $value) {

                $return[$key]['employeeID']      = $value['employeeID'];
                $return[$key]['firstname']       = $value['firstname'];
                $return[$key]['lastname']        = $value['lastname'];
                $return[$key]['dob']             = $value['dob'];
                $contactdeatils                  = "Email:";
                $contactdeatils                 .= '<br />';
                $contactdeatils                 .=  $value['email'];
                $contactdeatils                 .= '<br />';
                $contactdeatils                 .= '<br />';
                $contactdeatils                 .= "contactno: ";
                $contactdeatils                 .= '<br />';
                $contactdeatils                 .= $value['contactno'];
                $return[$key]['contactdeatils']  = $contactdeatils;

                $address                         = $value['address'];
                $address                        .= '<br />';
                $address                        .= $value['city'];
                $address                        .= '<br />';
                $address                        .= $value['country'];
                $address                        .= '<br />';
                $address                        .= $value['poscode'];
                $return[$key]['address']        = $address;

                $db->where('employeeID', $value['employeeID']);
                $getSkills = $db->get("skills");

                $skills  = '';
                $rating = '';
                $exp = '';

                foreach ($getSkills  as $key2 => $value2) {

                    $skills       .=   !empty($value2['skill']) ? $value2['skill'] : '-';
                    $skills       .= '<br/>';
                    $rating       .=   !empty($value2['rating']) ? $value2['rating'] : '-';
                    $rating       .= '<br/>';
                    $exp          .=   !empty($value2['years']) ? $value2['years'] : '-';
                    $exp          .= '<br/>';
                }

                $return[$key]['skills']      = $skills;
                $return[$key]['rating']      = $rating;
                $return[$key]['experience']  = $exp;
            }
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
