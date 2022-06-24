<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Employee Management System</title>
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
    <!-- slideshow CSS-->
    <style type="text/css">
        /* slideshow */
        #slideshow {
            position: absolute; //or whatever you need
            display: block;
            top: 0px;
            left: 0px;
        }

        #slideshow img {
            position: absolute;
            opacity: 0;
        }

        /* navigation bar */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #993366;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <!-- SLIDESHOW -->
        <div id="slideshow">
            <img src="assets/1.png">
            <img src="assets/2.png">
            <img src="assets/3.png">
            <img src="assets/4.png">
            <img src="assets/5.png">
            <img src="assets/6.png">
            <img src="assets/7.png">
            <img src="assets/8.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/8.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/8.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/6.png">
            <img src="assets/8.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/8.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/6.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/8.png">
            <img src="assets/6.png">
            <img src="assets/9.png">
            <img src="assets/6.png">
        </div>
        <div class="wrapper wrapper--w680">
            <h2 class="title" align="center">Welcome to SaS EMS</h2>
            <div class="card card-4">
                <div class="card-body">

                    <ul>
                        <li><a class="active" id='a_home' href="index.php">Home</a></li>
                        <li><a href="addemp.php">Add Employee</a></li>
                        <li><a id='a_edit' onclick="editEmp()" href="javascript:void(0);">Edit Employee</a></li>
                        <li><a href="employees.php">Search/Delete/edit</a></li>
                    </ul>
                    </br>
                    <div class="row row-space">
                        <div class="col-2" style="display:none" id="div_em">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15" style="display:none" id="div_btn">
                        <button class="btn btn--radius-2 btn--blue " type="button" id="btnEdit" style="float: right;">Edit</button>
                    </div>



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

    <!-- slideshow js -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
    <script type="text/javascript" src="js/jquery.rotator.js"></script>
    <!-- Main JS-->
    <script src="js/global.js "></script>

    <script>
        $(function() {
            $('#slideshow').rotator(135, 'img');

            $('#btnEdit').click(function() {
                if ($("#email").val() != '') {

                    $.ajax({
                        url: 'controllers/getdata.php',
                        async: false,
                        dataType: 'json',
                        method: 'POST',
                        data: {
                            _FUNCTION: 'GetEmployeeByEmail',
                            email: $("#email").val(),
                        }
                    }).done(function(data) {
                        console.log(data);
                        if (typeof data['Error'] == 'undefined') {
                            $.colorbox({
                                width: '96%',
                                height: window.innerHeight - 50,
                                iframe: true,
                                fastIframe: false,
                                escKey: false,
                                overlayClose: false,
                                fixed: true,
                                href: 'editemp.php?empid=' + data[0]['employeeID'],
                                onClosed: function() {
                                    $("#email").val('');
                                }
                            });


                        } else {
                            noty({
                                text: data['Error'],
                                type: "error",
                                layout: "topCenter"
                            });

                        }
                    }).error(function(data) {
                        noty({
                            text: data,
                            type: "error",
                            layout: "topCenter"
                        });
                    });
                }

            });
        }); //DOC READY

        function editEmp() {
            var ed = document.getElementById("a_edit");
            var ho = document.getElementById("a_home");

            ed.classList.add("active");
            ho.classList.remove("active");

            $("#div_em").show();
            $("#div_btn").show();
        }
    </script>

</body>

</html>