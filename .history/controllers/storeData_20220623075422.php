<?php
require_once('config.php');


class StoreEmployee
{

    public function generateID()
    {
        global  $db;
        $a = 0;
        while ($a == 0) {

            $al2 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 2);
            $num4 = substr(str_shuffle('0123456789'), 1, 4);
            $alnum6 =   $al2 .  $num4;

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

    public function StoreNewEmployee($firstname = null, $lastname = null, $email = null, $dob = null, $contactno = null, $address = null, $city = null, $code = null, $country = null, $skills = null, $years = null, $rating = null)
    {
        global  $db;
        $return                             = [];
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($dob) && !empty($contactno) && !empty($address) && !empty($city) && !empty($code) && !empty($country) && !empty($skills) && !empty($years) && !empty($rating)) {

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
                    "dob"                 => $dob,
                    "status"              => 'A',

                );

                $db->startTransaction();
                $storeEmp = $db->insert('employees', $dataEmp);

                if ($storeEmp) {

                    for ($i = 0; $i < count($skills); $i++) {
                        $dataEmpSkills = array(
                            "skill"               => $skills[$i],
                            "years"               => $years[$i],
                            "rating"              => $rating[$i],
                            "employeeID"          => $empID,
                        );

                        $storeSkills = $db->insert('skills', $dataEmpSkills);
                    }


                    if ($storeSkills) {
                        $return['Results'] = 'Employee stored successfully';
                        $db->commit();
                    } else {
                        $return['Error'] =  $db->getLastError();
                        $db->rollback();
                    }
                } else {
                    $return['Error'] =  $db->getLastError();
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


    public function UpdateEmployee($firstname = null, $lastname = null, $email = null, $dob = null, $contactno = null, $address = null, $city = null, $code = null, $country = null, $skills = null, $years = null, $rating = null)
    {
        global  $db;
        $return                             = [];
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($dob) && !empty($contactno) && !empty($address) && !empty($city) && !empty($code) && !empty($country) && !empty($skills) && !empty($years) && !empty($rating)) {

            $db->where('email', $email);
            $db->where('status', 'A');

            $query = $db->getOne("employees");

            return $query;

            exit();

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
                    "dob"                 => $dob,
                    "status"              => 'A',

                );

                $db->startTransaction();
                $updateEmp = $db->update('employees', $dataEmp);

                if ($updateEmp) {

                    $db->where('employeeID', $query['employeeID']);
                    $deleteOldSkills = $db->delete('skills');

                    if ($deleteOldSkills) {
                    $db->where('employeeID', $query['employeeID']);

                    for ($i = 0; $i < count($skills); $i++) {
                        $dataEmpSkills = array(
                            "skill"               => $skills[$i],
                            "years"               => $years[$i],
                            "rating"              => $rating[$i],
                            "employeeID"          => $query['employeeID'],
                        );

                        $storeSkills = $db->insert('skills', $dataEmpSkills);
                    }

                    if ($storeSkills) {
                        $return['Results'] = 'Employee updated successfully';
                        $db->commit();
                    } else {
                        $return['Error'] = 'Update failed, error: ' . $db->getLastError();
                        $db->rollback();
                    }
                    // } else {
                    //     $return['Error'] =  'Update failed, error: '. $db->getLastError();
                    //     $db->rollback();
                    // }
                } else {
                    $return['Error'] = 'Update failed, error: ' . $db->getLastError();
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

            ));

            break;
        }
}
