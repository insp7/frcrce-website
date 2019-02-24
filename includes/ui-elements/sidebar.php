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
                <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="includes/users/profile.php">
                    <i class="fa fa-user-o"></i> <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="<?php echo $BASE_URL; ?>includes/sample-data-table.php">
                    <i class="fa fa-table"></i> <span>Tables</span>
                </a>
            </li>

            <!-- User details -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-o"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="includes/users/profile.php">View profile</a></li>
                    <li><a href="includes/users/timeline.php">Timeline</a></li>
                </ul>
            </li> <!-- End of User details -->

            <!-- Extras -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Extras</span>
                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="extras/invoice.php"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="extras/lockscreen.php"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                </ul>
            </li> <!-- End of Extras -->
        </ul> <!-- /.sidebar-menu -->
    </section> <!-- /.sidebar -->
</aside>
