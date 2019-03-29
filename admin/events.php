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

    require_once(BASE_URL . 'authenticate.php');
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
            include_once(BASE_URL . 'includes/ui/sidebar.php');
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
                    if(isset($_GET['q'])) {
                        $q = $_GET['q'];
                    }

                    if(intval($q)) {
                        include_once('includes/manage-event-images.php');
                    } else {
                        switch ($q) {
                            case 'add':
                                include_once('includes/events/create-event.php');
                                break;

                            default:
                                include_once('includes/events/manage-events.php');
                                break;
                        }
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

    <!-- select2.js -->
    <script src="node_modules/select2/dist/js/select2.min.js"></script>

    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>

    <!--Manage Script-->
    <script src="assets/pages/admin/manage-events.js"></script>

    <!-- My Scripts -->
    <script src="assets/js/scripts.js"></script>

    <script>
        // For select2 plugin
        $(document).ready(function() {
            $('#event_coordinator').select2();
        });
    </script>
    <!-- End of Plugins and scripts required by this view-->
</body>
</html>
