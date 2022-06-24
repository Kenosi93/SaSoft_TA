<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Add employee</title>
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
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Employee Enrollment</h2>
                    <form method="POST" name="frm_emp" id="frm_emp">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="firstname" id="firstname" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lastname" id="lastname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Contact number</label>
                                    <input class="input--style-4" type="text" name="contactno" id="contactno" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="dob" id="dob" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-4">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address" id="address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="city" id="city" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Postal Code</label>
                                    <input class="input--style-4" type="number" name="code" id="code" required>
                                </div>

                                <div class="input-group">
                                    <label class="label">Country</label>
                                    <input class="input--style-4" type="text" name="country" id="country" required>
                                </div>
                            </div>
                            <div class="row row-space" style="border:1px solid lightgrey ;" id="div_skills_0">
                                <div class=" col-2 ">
                                    <div class="input-group ">
                                        <label class="label ">Skill</label>
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

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        var counter = 0;
        $(function() {

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

            });


        }); //DOC READY
    </script>

</body>

</html>