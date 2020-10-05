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

<?php
//load_data_select.php
$connect = mysqli_connect("localhost", "root", "", "hms");
function fill_brand($connect)
{
    $output = '';
    $sql = "SELECT * FROM medicine";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["username"] . '">' . $row["username"] . '</option>';
    }
    return $output;

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
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="admin-dashboard.php"><img src="assets/img/logo.png" alt="not found"
                                                                    width="230px" height="60px"></a>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="dark-blue-text"><i
                                class="fa fa-bars fa-1x"></i></span>
            </button>

            <div id="sideNav" href="">
                <i class="fa fa-bars icon"></i>
            </div>
        </div>

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#" style="text-decoration: none;color: inherit;"><i
                                    class="fa fa-user fa-fw"></i> <?php if (isset($_SESSION['username'])) : ?>
                                <?php echo $_SESSION['username']; ?><?php endif ?></a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>

            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="laboratory-dashboard.php"><i class="fa fa-dashboard"></i> Home</a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-desktop"></i> UI Elements</a>
                </li> -->
                <li>
                    <a href="view-appointment.php"><i class="fa fa-sitemap"></i> View All OPD Appointment</a>
                </li>

                <li>
                    <a class="active-menu" href="#"><i class="fa fa-sitemap"></i> Laboratory<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="active-menu" href="add-laboratory.php">Add Laboratory</a>
                        </li>
                        <li>
                            <a href="view-laboratory.php">View All Laboratory</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="view-schedule.php"><i class="fa fa-sitemap"></i>View Duty Schedule</a>
                </li>

            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Laboratory Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Laboratory</a></li>
                <li class="active">Add Laboratory</li>
            </ol>
        </div>


        <div class="container c1" style="margin-bottom: 120px;">
            <form action="add-laboratory.php" method="POST">
                <?php include('errors.php'); ?>
                <div class="form-group text-center heading1">
                    <h1>Add Laboratory</h1>
                </div>
                <div class="form-group col-md-12">
                    <label for="patient">Select Patient Name:</label>
                    <select class="form-control" name="patient" id="patient">
                        <option value="">Show All Patient</option>
                        <?php echo fill_brand($connect); ?>
                    </select>

                </div>

                <div class="form-group col-md-12">
                    <label for="depart">Enter the date :</label>
                    <input class="form-control" name="date" type="text" id="datepicker" placeholder="select the date">
                </div>

                <div class="form-group col-md-12">
                    <label for="urine"> Urine:</label>
                    <input type="text" class="form-control" id="urine" placeholder="Urine" name="urine">
                </div>

                <div class="form-group col-md-4">
                    <label for="blood_group">Blood Group</label>
                    <select class="form-control" name="blood_group" id="blood_group">
                        <option selected>None</option>
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>O</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="sickle_cell">Sickle Cell</label>
                    <select class="form-control" name="sickle_cell" id="sickle_cell">
                        <option selected>None</option>
                        <option>AA</option>
                        <option>AS</option>
                        <option>SS</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="hiv_aids">HIV / AIDS</label>
                    <select class="form-control" name="hiv_aids" id="hiv_aids">
                        <option selected>None</option>
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="diabetes">Diabetes</label>
                    <select class="form-control" name="diabetes" id="diabetes">
                        <option selected>None</option>
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="malaria">Malaria</label>
                    <select class="form-control" name="malaria" id="malaria">
                        <option selected>None</option>
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="diarrhoea">Diarrhoea</label>
                    <select class="form-control" name="diarrhoea" id="diarrhoea">
                        <option selected>None</option>
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="cholera">Cholera</label>
                    <select class="form-control" name="cholera" id="cholera">
                        <option selected>None</option>
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                </div>

                <button type="submit" name="reg_lab" class="button">Add Laboratory</button>
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