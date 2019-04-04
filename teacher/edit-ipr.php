<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 5:51 AM
 */

    ob_start();
    define('BASE_URL', '../');

    require_once(BASE_URL . 'classes/IPR.php');

    $ipr = new IPR();
    $result = $ipr->getIPRById($_GET['id']);
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
                    IPR
                    <small>Edit</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> IPR</a></li>
                    <li class="active">Edit</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <form method="post" id="edit-ipr-form" >

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="date" id="year" name="year" class="form-control" placeholder="Year" value="<?php echo $result['year']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="patents_published_count">Patents Published</label>
                        <input type="number" id="patents_published_count" name="patents_published_count" class="form-control" placeholder="No. of Patents Published" value="<?php echo $result['patents_published_count']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="patents_granted_count">Patents Granted</label>
                        <input type="text" id="patents_granted_count" name="patents_granted_count" class="form-control" placeholder="No. of Patents Granted" value="<?php echo $result['patents_granted_count']; ?>">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger" name="update-ipr" id="<?php echo $_GET['id']; ?>">Update IPR</button>
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

    <!-- toastr -->
    <script src="node_modules/toastr/build/toastr.min.js"></script>

    <!-- script for when update button is clicked -->
    <script>
        $(document).ready(function (e) {
            $('[name="update-ipr"]').on('click', function (e) {
                e.preventDefault();

                var updated_ipr_details = {
                    "ipr_id": $(this).attr('id'),
                    "year": $('#year').val(),
                    "patents_published_count": $('#patents_published_count').val(),
                    "patents_granted_count": $('#patents_granted_count').val()
                };

                $.ajax({
                    url: "http://localhost/frcrce/teacher/scripts/ipr/update.php",
                    method: "POST",
                    data: "update_ipr_json_string=" + JSON.stringify(updated_ipr_details),
                    dataType: "text",
                    success: function(data) {
                        if(data){
                            console.log(data);
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

                            toastr["info"]("Publication details updated!", "Success");
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

