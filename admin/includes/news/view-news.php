<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/10/2019
 * Time: 8:02 PM
 */
?>
<!DOCTYPE html>
<html>

<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '../../../'); // Path to root directory.

    require_once(BASE_URL . "classes/GeneralFunctions.php");

    if(session_status() == PHP_SESSION_NONE)
        session_start();
?>
<!--END OF INIT-->

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    require_once(BASE_URL . 'includes/ui/header.php');
?> <!-- End of HEADER -->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- NAVIGATION -->
        <?php
            require_once(BASE_URL . 'includes/ui/navigation.php');
        ?> <!-- End of NAVIGATION -->

        <!-- SIDEBAR -->
        <?php
            require_once(BASE_URL . 'includes/ui/sidebar.php');
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
                    <li><a href="admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">View news</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="table-responsive box-body">
                        <table class="table table-bordered table-hover table-condensed" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>News Title</th>
                                <th>News Description</th>
                                <th>News Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $result_set = GeneralFunctions::select("*", "news_feed", array(1 => 1));

                                while($row = mysqli_fetch_assoc($result_set)) {
                                    extract($row);
                                    ?>
                                    <tr>
                                        <td><?php echo $title ;?></td>
                                        <td><?php echo $description ;?></td>
                                        <td> <?php echo "TODO : Show Images" ;?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ./box-body -->
                </div>
                <!-- ./box -->
            </section>
            <!-- ./content -->
        </div>
        <!-- ./content-wrapper -->

        <!-- FOOTER -->
        <?php
            require_once(BASE_URL . 'includes/ui/footer.php');
        ?> <!-- End of FOOTER -->

    </div>
    <!-- ./wrapper -->

    <!-- SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="<?php echo BASE_URL; ?>node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo BASE_URL; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- My scripts -->
    <script src="<?php echo BASE_URL; ?>assets/js/scripts.js"></script>
</body>
</html>
