<?php
session_start();

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

                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> Patient Record<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="add-record.php">Record Vital Signs</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> Laboratory<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="view-laboratory.php">View All Laboratory</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="active-menu" href="view-schedule.php"><i class="fa fa-sitemap"></i>View Duty Schedule</a>
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
                <li class="active">View Duty Schedule</li>
            </ol>

        </div>
        <div class="container text-center">
            <h1 class="heading1" style="padding-bottom:20px;">View Duty Schedule</h1>
            <button id="displaydata" class="button" style="margin-bottom:30px;">View Schedule</button>
            <table class="table table-striped table-bordered text-centre">
                <thead>

                <th class="text-center">ID</th>
                <th class="text-center">Username</th>
                <th class="text-center">User-type</th>
                <th class="text-center">Day</th>
                <th class="text-center">Room No</th>
                <th class="text-center">Date</th>
                <th class="text-center">Start Shift Time</th>
                <th class="text-center">End Time</th>


                </thead>
                <tbody id="response">
                </tbody>

            </table>
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
<script>
    $(document).ready(function () {
        $('#displaydata').click(function () {
            $.ajax({
                url: 'rec-member.php',
                type: 'post',
                success: function (responsedata) {
                    $('#response').html(responsedata);
                }
            });
        });
    });
</script>


</body>

</html>