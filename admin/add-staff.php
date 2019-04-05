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

    require_once(BASE_URL . 'classes/Staff.php');
?>
<!--END OF INIT-->


<?php
    global $database;

    if(isset($_POST['add-staff'])) {
        // Insert into news_feed
        $staff = new Staff();
        $result = $staff->insertStaff($_POST['email'], $_POST['password']);

        if($result == false){
            header("Location: " . BASE_URL . "admin/add-staff.php?error=true");
        }else{
            header("Location: " . BASE_URL . "admin/manage-staff.php");
        }



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
            <?php
            if(isset($_GET['error'])) {
                ?>
                <div class="alert alert-danger form-danger" role="alert">
                    <h4>Oh snap!</h4>
                    <p>Email already exists :(</p>
                </div>
                <?php
            }
            ?>

            <form method="post" id="staff-form" data-parsley-validate="">
                <div class="form-group">
                    <label for="email_id">Email id</label>
                    <input type="email" id="email_id" name="email" class="form-control" placeholder="Email Id" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" class="form-control" placeholder="Password"
                           data-parsley-required="true" data-parsley-trigger="change"  data-parsley-minlength="8"
                           data-parsley-required-message="Please enter your new password."
                           data-parsley-uppercase="1"
                           data-parsley-lowercase="1"
                           data-parsley-number="1"
                           data-parsley-special="1">
                </div>
                <div class="form-group">
                    <label for="re_new_password">Re-enter new password</label>
                    <input id="re_new_password" type="password" class="form-control" placeholder="Password"  data-parsley-trigger="change" data-parsley-equalto="#password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-instagram" type="submit" name="add-staff" id="add-staff">Add Staff</button>
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

<script src="assets/pages/admin/add-staff.js"></script>
</body>
</html>