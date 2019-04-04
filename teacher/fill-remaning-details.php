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
    session_start();
    ob_start();
    define('BASE_URL', '../');
    require_once(BASE_URL . 'classes/Staff.php');

    /*TODO FIELDS TO BE FILLED IN REMAINING DETAILS `first_name`, `middle_name`, `last_name`, `contact_no`, `date_of_birth`, 'password',`gender`, `is_permanent`, `is_teaching`, `pan`, `employee_id`, `is_ad_hoc`, `is_bos_chairman`, `is_bos_member`, `is_staff_selection_committee_member`*/
?>
<!--END OF INIT-->


<?php
    global $database;

    if(isset($_POST['remaining-details'])) {
        // Insert into news_feed
        $staff = new Staff();
        if ($staff->fillRemainingDetails($_SESSION['staff_id']) != false)
            header("Location: " . BASE_URL . "teacher/index.php");
        else
            die('wpw');
    }
?>



<!DOCTYPE html>
<html lang="en">

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    include_once(BASE_URL . 'includes/ui/header.php');
?> <!-- End of HEADER -->
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="assets/plugins/iCheck/all.css">

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

                <div class="alert alert-danger form-danger" role="alert">
                    <h4>Oh snap!</h4>
                    <p>This form seems to be invalid :(</p>
                </div>

                <div class="alert alert-success form-success" role="alert">
                    <h4>Yay!</h4>
                    <p>Everything seems to be ok :)</p>
                </div>

                <form method="post" id="remaining-details-form" data-parsley-validate="">

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" data-parsley-trigger="change" placeholder="First Name" data-parsley-required="true">
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input  type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Middle Name" data-parsley-trigger="change keyup" data-parsley-required="true">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" name="last_name" class="form-control" placeholder="Last Name" data-parsley-required="true" data-parsley-trigger="change">
                    </div>

                    <div class="form-group">
                        <label for="contact_no">Contact No</label>
                        <input type="number" id="contact_no" name="contact_no" class="form-control" placeholder="Number"  data-parsley-trigger="change"
                               data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-minlength-message="exact 10 required" data-parsley-maxlength-message="exact 10 required" data-parsley-required="true">
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label for="dobdatepicker">DOB:</label>
                        <input type="text" class="form-control" id="dobdatepicker" name="date_of_birth" data-parsley-trigger="keyup"  data-parsley-required="true">
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- select -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" data-parsley-trigger="change"  data-parsley-required="true">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="option3">option 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pan">PAN</label>
                        <input type="number" id="pan" name="contact_no" class="form-control" placeholder="Number"  data-parsley-trigger="change"
                               data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-minlength-message="exact 10 required" data-parsley-maxlength-message="exact 10 required" data-parsley-required="true">
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            Are you teaching???
                        </label>
                        <input type="checkbox"  name="is_teaching" value="1">
                    </div>


                    <div id="bos_accordion" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Are you member of bos ???   <label for=""> <input id="bos_check" type="checkbox"  name="is_bos" value="1" onclick="$('#bos_a').click();"></label>
                                    <a data-toggle="collapse" data-parent="#bos_accordion" href="#bos_collapse" id="bos_a"></a>
                                </h4>
                            </div>
                            <div id="bos_collapse" class="panel-collapse collapse">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-instagram" type="submit" name="remaining-details">Submit</button>
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

    <script src="node_modules/parsleyjs/dist/parsley.min.js"></script>

    <!-- bootstrap datepicker -->
    <script src="node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>

    <script src="assets/pages/teacher/fill-remaning-details.js"></script>
</body>
</html>