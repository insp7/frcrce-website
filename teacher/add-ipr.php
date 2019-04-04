<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 5:58 AM
 */

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
            include_once(BASE_URL . 'includes/ui/sidebar.php');
        ?> <!-- End of SIDEBAR -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    IPR
                    <small>Add</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> IPR</a></li>
                    <li class="active">Add</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <form method="post" id="add-ipr-form">

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="date" id="year" name="year" class="form-control" placeholder="Year">
                    </div>

                    <div class="form-group">
                        <label for="patents_published_count">Patents Published</label>
                        <input type="number" id="patents_published_count" name="patents_published_count" class="form-control" placeholder="No. of Patents Published">
                    </div>

                    <div class="form-group">
                        <label for="patents_granted_count">Patents Granted</label>
                        <input type="text" id="patents_granted_count" name="patents_granted_count" class="form-control" placeholder="No. of Patents Granted">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-instagram" name="add-ipr" id="add-ipr">Add IPR</button>
                    </div>
                </form>
                <!-- /.add-ipr-form -->
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


    <!-- toastr -->
    <script src="node_modules/toastr/build/toastr.min.js"></script>

    <!-- custom js -->
    <script src="assets/pages/teacher/add-ipr.js"></script>
</body>
</html>