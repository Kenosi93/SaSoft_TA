<?php
require_once('controllers/getdata.php');
$GetEmployees = new GetEmployee();
$getEMP = $GetEmployees->getEmployeeByID($_REQUEST['empid']);
// echo "<pre>";
//    print_r($getEMP);
// echo "</pre>";

$firstname      = $getEMP[0]['firstname'];
$lastname       = $getEMP[0]['lastname'];
$dob            = $getEMP[0]['dob'];
$contactno      = $getEMP[0]['contactno'];
$email          = $getEMP[0]['email'];
$address        = $getEMP[0]['address'];
$city           = $getEMP[0]['city'];
$code           = $getEMP[0]['poscode'];
$country        = $getEMP[0]['country'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>edit employee</title>
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <!-- Select 2 for my selects -->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <!-- datepicker for stylish dates -->
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <!-- Navigation bar-->
    <style type="text/css">
        #ulid {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        #liid {
            float: left;
        }

        #liid a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #liid a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #993366;
        }
    </style>
</head>

<body>
    <!-- //<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins"> -->
    <div class="wrapper wrapper--w680">
        <ul id="ulid">
            <li id="liid"><a href="index.php">Home</a></li>
            <li id="liid"><a href="addemp.php">Add Employee</a></li>
            <li id="liid"><a class="active" href="employees.php">Edit Employee</a></li>
            <li id="liid"><a href="employees.php">Search Employee</a></li>
        </ul>
        </br>

        <div class="card card-4">
            <div class="card-body">
                <h2 class="title">Update Employee</h2>
                <form method="POST" name="frm_emp" id="frm_emp">
                    <input type="hidden" id="_FUNCTION" name="_FUNCTION" value="UpdateEmployee">
                    <input type="hidden" id="counter" name="counter">
                    <input type="hidden" id="empID" name="empID">

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">first name</label>
                                <input class="input--style-4" type="text" name="firstname" id="firstname" value="<?php echo ($firstname) ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" type="text" name="lastname" id="lastname" value="<?php echo ($lastname) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" id="email" value="<?php echo ($email) ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Contact number</label>
                                <input class="input--style-4" type="text" name="contactno" id="contactno" value="<?php echo ($contactno) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Birthday</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4 js-datepicker" type="text" name="dob" id="dob" value="<?php echo ($dob) ?>" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-4">
                            <div class="input-group">
                                <label class="label">Address</label>
                                <input class="input--style-4" type="text" name="address" id="address" value="<?php echo ($address) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">City</label>
                                <input class="input--style-4" type="text" name="city" id="city" value="<?php echo ($city) ?>" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Postal Code</label>
                                <input class="input--style-4" type="number" name="code" id="code" value="<?php echo ($code) ?>" required>
                            </div>

                            <div class="input-group">
                                <label class="label">Country</label>
                                <input class="input--style-4" type="text" name="country" id="country" value="<?php echo ($country) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space" style="border:1px solid lightgrey ;" id="div_skills_0">
                        <div class=" col-2 ">
                            <div class="input-group ">
                                <label class="label ">Skill 1</label>
                                <div class="input-group-icon ">
                                    <input class="input--style-4 " type="text " name="skill_0" id="skill_0">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="input-group ">
                                <label class="label ">Yrs exp</label>
                                <input class="input--style-4 " type="number " name="years_0" id="years_0">
                                <label class="label ">Seniority rating</label>
                                <div class="rs-select2 js-select-simple select--no-search ">
                                    <select name="rating_0" id="rating_0">
                                        <option disabled="disabled " selected="selected">Choose option</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <div class="select-dropdown "></div>
                                </div>
                            </div>
                            <div id="BTN_0">
                                <div id="BTN">

                                    <button type="button" id="addField"><i class="fa fa-plus"></i></button>
                                    <button type="button" id="removeField" style="display:none"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row row-space" style="border:1px solid lightgrey; display:none" id="div_skills_1">
                        <div class="col-2 ">
                            <div class="input-group ">
                                <label class="label ">Skill 2</label>
                                <div class="input-group-icon ">
                                    <input class="input--style-4 " type="text " name="skill_1" id="skill_1">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="input-group ">
                                <label class="label ">Yrs exp</label>
                                <input class="input--style-4 " type="text " name="years_1" id="years_1">
                                <label class="label ">Seniority rating</label>
                                <div class="rs-select2 js-select-simple select--no-search ">
                                    <select name="rating_1" id="rating_1">
                                        <option disabled="disabled " selected="selected ">Choose option</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <div class="select-dropdown "></div>
                                </div>
                            </div>
                            <div id="BTN_1"></div>
                        </div>
                    </div>

                    <div class="row row-space" style="border:1px solid lightgrey; display:none" id="div_skills_2">
                        <div class=" col-2 ">
                            <div class="input-group ">
                                <label class="label ">Skill 3</label>
                                <div class="input-group-icon ">
                                    <input class="input--style-4 " type="text " name="skill_2" id="skill_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ">
                            <div class="input-group ">
                                <label class="label ">Yrs exp</label>
                                <input class="input--style-4 " type="number " name="years_2" id="years_2">
                                <label class="label ">Seniority rating</label>
                                <div class="rs-select2 js-select-simple select--no-search ">
                                    <select name="rating_2" id="rating_2">
                                        <option disabled="disabled " selected="selected ">Choose option</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <div class="select-dropdown "></div>
                                </div>
                            </div>
                            <div id="BTN_2"></div>
                        </div>
                    </div>


                    <div class="p-t-15 ">
                        <button class="btn btn--radius-2 btn--blue " type="button" id="btnsubmit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js "></script>

    <!-- Vendor JS-->
    <!-- select2 JS-->
    <script src="vendor/select2/select2.min.js "></script>
    <!-- datepicker JS-->
    <script src="vendor/datepicker/moment.min.js "></script>
    <script src="vendor/datepicker/daterangepicker.js "></script>
    <!-- noty JS - I use this for pop-ups and notifications-->
    <script type="text/javascript" src="vendor/noty/jquery.noty.packaged.js"></script>
    <!-- Main JS-->
    <script src="js/global.js "></script>

    <script>
        var getEMP = JSON.parse('<?php echo json_encode($getEMP); ?>');
        var counter = getEMP[0]['skills'].length - 1;
  
        $(function() {

            $.each(getEMP[0]['skills'], function(key, val) {

                $('#div_skills_' + key).show();

                $('#skill_' + key).val(val);
                $('#years_' + key).val(getEMP[0]['experience'][key]);
                $('#rating_' + key).val(getEMP[0]['rating'][key]).change();

            });

            if (counter > 0) {
                $('#addField').show();
                $('#removeField').show();
                if (counter == 2) {
                    $('#addField').hide();
                }
                if (counter == 0) {
                    $('#removeField').hide();
                }
            }

            $('#BTN').appendTo('#BTN_' + (counter));


            $("#addField").on('click', function() {
                if (counter <= 2) {
                    counter++;
                    $('#div_skills_' + counter).show();
                    $('#removeField').show();
                    $('#BTN').appendTo('#BTN_' + counter);

                    if (counter == 2) {
                        $('#addField').hide();
                    }
                }
            });

            $("#removeField").on('click', function() {
                if (counter > 0) {
                    $('#div_skills_' + counter).hide();
                    $('#addField').show();
                    counter--;

                    $('#BTN').appendTo('#BTN_' + counter)

                    if (counter == 0) {
                        $('#removeField').hide();
                    } else {
                        $('#removeField').show();
                    }

                }
            });

            $('#btnsubmit').click(function() {
                $("#counter").val(counter + 1);
                $("#empID").val(getEMP[0]['employeeID']);
                $.ajax({
                    url: 'controllers/storeData.php',
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    data: $('#frm_emp').serialize(),
                    success: function(data) {
                        if (typeof data['Error'] == 'undefined') {
                            noty({
                                text: data['Results'],
                                type: "success",
                                layout: "topCenter",
                                callback: {
                                    onClose: function() {
                                        parent.$.colorbox.close();
                                    },
                                },
                            });
                            $('.card-body').hide();
                        } else {
                            noty({
                                text: data['Error'],
                                type: "error",
                                layout: "topCenter"
                            });
                        }

                    }
                });
            });


        }); //DOC READY

        function validateSkills() {
            for (let i = 0; i < counter; i++) {
                if ($("#skill_" + i).val() == '') {
                    return false;
                } else if ($("#years_" + i).val() == '') {
                    return false;
                } else if ($("#rating_" + i).val() == '') {
                    return false;
                } else {
                    return true;
                }
            }
        }
    </script>

</body>

</html>