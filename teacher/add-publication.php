<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/19/2019
 * Time: 8:44 PM
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
        include_once(BASE_URL . 'includes/ui/sidebar.php');
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
                <li class="active">Add Staff</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!-------------------------
            | Your Page Content Here |
            -------------------------->
            <form method="post" id="add-publication-form" >
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" name="title" class="form-control" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="date" id="year" name="year" class="form-control" placeholder="Year">
                </div>

                <div class="form-group">
                    <label for="journal">Journal</label>
                    <input type="text" id="journal" name="journal" class="form-control" placeholder="Journal">
                </div>

                <!-- checkbox -->
                <div class="form-group">
                    <input type="checkbox" id="is_ugc_approved" name="is_ugc_approved" value="1">
                    <label for="is_ugc_approved">&nbsp;UGC approved</label>
                </div>

                <div class="form-group">
                    <label for="citation">Citation</label>
                    <input type="text" id="citation" name="citation" class="form-control" placeholder="Citation">
                </div>

                <div class="form-group">
                    <button class="btn btn-instagram" name="add-publication" id="add-publication">Add Publication</button>
                </div>
            </form>
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

<script src="assets/pages/teacher/add-publication.js"></script>
</body>
</html>