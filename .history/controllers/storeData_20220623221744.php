<?php
//Database configation file
require_once('config.php');

//Class that handles saving and updating employees
class StoreEmployee
{

    // This generates a unique employee ID   
    public function generateID()
    {
        global  $db;
        $a = 0;

        while ($a == 0) {
            $al2 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2); //Generate 2 random uppercase letters
            $num4 = substr(str_shuffle('0123456789'), 1, 4); //generate 4 random numbers
            $alnum6 =   $al2 .  $num4;
            //Checks if there's an employee with the same ID
            $db->where('employeeID', $alnum6);
            $checkID = $db->get("employees");

            if ($db->count > 0) {
                $a = 0;
            } else {
                $a = 1;
                return $alnum6;
            }
        }
    }

    //store a new employee
    public function StoreNewEmployee($firstname = null, $lastname = null, $email = null, $dob = null, $contactno = null, $address = null, $city = null, $code = null, $country = null, $skills = null, $years = null, $rating = null)
    {
        global  $db;
        $return                             = []; //variable that stores function results/outcome

        //Validate inputs
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($dob) && !empty($contactno) && !empty($address) && !empty($city) && !empty($code) && !empty($country) && !empty($skills) && !empty($years) && !empty($rating)) {
            //Query database
            $db->where('email', $email);
            $db->where('status', 'A');

            $query = $db->get("employees");

            if ($db->count > 0) {
                $return['Error']    = 'Employee email already exists';
            } else {

                $empID = $this->generateID();
                $dataEmp = array(
                    "employeeID"          => $empID,
                    "firstname"           => $firstname,
                    "lastname"            => $lastname,
                    "contactno"           => $contactno,
                    "email"               => $email,
                    "address"             => $address,
                    "city"                => $city,
                    "poscode"             => $code,
                    "country"             => $country,
                    "dob"                 => date("Y-m-d", strtotime($dob)),
                    "status"              => 'A',

                );
                // Start procedure to store 
                $db->startTransaction();
                $storeEmp = $db->insert('employees', $dataEmp);

                if ($storeEmp) {
                    //If Employee was stored successfully, assign and store skills
                    for ($i = 0; $i < count($skills); $i++) {
                        $dataEmpSkills = array(
                            "skill"               => $skills[$i],
                            "years"               => $years[$i],
                            "rating"              => $rating[$i],
                            "employeeID"          => $empID,
                            "status"              => 'A',
                        );

                        $storeSkills = $db->insert('skills', $dataEmpSkills);
                    }


                    if ($storeSkills) {
                        //Commit the db if no errors were encountered
                        $return['Results'] = 'Employee stored successfully';
                        $db->commit();
                    } else {
                        //rollback the db if errors were encountered
                        $return['Error'] =  $db->getLastError();
                        $db->rollback();
                    }
                } else {
                    $return['Error'] =  $db->getLastError();
                    $db->rollback();
                }
            }
        } else {
            //Return results if any of the fields was empty
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


    public function UpdateEmployee($firstname = null, $lastname = null, $email = null, $dob = null, $contactno = null, $address = null, $city = null, $code = null, $country = null, $skills = null, $years = null, $rating = null, $employeeID = null)
    {

        global  $db;
        $return                             = [];


        if (!empty($firstname) && !empty($lastname) && !empty($email) &&  !empty($dob) && !empty($contactno) && !empty($address) && !empty($city) && !empty($code) && !empty($country) && !empty($skills) && !empty($years) && !empty($rating) && !empty($employeeID)) {

            $db->where('status', 'A');
            $db->where('employeeID', $employeeID);

            //Get only one record using employee email
            $query = $db->getOne("employees");

            if ($db->count == 0) {
                $return['Error']    = 'Employee email does not exist';
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
                    "dob"                 => date("Y-m-d", strtotime($dob)),
                    "status"              => 'A',
                );
                //Update the records
                $db->startTransaction();
                $db->where('status', 'A');
                $db->where('employeeID', $employeeID);
                $updateEmp = $db->update('employees', $dataEmp);

                if ($updateEmp) {
                    //Delete old skills records and store new ones
                    //It is simple to delete them then store than update
                    $db->where('employeeID', $query['employeeID']);
                    $deleteOldSkills = $db->delete('skills');

                    if ($deleteOldSkills) {
                        for ($i = 0; $i < count($skills); $i++) {
                            $dataEmpSkills = array(
                                "skill"               => $skills[$i],
                                "years"               => $years[$i],
                                "rating"              => $rating[$i],
                                "employeeID"          => $query['employeeID'],
                                "status"              => 'A',
                            );

                            $storeSkills = $db->insert('skills', $dataEmpSkills);
                        }

                        if ($storeSkills) {
                            $return['Results'] = 'Employee updated successfully';
                            $db->commit();
                        } else {
                            $return['ERROR'] =  $db->getLastError();
                            $db->rollback();
                        }
                    } else {
                        $return['ERROR'] =  $db->getLastError();
                        $db->rollback();
                    }
                } else {
                    $return['ERROR'] =  $db->getLastError();
                    $db->rollback();
                }
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

class DeleteEmployee
{
    public function deleteEmployee($id = null)
    {
        global  $db;
        $return                             = [];

        if ($id != NULL) {

            $db->where('employeeID', $id);
            $db->where('Status', 'A');
            $query = $db->getOne("employees");

            if ($db->count != 0) {
                $dataEmp = array(
                    "status"              => 'D',
                );

                $db->startTransaction();
                $db->where('status', 'A');
                $db->where('employeeID', $id);
                $delete = $db->update('employees', $dataEmp);
                if ($delete) {

                    $db->where('employeeID', $id);
                    $dataSkills = array(
                        "status"              => 'D',
                    );

                    $deleteSkills = $db->update('skills', $dataSkills);

                    if ($deleteSkills) {
                        $return['Results'] = 'Employee deleted successfully';
                        $db->commit();
                    } else {
                        $return['Error'] = 'Error deleting employee,' . $db->getLastError();
                        $db->rollback();
                    }
                } else {
                    $return['Error'] = 'Error deleting employee,' . $db->getLastError();
                    $db->rollback();
                }
            } else {

                $db->where('employeeID', $id);
                $db->where('Status', 'D');
                $db->getOne("employees");

                if ($db->count != 0) {
                    $return['Error']    = 'Employee already deleted'; //error handler
                } else {
                    $return['Error']    = 'Employee not found '; //error handler
                }
            }
        } else {
            $return['Error']    = 'Employee ID is required';
        }
        return $return;
    }
}
$deleteEmployee = new DeleteEmployee();

$func = $_REQUEST['_FUNCTION'] ?? '';

switch ($func) {
    case 'StoreNewEmployee': {
            $StoreEmployee = new StoreEmployee();

            $skills = [];
            $years = [];
            $rating = [];

            for ($i = 0; $i <  $_REQUEST['counter']; $i++) {
                $skills[$i] = $_REQUEST['skill_' .  $i];
                $years[$i] = $_REQUEST['years_' .  $i];
                $rating[$i] = $_REQUEST['rating_' .  $i];
            };


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
                $skills,
                $years,
                $rating,

            ));

            break;
        }

    case 'UpdateEmployee': {
            $UpdateOldEmployee = new StoreEmployee();

            $skills = [];
            $years = [];
            $rating = [];

            for ($i = 0; $i <  $_REQUEST['counter']; $i++) {
                $skills[$i] = $_REQUEST['skill_' .  $i];
                $years[$i] = $_REQUEST['years_' .  $i];
                $rating[$i] = $_REQUEST['rating_' .  $i];
            };


            echo json_encode($UpdateOldEmployee->UpdateEmployee(
                $_REQUEST['firstname'] ?? '',
                $_REQUEST['lastname'] ?? '',
                $_REQUEST['email'] ?? '',
                $_REQUEST['dob'] ?? '',
                $_REQUEST['contactno'] ?? '',
                $_REQUEST['address'] ?? '',
                $_REQUEST['city'] ?? '',
                $_REQUEST['code'] ?? '',
                $_REQUEST['country'] ?? '',
                $skills,
                $years,
                $rating,
                $_REQUEST['empID'] ?? '',
            ));

            break;
        }
    case 'deleteEmployee': {
            $deleteEmployee = new DeleteEmployee();
            echo json_encode($deleteEmployee->deleteEmployee($_REQUEST['id']));
            break;
        }
}
