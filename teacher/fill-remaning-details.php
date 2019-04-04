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

    /*TODO FIELDS TO BE FILLED IN REMAINING DETAILS `first_name`, `middle_name`, `last_name`, `contact_no`, `date_of_birth`, 'password',`gender`, `is_permanent`, `is_teaching`, `pan`, `employee_id`, `is_ad_hoc`, `is_bos_chairman`, `is_bos_member`, `is_staff_selection_committee_member`*/
?>
<!--END OF INIT-->


<?php
global $database;

if(isset($_POST['remaining-details'])) {
    // Insert into news_feed
    $staff = new Staff();
    if ($staff->fillRemainingDetails($_SESSION['staff_id']) != false) {

        /*UPLOAD FILES*/

        $staff->uploadRemainingDetailsFiles();
        header("Location: " . BASE_URL . "teacher/index.php");
    }
    else{
        die('wpw');
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
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="assets/plugins/iCheck/all.css">

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
                Remaining Details
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

            <div class="box box-primary">

                <div class="box-header with-border">Personal Details</div>

                <div class="box-body">
                    <div class="alert alert-danger form-danger" role="alert">
                        <h4>Oh snap!</h4>
                        <p>This form seems to be invalid :(</p>
                    </div>

                    <div class="alert alert-success form-success" role="alert">
                        <h4>Yay!</h4>
                        <p>Everything seems to be ok :)</p>
                    </div>

                    <form method="post"  data-parsley-validate="" id="remaining-details-form" enctype="multipart/form-data">
<!--                        id="remaining-details-form"-->
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" data-parsley-trigger="change" placeholder="First Name" data-parsley-required="true">
                        </div>

                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input  type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Middle Name" data-parsley-trigger="change keyup" data-parsley-required="true">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" class="form-control" placeholder="Last Name" data-parsley-required="true" data-parsley-trigger="change">
                        </div>

                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="number" id="contact_no" name="contact_no" class="form-control" placeholder="Number"  data-parsley-trigger="change"
                                   data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-minlength-message="exact 10 required" data-parsley-maxlength-message="exact 10 required" data-parsley-required="true">
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="dobdatepicker">DOB:</label>
                            <input type="text" class="form-control" id="dobdatepicker" name="date_of_birth" data-parsley-trigger="keyup"  data-parsley-required="true">
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- select -->
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" data-parsley-trigger="change"  data-parsley-required="true">
                                <option value="" selected disabled>Select your option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="option3">option 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="re_new_password">New password</label>
                            <input id="new_password" type="password" name="password" class="form-control" placeholder="Password" data-parsley-required="true" data-parsley-trigger="change"  data-parsley-minlength="8"
                                   data-parsley-required-message="Please enter your new password."
                                   data-parsley-uppercase="1"
                                   data-parsley-lowercase="1"
                                   data-parsley-number="1"
                                   data-parsley-special="1">
                        </div>

                        <div class="form-group">
                            <label for="re_new_password">Re-enter new password</label>
                            <input id="re_new_password" type="password" class="form-control" placeholder="Password"  data-parsley-trigger="change" >
                        </div>

                        <div class="form-group">
                            <label for="pan">PAN</label>
                            <input type="number" id="pan" name="contact_no" class="form-control" placeholder="Number"  data-parsley-trigger="change"
                                   data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-minlength-message="exact 10 required" data-parsley-maxlength-message="exact 10 required" data-parsley-required="true">
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label for="dojidatepicker">Date of joining institute:</label>
                            <input type="text" class="form-control" id="dojidatepicker" name="date_of_joining_institute" data-parsley-trigger="keyup"  data-parsley-required="true">
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <div class="form-group">
                            <label for="employee_id">Employee ID</label>
                            <input type="number" id="employee_id" name="employee_id" class="form-control" placeholder="Employee id"  data-parsley-trigger="change"
                                   data-parsley-maxlength="10"  data-parsley-maxlength-message="less than 10 required"  data-parsley-required="true">
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                Are you teaching staff???
                            </label>
                            <input type="checkbox"  name="is_teaching" value="1" id="is_teaching">
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                Are you permanent staff???
                            </label>
                            <input type="checkbox"  name="is_permanent" value="1" id="is_permanent">
                        </div>


                        <div class="box box-warning">
                            <div class="box-header with-border"></div>
                            <div class="box-body" id="optional_details_box">
                                <div id="bos_chairmen_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you chairmen of BOS ???   <label for=""> <input type="checkbox" id="is_bos_chairman" name="is_bos_chairman" value="1" ></label>
                                                <a data-toggle="collapse" data-parent="#bos_chairman_accordion" href="#bos_chairman_collapse" id="bos_chairman_a"></a>
                                            </h4>
                                        </div>
                                        <div id="bos_chairman_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="bos_chairman_certificate">BOS chairman Certificate</label>
                                                    <input type="file" id="bos_chairman_certificate" name="bos_chairman_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="bos_chairman_details">Details</label>
                                                    <textarea  id="bos_chairman_details" name="bos_chairman_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="bos_member_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you member of BOS ???   <label for=""> <input type="checkbox" id="is_bos_member" name="is_bos_member"  value="1" onclick="$('#bos_member_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#bos_member_accordion" href="#bos_member_collapse" id="bos_member_a"></a>
                                            </h4>
                                        </div>
                                        <div id="bos_member_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="bos_member_certificate">BOS member Certificate</label>
                                                    <input type="file" id="bos_member_certificate" name="bos_member_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="bos_member_details">Details</label>
                                                    <textarea  id="bos_member_details" name="bos_member_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="industry_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Do you have any industry experience ???   <label for=""> <input type="checkbox" id="is_industry_experience" name="is_industry_experience" value="1" onclick="$('#industry_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#industry_accordion" href="#industry_collapse" id="industry_a"></a>
                                            </h4>
                                        </div>
                                        <div id="industry_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="industry_experience_years">Years</label>
                                                    <input type="number" id="industry_experience_years" name="industry_experience_years" class="form-control" data-parsley-trigger="change keyup"  placeholder="Total no of Experience">
                                                </div>
                                                <div class="form-group">
                                                    <label for="industry_certificate">Industry Certificate</label>
                                                    <input type="file" id="industry_certificate" name="industry_certificate" class="form-control" data-parsley-trigger="change">
                                                </div>
                                                <div class="form-group">
                                                    <label for="industry_experience_details">Details</label>
                                                    <textarea  id="industry_experience_details" name="industry_experience_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="subject_chairman_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you Subject Chairman ???   <label for=""> <input type="checkbox"  name="is_subject_chairman" value="1" onclick="$('#subject_chairman_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#subject_chairman_accordion" href="#subject_chairman_collapse" id="subject_chairman_a"></a>
                                            </h4>
                                        </div>
                                        <div id="subject_chairman_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="subject_chairman_certificate">Subject Chairman Certificate</label>
                                                    <input type="file" id="subject_chairman_certificate" name="subject_chairman_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="subject_chairman_details">Details</label>
                                                    <textarea  id="subject_chairman_details" name="subject_chairman_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="subject_expert_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you Subject Expert ???   <label for=""> <input type="checkbox"  name="is_subject_expert" value="1" onclick="$('#subject_expert_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#subject_expert_accordion" href="#subject_expert_collapse" id="subject_expert_a"></a>
                                            </h4>
                                        </div>
                                        <div id="subject_expert_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="subject_expert_certificate">Subject Expert Certificate</label>
                                                    <input type="file" id="subject_expert_certificate" name="subject_expert_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="subject_expert_details">Details</label>
                                                    <textarea  id="subject_expert_details" name="subject_expert_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="staff_selection_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you in Staff Selection Committee ???   <label for=""> <input type="checkbox"  name="is_staff_selection_committee_member" value="1" onclick="$('#staff_selection_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#staff_selection_accordion" href="#staff_selection_collapse" id="staff_selection_a"></a>
                                            </h4>
                                        </div>
                                        <div id="staff_selection_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="staff_selection_certificate">Staff Selection Committee Certificate</label>
                                                    <input type="file" id="staff_selection_certificate" name="staff_selection_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="staff_selection_details">Details</label>
                                                    <textarea  id="staff_selection_details" name="staff_selection_committee_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="department_advisory_board_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you in Department Advisory Board ???   <label for=""> <input type="checkbox"  name="is_department_advisory_board" value="1" onclick="$('#department_advisory_board_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#department_advisory_board_accordion" href="#department_advisory_board_collapse" id="department_advisory_board_a"></a>
                                            </h4>
                                        </div>
                                        <div id="department_advisory_board_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="department_advisory_board_certificate">Department Advisory Board Certificate</label>
                                                    <input type="file" id="department_advisory_board_certificate" name="department_advisory_board_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="department_advisory_board_details">Details</label>
                                                    <textarea  id="department_advisory_board_details" name="department_advisory_board_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="academic_audit_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you Academic Auditor in other colleges ???   <label for=""> <input type="checkbox"  name="is_academic_audit" value="1" onclick="$('#academic_audit_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#academic_audit_accordion" href="#academic_audit_collapse" id="academic_audit_a"></a>
                                            </h4>
                                        </div>
                                        <div id="academic_audit_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="academic_audit_certificate">Staff Selection Committee Certificate</label>
                                                    <input type="file" id="academic_audit_certificate" name="academic_audit_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="academic_audit_details">Details</label>
                                                    <textarea  id="academic_audit_details" name="academic_audit_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="subject_expert_phd_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you Subject Expert for phd ???   <label for=""> <input type="checkbox"  name="is_subject_expert_phd" value="1" onclick="$('#subject_expert_phd_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#subject_expert_phd_accordion" href="#subject_expert_phd_collapse" id="subject_expert_phd_a"></a>
                                            </h4>
                                        </div>
                                        <div id="subject_expert_phd_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="subject_expert_phd_certificate">Staff Selection Committee Certificate</label>
                                                    <input type="file" id="subject_expert_phd_certificate" name="subject_expert_phd_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="subject_expert_phd_details">Details</label>
                                                    <textarea  id="subject_expert_phd_details" name="subject_expert_phd_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="other_universities_examiner_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you examiner in other universities ???   <label for=""> <input type="checkbox"  name="is_other_universities_examiner" value="1" onclick="$('#other_universities_examiner_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#other_universities_examiner_accordion" href="#other_universities_examiner_collapse" id="other_universities_examiner_a"></a>
                                            </h4>
                                        </div>
                                        <div id="other_universities_examiner_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="other_universities_examiner_certificate">Staff Selection Committee Certificate</label>
                                                    <input type="file" id="other_universities_examiner_certificate" name="other_universities_examiner_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_universities_examiner_details">Details</label>
                                                    <textarea  id="other_universities_examiner_details" name="other_universities_examiner_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="examination_auditor_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you Examination auditor???   <label for=""> <input type="checkbox"  name="is_examination_auditor" value="1" onclick="$('#examination_auditor_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#examination_auditor_accordion" href="#examination_auditor_collapse" id="examination_auditor_a"></a>
                                            </h4>
                                        </div>
                                        <div id="examination_auditor_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="examination_auditor_certificate">Staff Selection Committee Certificate</label>
                                                    <input type="file" id="examination_auditor_certificate" name="examination_auditor_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="examination_auditor_details">Details</label>
                                                    <textarea  id="examination_auditor_details" name="examination_auditor_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="subject_co-ordinator_src_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you Subject co-ordinator for Syllabus Revision Committee ???   <label for=""> <input type="checkbox"  name="is_subject_co_ordinator_src" value="1" onclick="$('#subject_co-ordinator_src_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#subject_co-ordinator_src_accordion" href="#subject_co-ordinator_src_collapse" id="subject_co-ordinator_src_a"></a>
                                            </h4>
                                        </div>
                                        <div id="subject_co-ordinator_src_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="subject_co-ordinator_src_certificate">Staff Selection Committee Certificate</label>
                                                    <input type="file" id="subject_co-ordinator_src_certificate" name="subject_co-ordinator_src_certificate" class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="subject_co-ordinator_src_details">Details</label>
                                                    <textarea  id="subject_co-ordinator_src_details" name="subject_co_ordinator_src_details" class="form-control" cols="30" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="iste_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you member of ISTE ???   <label for=""> <input type="checkbox" id="is_iste" name="is_iste" value="1" onclick="$('#iste_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#iste_accordion" href="#iste_collapse" id="iste_a"></a>
                                            </h4>
                                        </div>
                                        <div id="iste_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="iste_membership_id">Membership ID</label>
                                                    <input type="text" id="iste_membership_id" name="iste_membership_id" class="form-control" data-parsley-trigger="change" placeholder="ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="ieee_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you member of IEEE ???   <label for=""> <input type="checkbox" id="is_ieee" name="is_ieee" value="1" onclick="$('#ieee_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#ieee_accordion" href="#ieee_collapse" id="ieee_a"></a>
                                            </h4>
                                        </div>
                                        <div id="ieee_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="ieee_membership_id">Membership ID</label>
                                                    <input type="text" id="ieee_membership_id" name="ieee_membership_id" class="form-control" data-parsley-trigger="change" placeholder="ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="csi_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you member of CSI ???   <label for=""> <input type="checkbox" id="is_csi" name="is_csi" value="1" onclick="$('#csi_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#csi_accordion" href="#csi_collapse" id="csi_a"></a>
                                            </h4>
                                        </div>
                                        <div id="csi_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="csi_membership_id">Membership ID</label>
                                                    <input type="text" id="csi_membership_id" name="csi_membership_id" class="form-control" data-parsley-trigger="change" placeholder="ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="acm_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Are you member of ACM ???   <label for=""> <input type="checkbox" id="is_acm"  name="is_acm" value="1" onclick="$('#acm_a').click();"></label>
                                                <a data-toggle="collapse" data-parent="#acm_accordion" href="#acm_collapse" id="acm_a"></a>
                                            </h4>
                                        </div>
                                        <div id="acm_collapse" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="acm_membership_id">Membership ID</label>
                                                    <input type="text" id="acm_membership_id" name="acm_membership_id" class="form-control" data-parsley-trigger="change" placeholder="ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-instagram" type="submit" id="remaining-details" name="remaining-details">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

    <!-- ./wrapper -->

    <script src="node_modules/parsleyjs/dist/parsley.min.js"></script>

    <!-- bootstrap datepicker -->
    <script src="node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- iCheck 1.0.1 -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>

    <script src="assets/pages/teacher/fill-remaning-details.js"></script>
</body>
</html>