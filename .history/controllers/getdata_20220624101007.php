<?php
require_once('config.php');


class GetEmployee
{
    /*
                                  _           _ _     _           
     /\                          | |         (_) |   | |          
    /  \   _ __ _ __ __ _ _   _  | |__  _   _ _| | __| | ___ _ __ 
   / /\ \ | '__| '__/ _` | | | | | '_ \| | | | | |/ _` |/ _ \ '__|
  / ____ \| |  | | | (_| | |_| | | |_) | |_| | | | (_| |  __/ |   
 /_/    \_\_|  |_|  \__,_|\__, | |_.__/ \__,_|_|_|\__,_|\___|_|   
                           __/ |                                  
                          |___/                                   
*/

    public function arrayBuilder($query = null, $db = null)
    {
        foreach ($query  as $key => $value) {
            //Build return array 
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
            //Get skills from skills table
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
        return  $return;
    }

    /*
   _____      _     ______                 _                         _             _____    _ 
  / ____|    | |   |  ____|               | |                       | |           |_   _|  | |
 | |  __  ___| |_  | |__   _ __ ___  _ __ | | ___  _   _  ___  ___  | |__  _   _    | |  __| |
 | | |_ |/ _ \ __| |  __| | '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \ | '_ \| | | |   | | / _` |
 | |__| |  __/ |_  | |____| | | | | | |_) | | (_) | |_| |  __/  __/ | |_) | |_| |  _| || (_| |
  \_____|\___|\__| |______|_| |_| |_| .__/|_|\___/ \__, |\___|\___| |_.__/ \__, | |_____\__,_|
                                    | |             __/ |                   __/ |             
                                    |_|            |___/                   |___/              
  */
    //Get employee data by employee id
    public function getEmployeeByID($id = null)
    {
        global  $db;
        $return                             = [];

        if ($id != NULL) { // Make sure id has a value
            //query to get data from database
            $db->where('employeeID', $id);
            $db->where('Status', 'A');
            $query = $db->getOne("employees");

            if ($db->count != 0) { // Check the number of records returned, if not 0 continue
                //Build return array 
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
                //Get skills from skills table
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

    /*

   _____      _     ______                 _                         _             ______                 _ _ 
  / ____|    | |   |  ____|               | |                       | |           |  ____|               (_) |
 | |  __  ___| |_  | |__   _ __ ___  _ __ | | ___  _   _  ___  ___  | |__  _   _  | |__   _ __ ___   __ _ _| |
 | | |_ |/ _ \ __| |  __| | '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \ | '_ \| | | | |  __| | '_ ` _ \ / _` | | |
 | |__| |  __/ |_  | |____| | | | | | |_) | | (_) | |_| |  __/  __/ | |_) | |_| | | |____| | | | | | (_| | | |
  \_____|\___|\__| |______|_| |_| |_| .__/|_|\___/ \__, |\___|\___| |_.__/ \__, | |______|_| |_| |_|\__,_|_|_|
                                    | |             __/ |                   __/ |                             
                                    |_|            |___/                   |___/                              
    */

    public function getEmployeeByEmail($email = null)
    {
        global  $db;


        if ($email != NULL) {

            $db->where('email', $email);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {
                $return = $this->arrayBuilder($query, $db);
            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Email address is required';
        }
        return $return;
    }
    /*
   _____      _     ______                 _                         _              __ _          _                                
  / ____|    | |   |  ____|               | |                       | |            / _(_)        | |                               
 | |  __  ___| |_  | |__   _ __ ___  _ __ | | ___  _   _  ___  ___  | |__  _   _  | |_ _ _ __ ___| |_   _ __   __ _ _ __ ___   ___ 
 | | |_ |/ _ \ __| |  __| | '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \ | '_ \| | | | |  _| | '__/ __| __| | '_ \ / _` | '_ ` _ \ / _ \
 | |__| |  __/ |_  | |____| | | | | | |_) | | (_) | |_| |  __/  __/ | |_) | |_| | | | | | |  \__ \ |_  | | | | (_| | | | | | |  __/
  \_____|\___|\__| |______|_| |_| |_| .__/|_|\___/ \__, |\___|\___| |_.__/ \__, | |_| |_|_|  |___/\__| |_| |_|\__,_|_| |_| |_|\___|
                                    | |             __/ |                   __/ |                                                  
                                    |_|            |___/                   |___/                                                   
*/

    public function getEmployeeByFirstName($firstname = null)
    {
        global  $db;

        if ($firstname != NULL) {

            $db->where('firstname', $firstname);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {
                $return = $this->arrayBuilder($query, $db);
            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Fist name is required';
        }
        return $return;
    }


    /*

   _____      _     ______                 _                         _             _           _                                
  / ____|    | |   |  ____|               | |                       | |           | |         | |                               
 | |  __  ___| |_  | |__   _ __ ___  _ __ | | ___  _   _  ___  ___  | |__  _   _  | | __ _ ___| |_   _ __   __ _ _ __ ___   ___ 
 | | |_ |/ _ \ __| |  __| | '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \ | '_ \| | | | | |/ _` / __| __| | '_ \ / _` | '_ ` _ \ / _ \
 | |__| |  __/ |_  | |____| | | | | | |_) | | (_) | |_| |  __/  __/ | |_) | |_| | | | (_| \__ \ |_  | | | | (_| | | | | | |  __/
  \_____|\___|\__| |______|_| |_| |_| .__/|_|\___/ \__, |\___|\___| |_.__/ \__, | |_|\__,_|___/\__| |_| |_|\__,_|_| |_| |_|\___|
                                    | |             __/ |                   __/ |                                               
                                    |_|            |___/                   |___/                                                
*/
    public function getEmployeeByLastName($lastname = null)
    {
        global  $db;

        if ($lastname != NULL) {

            $db->where('lastname', $lastname);
            $db->where('Status', 'A');
            $query = $db->get("employees");

            if ($db->count != 0) {
                $return = $this->arrayBuilder($query, $db);
            } else {
                $return[0]['Error']    = 'Employee not found'; //error handler
            }
        } else {
            $return[0]['Error']    = 'Fist name is required';
        }
        return $return;
    }

    /*
   _____      _           _ _   ______                 _                            
  / ____|    | |         | | | |  ____|               | |                           
 | |  __  ___| |_    __ _| | | | |__   _ __ ___  _ __ | | ___  _   _  ___  ___  ___ 
 | | |_ |/ _ \ __|  / _` | | | |  __| | '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \/ __|
 | |__| |  __/ |_  | (_| | | | | |____| | | | | | |_) | | (_) | |_| |  __/  __/\__ \
  \_____|\___|\__|  \__,_|_|_| |______|_| |_| |_| .__/|_|\___/ \__, |\___|\___||___/
                                                | |             __/ |               
                                                |_|            |___/                
*/
    public function getAllEmployees()
    {
        global  $db;

        $db->where('Status', 'A');
        $query = $db->get("employees");

        if ($db->count != 0) {
            $return = $this->arrayBuilder($query, $db);
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
