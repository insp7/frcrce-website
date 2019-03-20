<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/15/2019
 * Time: 8:19 PM
 */
?>

<!DOCTYPE html>
<html>

<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '../../../'); // Path to root directory.

    if(session_status() == PHP_SESSION_NONE)
        session_start();

    require_once(BASE_URL . "classes/GeneralFunctions.php");
?>
<!--END OF INIT-->

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    require_once(BASE_URL . 'includes/ui-elements/header.php');
?> <!-- End of HEADER -->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- NAVIGATION -->
        <?php
            require_once(BASE_URL . 'includes/ui-elements/navigation.php');
        ?> <!-- End of NAVIGATION -->

        <!-- SIDEBAR -->
        <?php
            require_once(BASE_URL . 'includes/ui-elements/sidebar.php');
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
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box-lol">
                    <div class="box-header-lol">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body-lol">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="view-events" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Event Name</th>
                                    <th>Event Details</th>
                                    <th>Event Coordinator</th>
                                    <th>Address</th>
                                    <th>Event Type</th>
                                    <th>Institute Funding</th>
                                    <th>Sponsor Funding</th>
                                    <th>Event Expenditure</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Internal Participants Count</th>
                                    <th>External Participants Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $result_set = GeneralFunctions::select("*", "events", array("1" => 1));
                                    while($row = mysqli_fetch_assoc($result_set)){
                                        extract($row);
                                    ?>
                                    <tr>
                                        <td><?php echo $event_name; ?></td>
                                        <td><?php echo $event_details; ?></td>
                                        <td>
                                            Event coordinator
                                        </td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $event_type; ?></td>
                                        <td><?php echo $institute_funding; ?></td>
                                        <td><?php echo $sponsor_funding; ?></td>
                                        <td><?php echo $event_expenditure; ?></td>
                                        <td><?php echo $start_date; ?></td>
                                        <td><?php echo $end_date; ?></td>
                                        <td><?php echo $internal_participants_count; ?></td>
                                        <td><?php echo $external_participants_count; ?></td>
                                    </tr>
                                    <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- FOOTER -->
        <?php
            require_once(BASE_URL . 'includes/ui-elements/footer.php');
        ?> <!-- End of FOOTER -->

    </div>
    <!-- ./wrapper -->

    <!-- SCRIPTS -->

    <!-- jquery.min.js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap.js -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>

    <!-- jquery Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script

    <!-- My scripts -->
    <script src="assets/js/scripts.js"></script>


</body>
</html>

