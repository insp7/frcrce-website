<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 2/21/2019
 * Time: 12:41 PM
 */
?>

<!DOCTYPE html>
<html>

<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '');

    if(session_status() == PHP_SESSION_NONE)
        session_start();
?>
<!--END OF INIT-->

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
                    User Profile
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">User profile</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo BASE_URL; ?>assets/img/user4-128x128.jpg" alt="User profile picture">

                                <h3 class="profile-username text-center">Nina Mcintire</h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="pull-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="pull-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="pull-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active" id="li-for-activity"><a href="#activity" data-toggle="tab">Activity</a></li>
                                <li id="li-for-timeline"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                                <li id="li-for-settings"><a href="#settings" data-toggle="tab">Settings</a></li>
                                <?php
                                    if(isset($_SESSION['staff_id'])) {
                                        echo '<li id="li-for-events-under-this-staff"><a href="#events-under-this-staff" data-toggle="tab">Moderate Events</a></li>';
                                    }
                                ?>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?php echo BASE_URL; ?>assets/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="pull-right btn-box-tool">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>
                                        <ul class="list-inline">
                                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right">
                                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                                    (5)</a></li>
                                        </ul>

                                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?php echo BASE_URL; ?>assets/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="form-group margin-bottom-none">
                                                <div class="col-sm-9">
                                                    <input class="form-control input-sm" placeholder="Response">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?php echo BASE_URL; ?>assets/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                            </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="<?php echo BASE_URL; ?>assets/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?php echo BASE_URL; ?>assets/img/photo2.png" alt="Photo">
                                                        <br>
                                                        <img class="img-responsive" src="<?php echo BASE_URL; ?>assets/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?php echo BASE_URL; ?>assets/img/photo4.jpg" alt="Photo">
                                                        <br>
                                                        <img class="img-responsive" src="<?php echo BASE_URL; ?>assets/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <ul class="list-inline">
                                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right">
                                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                                    (5)</a></li>
                                        </ul>

                                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <ul class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <li class="time-label">
                                            <span class="bg-red">
                                                10 Feb. 2014
                                            </span>
                                        </li>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-envelope bg-blue"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Read more</a>
                                                    <a class="btn btn-danger btn-xs">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->

                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-user bg-aqua"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                                </h3>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->

                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-comments bg-yellow"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->

                                        <!-- timeline time label -->
                                        <li class="time-label">
                                            <span class="bg-green">
                                                3 Jan. 2014
                                            </span>
                                        </li>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <li>
                                            <i class="fa fa-clock-o bg-gray"></i>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <?php
                                    if(isset($_SESSION['staff_id'])) {

                                        require_once(BASE_URL . 'classes/EventCoordinators.php');
                                        require_once(BASE_URL . 'classes/Events.php');

                                        $event_coordinators = new EventCoordinators();
                                        $event_coordinators_result = $event_coordinators->getEventIdByCoordinatorId($_SESSION['staff_id']);

                                        $events = new Events();
                                        ?>

                                        <div class="tab-pane" id="events-under-this-staff">
                                            <?php
                                                foreach($event_coordinators_result as $event_id) {

                                                    $events_result_set = $events->getEventDetailsById($event_id['event_id']);

                                                    ?>
                                                    <!-- The timeline -->
                                                    <ul class="timeline timeline-inverse">
                                                        <!-- timeline item -->
                                                        <li>
<!--                                                            <i class="fa fa-envelope bg-blue"></i>-->

                                                            <div class="timeline-item">
                                                                <span class="time"><i
                                                                            class="fa fa-clock-o"></i> <?php echo $events_result_set['created_at']; ?></span>

                                                                <h3 class="timeline-header"><?php echo $events_result_set['event_name']; ?></h3>

                                                                <div class="timeline-body">
                                                                    <?php echo $events_result_set['event_details']; ?>
                                                                </div>
                                                                <div class="timeline-footer">
                                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" name="fill-event-details-modal" id="<?php echo $event_id['event_id']; ?>" data-target="#edit_event_modal">Update Details</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- END timeline item -->
                                                    </ul>
                                                    <!-- /.timeline -->

                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <!--EDIT BUTTON MODAL-->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="edit_event_modal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Fill Remaining Event Details</h4>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <form method="POST">
                                                                <div class="form-body">
                                                                    <div class="form-group clearfix">
                                                                        <div class="col-md-9">
                                                                            <input type="hidden" id="edit_event_id" name="event_id" class="form-control" placeholder="Event ID" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">Address
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">Event type
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="event_type" name="event_type" class="form-control" placeholder="Event type" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">Institute funding
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" id="institute_funding" name="institute_funding" class="form-control" placeholder="Institute funding" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">Sponsor funding
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" id="sponsor_funding" name="sponsor_funding" class="form-control" placeholder="Sponsor funding" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">Event Expenditure
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" id="event_expenditure" name="event_expenditure" class="form-control" placeholder="Event Expenditure" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">start_date
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="date" id="start_date" name="start_date" class="form-control" placeholder="start_date" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">end_date
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="date" id="end_date" name="end_date" class="form-control" placeholder="end_date" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">internal_participants
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" id="internal_participants_count" name="internal_participants_count" class="form-control" placeholder="internal_participants_count" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group clearfix">
                                                                        <label class="control-label col-md-3">external_participants
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" id="external_participants_count" name="external_participants_count" class="form-control" placeholder="external_participants_count" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                        <button id="update_event" name="update_event" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                                <!-- End of .form-body -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!--END OF EDIT BUTTON MODAL-->

                                        <?php
                                    }
                                ?>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

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

    <!-- SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
        $('[name="fill-event-details-modal"]').on('click', function () {
            $id = $(this).attr('id');
            $("#edit_event_id").val($id);

            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"http://localhost/frcrce/admin/scripts/events/fetch.php",
                method: "POST",
                data: {event_id:$id},
                dataType: "json",
                success: function(data) {
                    $('#address').val(data.address);
                    $('#event_type').val(data.event_type);
                    $('#institute_funding').val(data.institute_funding);
                    $('#sponsor_funding').val(data.sponsor_funding);
                    $('#event_expenditure').val(data.event_expenditure);
                    $('#start_date').val(data.start_date);
                    $('#end_date').val(data.end_date);
                    $('#internal_participants_count').val(data.internal_participants_count);
                    $('#external_participants_count').val(data.external_participants_count);

                    $("#edit_event_modal").modal('show');

                    $('#update_event').on('click', function (e) {
                        e.preventDefault();

                        // Take the updated values
                        data.address = $('#address').val();
                        data.event_type = $('#event_type').val();
                        data.institute_funding = $('#institute_funding').val();
                        data.sponsor_funding = $('#sponsor_funding').val();
                        data.event_expenditure = $('#event_expenditure').val();
                        data.start_date = $('#start_date').val();
                        data.end_date = $('#end_date').val();
                        data.internal_participants_count = $('#internal_participants_count').val();
                        data.external_participants_count = $('#external_participants_count').val();

                        $.ajax({
                            url: "http://localhost/frcrce/admin/scripts/events/update.php",
                            method: "POST",
                            data: 'json_string_for_event_updation=' + JSON.stringify(data),
                            dataType: "text",
                            success: function (response) {
                                if(response === "true") {
                                    // Do nothing as of now!
                                    // $('#edit_event_modal').modal('hide');
                                    // // window.location.pathname = 'frcrce/profile.php'; // Later remove this refresh
                                    // // $('#li-for-events-under-this-staff').addClass('active');
                                    // $('body').removeClass('modal-open');
                                    // $('.modal-backdrop').remove();
                                } else {
                                    alert(response);
                                    console.log(response);
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>