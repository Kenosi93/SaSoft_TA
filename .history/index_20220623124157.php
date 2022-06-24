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
        </div>
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title" align="center">Welcome to SaS EMS</h2>

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
    <script type="text/javascript" src="js/jquery.rotator.js"></script>
    <!-- Main JS-->
    <script src="js/global.js "></script>

    <script>
        $(function() {
            $('#slideshow').rotator(50, 'img');

        }); //DOC READY
    </script>

</body>

</html>