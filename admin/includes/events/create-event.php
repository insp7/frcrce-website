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
    require_once(BASE_URL . 'classes/GeneralFunctions.php');

    if(session_status() == PHP_SESSION_NONE)
        session_start();
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
                    <li class="active">Create Event</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form method="post" id="event-form">
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input id="event_name" name="event_name" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <label for="event_details">Event Details</label>
                            <textarea name="event_details" id="event_details" class="form-control" cols="30" rows="5" placeholder="Event Details"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_coordinator">Event Coordinator</label>
                            <select name="event_coordinator" id="event_coordinator" class="form-control" multiple="multiple" name="event_coordinators[]">
                                <?php
                                    $result_set = GeneralFunctions::select("staff_id, first_name, last_name", "staff", array(
                                        "1" => 1
                                    ));
                                    while($row = mysqli_fetch_assoc($result_set)) {
                                        extract($row);
                                        ?>
                                        <option value="<?php echo $staff_id; ?>">
                                            <?php echo $first_name.' '.$last_name ;?>
                                        </option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="event_address">Event Address</label>
                            <textarea name="event_address" id="event_address" class="form-control" cols="30" rows="5" placeholder="Event Address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_type">Event Type</label>
                            <input id="event_type" name="event_type" class="form-control" placeholder="Event Type">
                        </div>
                        <div class="form-group">
                            <label for="event_institute_funding">Institute Funding</label>
                            <input id="event_institute_funding" name="event_institute_funding" class="form-control" type="number" placeholder="Institute Funding">
                        </div>
                        <div class="form-group">
                            <label for="event_sponsor_funding">Sponsor Funding</label>
                            <input id="event_sponsor_funding" name="event_sponsor_funding" class="form-control" type="number" placeholder="Sponsor Funding">
                        </div>
                        <div class="form-group">
                            <label for="event_start_date">Event Start Date</label>
                            <input type="date" name="event_start_date" id="event_start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="event_end_date">Event End Date</label>
                            <input type="date" name="event_end_date" id="event_end_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="event_expenditure">Event Expenditure</label>
                            <input id="event_expenditure" name="event_expenditure" class="form-control" type="number" placeholder="Event expenditure">
                        </div>
                        <div class="form-group">
                            <label for="event_internal_participants">Internal Participants Count</label>
                            <input id="event_internal_participants" name="event_internal_participants" class="form-control" type="number" placeholder="Internal Participants Count">
                        </div>
                        <div class="form-group">
                            <label for="event_external_participants">External Participants Count</label>
                            <input id="event_external_participants" name="event_external_participants" class="form-control" type="number" placeholder="External Participants Count">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="create_event" onclick="btnCreateEventClicked(event)">Create Event</button>
                        </div>
                    </form>
                </div>
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

    <!-- Scripts -->

    <!-- jquery.min.js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap.js -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- select2.js -->
    <script src="node_modules/select2/dist/js/select2.min.js"></script>

    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>

    <!-- My scripts -->
    <script src="assets/js/scripts.js"></script>

    <script>
        // For select2 plugin
        $(document).ready(function() {
            $('#event_coordinator').select2();
        });
    </script>

</body>
</html>

