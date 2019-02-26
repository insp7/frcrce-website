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
    define('BASE_URL', '');
?>
<!--END OF INIT-->

<!DOCTYPE html>
<html lang="en">

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    include_once(BASE_URL . 'includes/ui-elements/header.php');
?> <!-- End of HEADER -->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- NAVIGATION -->
        <?php
            include_once(BASE_URL . 'includes/ui-elements/navigation.php');
        ?> <!-- End of NAVIGATION -->

        <!-- SIDEBAR -->
        <?php
            include_once(BASE_URL . 'includes/ui-elements/sidebar.php');
        ?> <!-- End of SIDEBAR -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Version 2.0</small>
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

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- FOOTER -->
        <?php
            include_once(BASE_URL . 'includes/ui-elements/footer.php');
        ?> <!-- End of FOOTER -->

        <!-- CONTROL-SIDEBAR -->
        <?php
            include_once('includes/ui-elements/control-sidebar.php');
        ?>
        <!-- End of CONTROL-SIDEBAR -->

    </div>
    <!-- ./wrapper -->


    <!-- Importing common scripts first -->
    <!-- SCRIPTS -->
    <?php
        include_once(BASE_URL . 'includes/ui-elements/scripts.php');
    ?> <!-- End of SCRIPTS -->

    <!-- Scripts Specific to this page -->
</body>
</html>

