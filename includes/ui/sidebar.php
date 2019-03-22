<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 2/20/2019
 * Time: 11:50 PM
 */

    if(session_status() == PHP_SESSION_NONE)
        session_start();
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php
                        if(isset($_SESSION['staff_name']))
                            echo $_SESSION['staff_name'] ;
                        else if(isset($_SESSION['student_name']))
                            echo $_SESSION['student_name'] ;
                    ?>
                </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="index.php">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            <?php
                if(isset($_SESSION['role'])) {
                    if($_SESSION['role'] === 'admin') {
                        ?>
                        <!-- Events -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Events</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="admin/events.php?q=add"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="admin/events.php"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li>
                        <!-- End of Events -->

                        <!-- News -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>News</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="admin/news.php?q=add"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="admin/news.php"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li> <!-- End of News -->
                        <?php
                    }
                }
            ?>
        </ul> <!-- /.sidebar-menu -->
    </section> <!-- /.sidebar -->
</aside>
