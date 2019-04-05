<?php
/**
 * Created by PhpStorm.
 * User: Dhananjay
 * Date: 3/31/2019
 * Time: 10:37 AM
 */
?>


<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '../');


    require_once (BASE_URL."classes/Staff.php");
    if(isset($_GET['id'])){
        $staff = new Staff();
        $staff_data = $staff->getStaffDetailsById($_GET['id']);
    }else{
      header("location: manage-staff.php");
    }

?>
<!--END OF INIT-->

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
                    Profiles
                    <small>View</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Profiles</a></li>
                    <li class="active">View</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <p hidden id="hidden_staff_id"><?php echo $_GET['id']; ?></p>

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="assets/img/user4-128x128.jpg" alt="User profile picture">

                                <h3 class="profile-username text-center"><?php echo $staff_data['first_name'] . " " . $staff_data['middle_name']. " " . $staff_data['last_name'];; ?></h3>

                                <p class="text-muted text-center"><?php echo $staff_data['role'];?></p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Posts</b> <a class="pull-right">1,322</a>
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

                                <strong><i class="fa fa-pencil margin-r-5"></i>Committees</strong>

                                <p>
                                    <span class="label label-danger">CSI</span>
                                    <span class="label label-success">ISTE</span>
                                    <span class="label label-info">IEEE</span>
                                    <span class="label label-warning">ACM</span>
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
                                <li class="active"><a href="#details" data-toggle="tab">Personal Details</a></li>
                                <li><a href="#activity" data-toggle="tab">Activity</a></li>
                                <li><a href="#publications" data-toggle="tab">Publications</a></li>
                                <li><a href="#research-projects" data-toggle="tab">Research Projects</a></li>
                            </ul>
                            <div class="tab-content">

                                <div class="active tab-pane" id="details">
                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Employee Id</label>

                                            <div class="col-sm-10">
                                                <input type="number" value="<?php echo $staff_data['employee_id']?>" class="form-control" id="inputName" placeholder="Name" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" value="<?php echo $staff_data['email']?>" class="form-control" id="inputEmail" placeholder="Email" readonly >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_no" class="col-sm-2 control-label">Contact No</label>
                                            <div class="col-sm-10">
                                            <input value="<?php echo $staff_data['contact_no']?>" readonly type="number" id="contact_no" name="contact_no" class="form-control" placeholder="Number"  data-parsley-trigger="change"
                                                   data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-minlength-message="exact 10 required" data-parsley-maxlength-message="exact 10 required" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <!-- Date -->
                                        <div class="form-group">
                                            <label for="dobdatepicker" class="col-sm-2 control-label">DOB:</label>
                                            <div class="col-sm-10">
                                            <input value="<?php echo $staff_data['date_of_birth']?>" readonly type="text" class="form-control" id="dobdatepicker" name="date_of_birth" data-parsley-trigger="keyup"  data-parsley-required="true">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select readonly="" class="form-control" id="gender" name="gender" data-parsley-trigger="change"  data-parsley-required="true">
                                                    <option value="male" <?php if($staff_data['gender']=='m'){echo "selected";}?> >Male</option>
                                                    <option value="female" <?php if($staff_data['gender']=='f'){echo "selected";}?>>Female</option>
                                                    <option value="option3" <?php if($staff_data['gender']=='o'){echo "selected";}?>>option 3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pan" class="col-sm-2 control-label">PAN</label>
                                            <div class="col-sm-10">
                                            <input type="number" value="<?php echo $staff_data['pan']?>" readonly id="pan" name="contact_no" class="form-control" placeholder="Number"  data-parsley-trigger="change"
                                                   data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-minlength-message="exact 10 required" data-parsley-maxlength-message="exact 10 required" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pan" class="col-sm-2 control-label">Teaching</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" readonly <?php if($staff_data['is_teaching']=='1'){echo "checked";}?> >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pan" class="col-sm-2 control-label">Permanent</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" readonly <?php if($staff_data['is_permanent']=='1'){echo "checked";}?> >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger" disabled>Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class=" tab-pane" id="activity">
                                    <?php
                                        if(true) {
                                            ?>

                                            <!--  !-st -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                         src="assets/img/user1-128x128.jpg" alt="user image">
                                                    <span class="username">
                              <a href="#">Jonathan Burke Jr.</a>
                              <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
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
                                                    <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-share margin-r-5"></i> Share</a></li>
                                                    <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                                    </li>
                                                    <li class="pull-right">
                                                        <a href="#" class="link-black text-sm"><i
                                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                                            (5)</a></li>
                                                </ul>

                                                <input class="form-control input-sm" type="text"
                                                       placeholder="Type a comment">
                                            </div>
                                            <!-- /.post -->

                                            <!-- Post -->
                                            <div class="post clearfix">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                         src="assets/img/user7-128x128.jpg" alt="User Image">
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
                                                            <button type="submit"
                                                                    class="btn btn-danger pull-right btn-block btn-sm">Send
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.post -->

                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                         src="assets/img/user6-128x128.jpg" alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Adam Jones</a>
                                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>

                                                <!-- /.user-block -->
                                                <div class="row margin-bottom">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="assets/img/photo1.png"
                                                             alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <img class="img-responsive" src="assets/img/photo2.png"
                                                                     alt="Photo">
                                                                <br>
                                                                <img class="img-responsive" src="assets/img/photo3.jpg"
                                                                     alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-6">
                                                                <img class="img-responsive" src="assets/img/photo4.jpg"
                                                                     alt="Photo">
                                                                <br>
                                                                <img class="img-responsive" src="assets/img/photo1.png"
                                                                     alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <ul class="list-inline">
                                                    <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-share margin-r-5"></i> Share</a></li>
                                                    <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                                    </li>
                                                    <li class="pull-right">
                                                        <a href="#" class="link-black text-sm"><i
                                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                                            (5)</a></li>
                                                </ul>

                                                <input class="form-control input-sm" type="text"
                                                       placeholder="Type a comment">
                                            </div>
                                            <!-- /.post -->

                                            <?php
                                        }
                                        else {
                                            ?>
                                                <h4 class="alert alert-warning">NO POSTS YET</h4>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="publications">
                                    <!--Publication Data table-->
                                    <div class="box-body">

                                        <div class="table-responsive">
                                            <table id="publications-table" class="display nowrap"  style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Year</th>
                                                        <th>Journal</th>
                                                        <th>UGC Approved</th>
                                                        <th>citation</th>
                                                        <?php
                                                            if(!isset($_GET['export'])){
                                                                ?>
    <!--                                                            <th>View</th>-->
                                                                <th>Edit</th>
                                                                <th>Delete</th>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Year</th>
                                                        <th>Journal</th>
                                                        <th>UGC Approved</th>
                                                        <th>citation</th>
                                                        <?php
                                                            if(!isset($_GET['export'])){
                                                                ?>
    <!--                                                            <th>View</th>-->
                                                                <th>Edit</th>
                                                                <th>Delete</th>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="research-projects">
                                    <!--REsearch Projects Data table-->
                                    <div class="box-body">

                                        <div class="table-responsive">
                                            <table id="research-projects-table" class="display nowrap"  style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Principal Investigator</th>
                                                    <th>Grant Details</th>
                                                    <th>Title</th>
                                                    <th>Amount</th>
                                                    <th>Year</th>
                                                    <?php
                                                        if(!isset($_GET['export'])) {
                                                            ?>
<!--                                                            <th>View</th>-->
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                            <?php
                                                        }
                                                    ?>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Principal Investigator</th>
                                                        <th>Grant Details</th>
                                                        <th>Title</th>
                                                        <th>Amount</th>
                                                        <th>Year</th>
                                                        <?php
                                                            if(!isset($_GET['export'])) {
                                                                ?>
    <!--                                                            <th>View</th>-->
                                                                <th>Edit</th>
                                                                <th>Delete</th>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->

                        <!--BOS CHAIRMAN-->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">BOS Chairman</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Details</strong>

                                <p class="text-muted">
                                    <?php echo $staff_data['bos_chairman_details']; ?>
                                </p>

                                <hr>

                                <strong><i class="fa fa-image margin-r-5"></i>Certificate</strong>

                                <img style="margin-left: 150px" height="200" src="teacher/upload/<?php echo $_GET['id']; ?>/bos_chairman_certificate.jpg" alt="">

                            </div>
                            <!-- /.box-body -->
                        </div>

                        <!--BOS MEMBER-->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">BOS Member</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Details</strong>

                                <p class="text-muted">
                                    <?php echo $staff_data['bos_member_details']; ?>
                                </p>

                                <hr>

                                <strong><i class="fa fa-image margin-r-5"></i>Certificate</strong>

                                <img style="margin-left: 150px" height="200" src="teacher/upload/<?php echo $_GET['id']; ?>/bos_member_certificate.jpg" alt="">

                            </div>
                            <!-- /.box-body -->
                        </div>

                        <!--Industry experience-->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Industry Experience</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Years</strong>

                                <p class="text-muted">
                                    <?php echo $staff_data['industry_experience_years']; ?>
                                </p>

                                <hr>


                                <strong><i class="fa fa-book margin-r-5"></i> Details</strong>

                                <p class="text-muted">
                                    <?php echo $staff_data['industry_experience_details']; ?>
                                </p>

                                <hr>

                                <strong><i class="fa fa-image margin-r-5"></i>Certificate</strong>

                                <img style="margin-left: 150px" height="200" src="teacher/upload/<?php echo $_GET['id']; ?>/industry_certificate.jpg" alt="">

                            </div>
                            <!-- /.box-body -->
                        </div>

                        <!--Industry experience-->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Subject Chairman</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <strong><i class="fa fa-book margin-r-5"></i> Details</strong>

                                <p class="text-muted">
                                    <?php echo $staff_data['subject_chairman_details']; ?>
                                </p>

                                <hr>

                                <strong><i class="fa fa-image margin-r-5"></i>Certificate</strong>

                                <img style="margin-left: 150px" height="200" src="teacher/upload/<?php echo $_GET['id']; ?>/subject_chairman_certificate.jpg" alt="">

                            </div>
                            <!-- /.box-body -->
                        </div>

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


    <!-- Plugins and scripts required by this view-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="node_modules/toastr/build/toastr.min.js"></script>

    <script src="assets/pages/teacher/manage-publications.js"></script>

<!--    Problem occuring here -->
<!--    <script src="assets/pages/teacher/manage-research-projects.js"></script>-->
    <!-- End of Plugins and scripts required by this view-->
</body>
</html>
