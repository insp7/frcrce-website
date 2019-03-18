<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 2/24/2019
 * Time: 2:47 PM
 */
?>

<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '../');
?>
<!--END OF INIT-->

<!DOCTYPE html>
<html lang="en">

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    include_once(BASE_URL . 'includes/ui/header.php');
?> <!-- End of HEADER -->


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- NAVIGATION -->
        <?php
            include_once(BASE_URL . 'includes/ui/navigation.php');
        ?> <!-- End of NAVIGATION -->

        <!-- SIDEBAR -->
        <?php
            include_once('includes/ui/sidebar.php');
        ?> <!-- End of SIDEBAR -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Events
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->

                <?php
                $q = "";
                if(isset($_GET['q'])){
                    $q = $_GET['q'];
                }
                switch ($q)
                {
                    case 'add':
                        include_once("includes/events/add-event.php");
                        break;

                    default:
                        include_once("includes/events/manage-events.php");
                        break;
                }
                ?>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- FOOTER -->
        <?php
            include_once(BASE_URL . 'includes/ui/footer.php');
        ?> <!-- End of FOOTER -->
    </div>
    <!-- ./wrapper -->


    <!-- Plugins and scripts required by this view-->
    <!-- DataTables -->
    <script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="node_modules/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!--Manage Script-->
    <script src="assets/pages/admin/manage-events.js"></script>

    <!-- End of Plugins and scripts required by this view-->
</body>
</html>

