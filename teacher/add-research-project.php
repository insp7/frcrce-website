<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 8:23 PM
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
                    Research Projects
                    <small>Add</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Research Projects</a></li>
                    <li class="active">Add</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <form method="post" id="add-research-projects-form">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" class="form-control" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="date" id="year" name="year" class="form-control" placeholder="Year">
                </div>

                <div class="form-group">
                    <label for="principal_investigator">Principal Investigator</label>
                    <select name="principal_investigator" id="principal_investigator" class="form-control" style="height: 100%;">
                        <option value="" disabled selected hidden>Please Choose...</option>
                        <?php
                            require_once(BASE_URL . 'classes/Staff.php');

                            $staff = new Staff();
                            $result_set = $staff->getAllStaff();

                            foreach($result_set as $row) {
                                extract($row);
                                ?>
                                <option value="<?php echo $staff_id; ?>">
                                    <?php echo $first_name . ' ' . $last_name ;?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grant_details">Grant Details</label>
                    <input type="text" id="grant_details" name="grant_details" class="form-control" placeholder="Grant Details">
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount">
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" name="add-research-project" id="add-research-project">Add Publication</button>
                </div>
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

    <!-- toastr -->
    <script src="node_modules/toastr/build/toastr.min.js"></script>

    <!-- custom js -->
    <script src="assets/pages/teacher/add-research-project.js"></script>

    <!-- End of Plugins and scripts required by this view-->

</body>
</html>