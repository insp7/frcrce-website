<!DOCTYPE html>
<html>

<!-- HEADER -->
<?php
    // Path to root directory
    $ROOT_PATH = '../'; // or $ROOT_PATH = $_SERVER['DOCUMENT_ROOT'] . '/frcrce/'; however this wont work when echoing in scripts.
    require_once($ROOT_PATH . 'includes/ui-elements/header.php');
?> <!-- End of HEADER -->

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="<?php echo $ROOT_PATH; ?>index.php"><b>Admin</b>LTE</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">John Doe</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?php echo $ROOT_PATH; ?>assets/img/user1-128x128.jpg" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="password">

                    <div class="input-group-btn">
                        <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>
        <div class="text-center">
            <a href="<?php echo $ROOT_PATH; ?>login.php">Or sign in as a different user</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright &copy; 2014-2016 <b><a href="https://adminlte.io" class="text-black">Almsaeed Studio</a></b><br>
            All rights reserved
        </div>
    </div>
    <!-- /.center -->

    <!-- Required Scripts -->
    <!-- jQuery 3 -->
    <script src="<?php echo $ROOT_PATH; ?>node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo $ROOT_PATH; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
