<?php include('server.php') ?>
<?php

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>

<head>
    <link rel="icon" href="assets/img/logo.png" type="images/png" sizes="16x16">

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="" name="description"/>
    <meta content="webthemez" name="author"/>
    <title>Laboratory Panel</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <!-- Custom Styles-->
    <link href="assets/css/add.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery-1.12.0.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery.timepicker.css">

</head>

<body>
<div id="wrapper">

    <?php include('_nav.php') ?>

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">Laboratory Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="#">Laboratory</a></li>
                <li class="active">Add Record</li>
            </ol>
        </div>

        <div class="container c1" style="margin-bottom: 120px;">
            <form action="add-laboratory.php" method="POST">
                <?php include('errors.php'); ?>
                <div class="form-group text-center heading1">
                    <h1>Record Vital Signs</h1>
                </div>
                <div class="form-group">
                    <label for="patient">Select Patient Name:</label>
                    <select class="form-control" name="brand" id="patient">
                        <option value="">Show All Patient</option>
                        <?php echo fill_brand($connect); ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="temp"> Temperature (&deg;C):</label>
                    <input type="text" class="form-control" id="temp" placeholder="Temperature" name="temperature">
                </div>
                <div class="form-group col-md-6">
                    <label for="bp"> Blood Pressure (mmHg):</label>
                    <input type="text" class="form-control" id="bp" placeholder="Blood Pressure" name="pressure">
                </div>
                <div class="form-group col-md-6">
                    <label for="respiratory"> Respiratory Rate (c/min):</label>
                    <input type="text" class="form-control" id="respiratory" placeholder="Respiratory Rate" name="respiratory">
                </div>
                <div class="form-group col-md-6">
                    <label for="pulse"> Pulse Rate (b/min):</label>
                    <input type="text" class="form-control" id="pulse" placeholder="Pulse Rate" name="pulse">
                </div>
                <div class="form-group col-md-6">
                    <label for="height"> Height (m):</label>
                    <input type="text" class="form-control" id="respiratory" placeholder="Height" name="height">
                </div>

                <div class="form-group col-md-6">
                    <label for="weight"> Weight (kg):</label>
                    <input type="text" class="form-control" id="respiratory" placeholder="Weight" name="weight">
                </div>

                <div class="form-group">
                    <label for="weight"> Presenting Complaint:</label>
                    <textarea type="text" class="form-control" id="complaint" rows="5" name="complaint"></textarea>
                </div>

                <button type="submit" name="rec_vitals" class="button">Save Record</button>
            </form>
        </div>


        <div id="page-inner">
            <footer style="text-align: center;">


            </footer>
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src=" assets/js/custom-scripts.js "></script>
<script src="jquerry.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="jquery.timepicker.js"></script>

<script>
    $("#datepicker").datepicker({changeMonth: true, showOtherMonths: true, minDate: 0});

</script>

</body>

</html>