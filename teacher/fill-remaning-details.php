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
?>
<!--END OF INIT-->


<?php
global $database;

if(isset($_POST['remaining-details'])) {
    // Insert into news_feed
    $staff = new Staff();
    $result = $staff->fillRemainingDetails($_POST['first_name'],$_POST['last_name'],$_SESSION['staff_id']);

    header("Location: " . BASE_URL . "teacher/index.php");
}
?>



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
            <form method="post" id="remaining-details-form" >
                <div class="form-group">
                    <label for="email_id">First Name</label>
                    <input id="email_id" name="first_name" class="form-control" placeholder="Email Id">
                </div>
                <div class="form-group">
                    <label for="password">Middle Name</label>
                    <input id="password" name="middle_name" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password">Last Name</label>
                    <input id="password" name="last_name" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password">Contact No</label>
                    <input id="password" name="contact_no" class="form-control" placeholder="Password">
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

<script src="assets/pages/admin/add-staff.js"></script>
</body>
</html>