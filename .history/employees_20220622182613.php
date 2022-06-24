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
                    <div class="row row-space">
                        <div class="col-2">
                            <label class="label ">Search by:</label>
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
                                layout: "topCenter"
                            });
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
    </script>

</body>

</html>