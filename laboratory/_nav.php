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
                <a href="#" class="active-menu"><i class="fa fa-sitemap"></i> Patient Record<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="add-record.php" class="active-menu">Record Vital Signs</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Laboratory<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="view-laboratory.php">View All Laboratory</a></li>
                </ul>
            </li>
            <li>
                <a href="view-schedule.php"><i class="fa fa-sitemap"></i>View Duty Schedule</a>
            </li>

        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->