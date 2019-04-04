<!DOCTYPE html>
<html>

<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '');
?>
<!--END OF INIT-->

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    include_once(BASE_URL . 'includes/ui/header.php');
?> <!-- End of HEADER -->

<!-- Setting Session Variables -->
<?php
    require_once('classes/Students.php');
    require_once('classes/Staff.php');

    if(session_status() == PHP_SESSION_NONE)
        session_start();

    if(isset($_POST['student_roll_no'])) {
        $roll_no = intval($_POST['student_roll_no']);

        $students = new Students();
        $result_set = $students->getStudentDetailsByRollNo($roll_no);
        extract($result_set);

        $_SESSION['roll_no'] = $roll_no;
        $_SESSION['student_id'] = $student_id;
        $_SESSION['student_name'] = $first_name . " " . $last_name;

        header("Location: index.php");
    } else if(isset($_POST['admin_email'])) {
        session_unset();

        $email = $_POST['admin_email'];

        $staff = new Staff();
        $result_set = $staff->getStaffDetailsByEmail($email);
        extract($result_set);

        $_SESSION['staff_id'] = $staff_id;
        $_SESSION['staff_name'] = $first_name . " " . $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        if($_SESSION['role'] == 'admin')
            header("Location: admin/index.php");
        else {
            if ($staff->isFullyRegistered($staff_id))
                header("Location: teacher/index.php");
            else
                header("Location: teacher/fill-remaning-details.php");
        }
    }
?>


<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index.php"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in as Student</p>

            <form method="post" id="student_login_form">
                <div class="form-group has-feedback">
                    <input id="student_roll_no" name="student_roll_no" class="form-control" placeholder="Your Roll No">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div id="student_roll_no_error" class="text-danger small"></div>
                </div>
                <div class="form-group has-feedback">
                    <input id="student_password" name="student_password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div id="student_password_error" class="text-danger small"></div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <!-- <label>
                                <input type="checkbox"> Remember Me
                            </label> -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button class="btn btn-primary btn-block btn-flat" onclick="btnStudentLoginClicked(event);">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <div class="social-auth-links text-center"> -->
            <p class="text-center">- OR -</p>


            <p class="login-box-msg">Sign in as Teacher or Admin</p>

            <form method="post" id="admin_login_form">
                <div class="form-group has-feedback">
                    <input id="admin_email" name="admin_email" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <div id="admin_email_error" class="text-danger small"></div>
                </div>
                <div class="form-group has-feedback">
                    <input id="admin_password" name="admin_password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <div id="admin_password_error" class="text-danger small"></div>
                </div>
                <div class="row">
                    <div class="col-xs-8"></div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button class="btn btn-primary btn-block btn-flat" onclick="btnAdminLoginClicked(event);">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in As Admin</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a> -->
            <!-- </div> -->
            <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="register.php" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="assets/js/scripts.js"></script>
</body>
</html>
