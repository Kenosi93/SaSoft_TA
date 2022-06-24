<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Employees</title>
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
    <!-- easyui datagrid -->
    <link rel="stylesheet" type="text/css" href="vendor/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="vendor/easyui/themes/icon.css">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <div class="row row-space">
                        <div class="col-2">
                            <label class="label ">Search by:</label>
                            <div class="rs-select2 js-select-simple select--no-search ">
                                <select name="searchby" id="searchby">
                                    <option disabled="disabled " selected="selected ">Choose option</option>
                                    <option value='F'>First name</option>
                                    <option value='L'>Last name</option>
                                    <option value='E'>Email</option>
                                    <option value='A'>All Employees</option>
                                </select>
                                <div class="select-dropdown "></div>
                            </div>
                        </div>
                        <div class="col-2" style="display:none" id="div_fs">
                            <div class="input-group">
                                <label class="label">first name</label>
                                <input class="input--style-4" type="text" name="firstname" id="firstname">
                            </div>
                        </div>
                        <div class="col-2" style="display:none" id="div_ls">
                            <div class="input-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" type="text" name="lastname" id="lastname">
                            </div>
                        </div>
                        <div class="col-2" style="display:none" id="div_em">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" id="email">
                            </div>
                        </div>

                    </div>
                    <div class="p-t-15 ">
                        <button class="btn btn--radius-2 btn--blue " type="button" id="btnSearch" style="float: right;">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table for easyui datagrid -->
        <div id='divDG' align="center">
            <table id='DG'></table>
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
    <!-- Easyui datagrid -->
    <script type="text/javascript" src="vendor/easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="vendor/easyui/datagrid-filter.js"></script>
    <!-- Main JS-->
    <script src="js/global.js "></script>

    <script>
        var counter = 0;
        $(function() {

            $("#searchby").on('change', function() {

                $("#div_fs").hide();
                $("#div_ls").hide();
                $("#div_em").hide();

                switch ($(this).val()) {

                    case 'F':
                        $("#div_fs").show();
                        break;
                    case 'L':
                        $("#div_ls").show();
                        break;
                    case 'E':
                        $("#div_em").show();
                        break;
                    case 'A':
                        break;
                    default:
                        break;

                }

            });



            $('#btnSearch').click(function() {

            });


        }); //DOC READY


        function DataGrid() {

            $('#divDG').empty().append("<table id='DG'></table>");

            $('#DG').datagrid({
                multiSelect: true,
                fitColumns: true,
                striped: true,
                pagination: true,
                rownumbers: true,
                showFooter: true,
                pageSize: 10,
                remoteSort: false,
                multiSort: true,
                pageList: [10, 20, 30, 40, 50],
                nowrap: true,
                width: '99%',
                height: window.innerHeight - 270,
                url: url,
                columns: [
           

        }
    </script>

</body>

</html>