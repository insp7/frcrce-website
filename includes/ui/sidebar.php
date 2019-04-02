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

                                                                                                           <!-- News -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Staff</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="admin/add-staff.php"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="admin/manage-staff.php"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li> <!-- End of News -->
                        <?php
                    } else if($_SESSION['role'] === 'teacher') {
                        ?>
                        <!-- Events -->
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-newspaper-o"></i> <span>Publications</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="teacher/add-publication.php"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="teacher/manage-publications.php"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li>
                        <!-- End of Events -->

                        <!-- News -->
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-book"></i> <span>Published Books</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="teacher/add-published-book"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="teaher/create-published-books"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li> <!-- End of News -->

                              <!-- News -->
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-line-chart"></i> <span>Research Projects</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="admin/add-research-project.php"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="admin/manage-research-project.php"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li> <!-- End of News -->

                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-sticky-note"></i> <span>IPR</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="teacher/add-ipr.php"><i class="fa fa-circle-o"></i> Create</a></li>
                                <li><a href="teacher/manage-ipr.php"><i class="fa fa-circle-o"></i> View</a></li>
                            </ul>
                        </li> <!-- End of News -->
                        <?php
                    }
                }
            ?>
        </ul> <!-- /.sidebar-menu -->
    </section> <!-- /.sidebar -->
</aside>
