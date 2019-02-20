<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 2/21/2019
 * Time: 12:28 AM
 */
?>

<!DOCTYPE html>
<html>

<!-- HEADER -->
<?php
require_once("includes/ui-elements/header.php");
?> <!-- End of HEADER -->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- NAVIGATION -->
    <?php
    require_once("includes/ui-elements/navigation.php");
    ?> <!-- End of NAVIGATION -->

    <!-- SIDEBAR -->
    <?php
    require_once("includes/ui-elements/sidebar.php");
    ?> <!-- End of SIDEBAR -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                500 Error Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">500 error</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="error-page">
                <h2 class="headline text-red">500</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

                    <p>
                        We will work on fixing that right away.
                        Meanwhile, you may <a href="index.php">return to dashboard</a> or try using the search form.
                    </p>

                    <form class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>
            </div>
            <!-- /.error-page -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- FOOTER -->
    <?php
    require_once("includes/ui-elements/footer.php");
    ?> <!-- End of FOOTER -->

    <!-- CONTROL-SIDEBAR -->
    <?php
    require_once("includes/ui-elements/control-sidebar.php");
    ?> <!-- End of CONTROL-SIDEBAR -->
</div>
<!-- ./wrapper -->

<!-- SCRIPTS -->
<?php
require_once("includes/ui-elements/scripts.php");
?> <!-- End of SCRIPTS -->

</body>
</html>
