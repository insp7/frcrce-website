<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/3/2019
 * Time: 6:45 PM
 */

    // INIT
    ob_start();
    define('BASE_URL', '../');

    require_once(BASE_URL . 'classes/ResearchProjects.php');

    $research_projects = new ResearchProjects();
    $result = $research_projects->getResearchProjectById($_GET['id']);
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
                Research Projects
                <small>Edit</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Research Projects</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!-------------------------
            | Your Page Content Here |
            -------------------------->
            <form method="post" id="edit-research-projects-form" >
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" name="title" class="form-control" placeholder="Title" value="<?php echo $result['title']; ?>">
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="date" id="year" name="year" class="form-control" placeholder="Year" value="<?php echo $result['year']; ?>">
                </div>

                <div class="form-group">
                    <label for="principal_investigator">Principal Investigator</label>
                    <select name="principal_investigator" id="principal_investigator" class="form-control" style="height: 100%;">
                        <?php
                            require_once(BASE_URL . 'classes/Staff.php');

                            $staff = new Staff();
                            $result_set = $staff->getAllStaff();

                            foreach($result_set as $row) {
                                extract($row);
                                ?>
                                <option value="<?php echo $staff_id; ?>">
                                    <?php echo $first_name . ' ' . $last_name ;?>
                                </option>
                                <?php
                            }
                        ?>
                        <option value="<?php echo $result['principal_investigator']; ?>" selected>
                            <?php
                                $staff_name_string = $staff->getStaffNameById($result['principal_investigator']);
                                echo $staff_name_string;
                            ?>
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grant_details">Grant Details</label>
                    <input type="text" id="grant_details" name="grant_details" class="form-control" placeholder="Grant Details" value="<?php echo $result['grant_details']; ?>">
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount" value="<?php echo $result['amount']; ?>">
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" name="update-research-project" id="<?php echo $_GET['id']; ?>">Update Publication</button>
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

<!-- Plugins and scripts required by this view-->

<!-- select2.js -->
<script src="node_modules/select2/dist/js/select2.min.js"></script>

<!-- toastr -->
<script src="node_modules/toastr/build/toastr.min.js"></script>

<!-- script for when update button is clicked -->
<script>
    $(document).ready(function (e) {
        $('#principal_investigator').select2();

        $('[name="update-research-project"]').on('click', function (e) {
            e.preventDefault();

            var updated_research_project_details = {
                "research_projects_id": $(this).attr('id'),
                "year": $('#year').val(),
                "principal_investigator": $('#principal_investigator option:selected').attr('value'),
                "grant_details": $('#grant_details').val(),
                "amount": $('#amount').val(),
                "title": $('#title').val()
            };

            // console.log(updated_research_project_details.principal_investigator);

            $.ajax({
                url: "http://localhost/frcrce/teacher/scripts/research-projects/update.php",
                method: "POST",
                data: "updated_research_project_json_string=" + JSON.stringify(updated_research_project_details),
                dataType: "text",
                success: function(data) {
                    if(data){
                        // console.log(data);
                        // SET toastr options
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "200",
                            "hideDuration": "1000",
                            "timeOut": "1500",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };

                        toastr["info"]("Research Projects' details updated!", "Success");
                    } else {
                        alert('Some problem' + data);
                        console.log(data);
                    }
                }
            });
        });
    });
</script>
<!-- End of Plugins and scripts required by this view-->
</body>
</html>