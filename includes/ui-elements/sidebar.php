<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 2/20/2019
 * Time: 11:50 PM
 */
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo BASE_URL; ?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="<?php echo BASE_URL; ?>index.php">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            <li>
                <a href="<?php echo BASE_URL; ?>data-table.php">
                    <i class="fa fa-table"></i> <span>Tables</span>
                </a>
            </li>

            <!-- Events -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Events</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL; ?>extras/invoice.php"><i class="fa fa-circle-o"></i> Create</a></li>
                    <li><a href="<?php echo BASE_URL; ?>extras/lockscreen.php"><i class="fa fa-circle-o"></i> View</a></li>
                </ul>
            </li> <!-- End of Events -->

            <!-- Extras -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Extras</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo BASE_URL; ?>extras/invoice.php"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="<?php echo BASE_URL; ?>extras/lockscreen.php"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                </ul>
            </li> <!-- End of Extras -->
        </ul> <!-- /.sidebar-menu -->
    </section> <!-- /.sidebar -->
</aside>
