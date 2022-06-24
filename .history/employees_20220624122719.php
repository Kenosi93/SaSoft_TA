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
    <!-- Colorbox for iframes -->
    <link rel="stylesheet" type="text/css" href="vendor/colorbox/colorbox.css">

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
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <!-- navigation menu -->
            <ul id="ulid">
                <li id="liid"><a href="index.php">Home</a></li>
                <li id="liid"><a href="addemp.php">Add Employee</a></li>
                <li id="liid"><a href="index.php#callEdit">Edit Employee</a></li>
                <li id="liid"><a class="active" href="employees.php">Search Employee</a></li>
            </ul>
            </br>
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
        </br>
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
    <!-- Colorbox for iframes -->
    <script type="text/javascript" src="vendor/colorbox/jquery.colorbox-min.js"></script>
    <!-- Main JS-->
    <script src="js/global.js "></script>

    <script>
        var counter = 0;
        var url;
        $(function() {

            // Determines wich fields will be used to seach and display the field.
            $("#searchby").on('change', function() {

                $("#div_fs").hide();
                $("#div_ls").hide();
                $("#div_em").hide();

                clearFields();
                $.noty.closeAll();

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

            // Builds the url for the search according to what was selected in the search-by select
            // Performs function to build the datagrid
            $('#btnSearch').click(function() {

                if ($("#searchby").val() != null) {

                    url = 'controllers/getdata.php?';

                    switch ($("#searchby").val()) {

                        case 'F':
                            url += '_FUNCTION=GetEmployeeByFirstName' + '&firstname=' + $('#firstname').val();
                            break;
                        case 'L':
                            url += '_FUNCTION=GetEmployeeByLastName' + '&lastname=' + $('#lastname').val();
                            break;
                        case 'E':
                            url += '_FUNCTION=GetEmployeeByEmail' + '&email=' + $('#email').val();
                            break;
                        case 'A':
                            url += '_FUNCTION=GetAllEmployees';
                            break;
                        default:
                            break;
                    }
                    $.noty.closeAll();
                    DataGrid();
                }

            });


        }); //DOC READY

        // Datagrid to show results. Jquery easyui datagrid used
        function DataGrid() {

            $('#divDG').empty().append("<table id='DG'></table>");

            $('#DG').datagrid({
                multiSelect: true,
                fitColumns: true,
                striped: true,
                pagination: true,
                rownumbers: true,
                showFooter: true,
                pageSize: 5,
                remoteSort: false,
                multiSort: true,
                pageList: [5, 10, 15, 20, 25],
                nowrap: true,
                width: '99%',
                height: window.innerHeight - 30,
                url: url,
                columns: [
                    [{
                            field: 'employeeID',
                            halign: 'center',
                            align: 'center',
                            title: 'Employee ID',
                            width: "08%",
                        },

                        {
                            field: 'firstname',
                            halign: 'center',
                            align: 'center',
                            title: 'First Name',
                            width: "12%",
                        },
                        {
                            field: 'lastname',
                            halign: 'center',
                            align: 'center',
                            title: 'Last Name',
                            width: "11%",

                        },
                        {
                            field: 'dob',
                            halign: 'center',
                            align: 'center',
                            title: 'Date of Birth',
                            width: "09%",
                        },
                        {
                            field: 'contactdeatils',
                            halign: 'center',
                            align: 'center',
                            title: 'contact deatils',
                            width: "12%",
                        },
                        {
                            field: 'address',
                            halign: 'center',
                            align: 'center',
                            title: 'Address',
                            width: "19%",
                        },

                        {
                            field: 'skills',
                            halign: 'center',
                            align: 'center',
                            title: 'Skills',
                            width: "08%",
                        },
                        {
                            field: 'experience',
                            halign: 'center',
                            align: 'center',
                            title: 'Yrs Experience',
                            width: "09%",
                        },

                        {
                            field: 'rating',
                            halign: 'center',
                            align: 'center',
                            title: 'Sen rating',
                            width: "07%",
                        },

                        {
                            field: 'action',
                            title: 'Actions',
                            width: '07%',
                            align: 'center',
                            formatter: function(value, row, index) {
                                if (typeof row.employeeID != 'undefined') {
                                    //Build buttons to delete and edit employees
                                    var buttons = '';

                                    buttons += ' <button align="center" onclick="EditEmployee(\'' + row.employeeID + '\')" title="Delete user"><span class="fa fa-pencil"></span></button>';

                                    buttons += ' <button align="center" onclick="DeleteEmployee(\'' + row.employeeID + '\')" title="Delete user"><span class="fa fa-times"></span></button>';

                                    return buttons;

                                }

                            },
                        }
                    ]
                ],
                onLoadError: function(data) {
                    noty({
                        text: 'LOAD ERROR CONTACT IT',
                        type: "error",
                        layout: "topCenter",
                        callback: {
                            onClose: function() {},
                        },

                    });


                },
                onLoadSuccess: function(data) {
                    console.log(data);
                    if (data.rows.length == 0) {
                        noty({
                            text: 'No records found',
                            type: "error",
                            layout: "topCenter"
                        });
                        $('#divDG').hide();
                    } else {
                        if (typeof data.rows[0] != 'undefined' && typeof data.rows[0].Error != 'undefined') {

                            noty({
                                text: data.rows[0].Error,
                                type: "error",
                                layout: "topCenter"
                            })
                            $('#divDG').hide();
                        }
                    }
                },


            });
            $('#divDG').show();
            $('#DG').datagrid('enableFilter');
        }
        // Opens a colorbox to open the edit employee page, employee ID is required
        function EditEmployee(id) {
            $.colorbox({
                width: '96%',
                height: window.innerHeight - 50,
                iframe: true,
                fastIframe: false,
                escKey: false,
                overlayClose: false,
                fixed: true,
                href: 'editemp.php?empid=' + id,
                onClosed: function() {
                    // refresh datagrid when colorbox closes
                    $('#DG').datagrid("reload");
                }
            });
        }

        //delete employee
        function DeleteEmployee(id) {
            //Open a confirmation noty
            //Yes deletes employe
            //No closes the noty
            noty({
                text: 'Are you sure you want to delete this employee? ',
                layout: 'top',
                theme: 'relax',
                type: 'alert',
                buttons: [{
                        addClass: 'btn btn-danger',
                        text: '<p style="color:red">Yes</p>',
                        onClick: function($noty) {

                            $.ajax({
                                url: 'controllers/storeData.php',
                                async: false,
                                dataType: 'json',
                                method: 'POST',
                                data: {
                                    _FUNCTION: 'deleteEmployee',
                                    id: id,
                                }
                            }).done(function(data) {
                                $noty.close();
                                if (typeof data['Error'] == 'undefined') {
                                    noty({
                                        text: data['Results'],
                                        type: "success",
                                        layout: "topCenter",
                                        callback: {
                                            onClose: function() {
                                                $('#DG').datagrid("reload");
                                            },
                                        },
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
                    },
                    {
                        addClass: 'btn btn-warning',
                        text: '<p style="color:orange">Cancel</p>',
                        onClick: function($noty) {
                            $noty.close();
                        }
                    }
                ]
            });

        }

        //Clear form fields
        function clearFields() {

            $("#firstname").val('');
            $("#lastname").val('');
            $("#email").val('');
        }
    </script>

</body>

</html>