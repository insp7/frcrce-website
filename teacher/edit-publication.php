<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/2/2019
 * Time: 9:26 PM
 */

    // INIT
    ob_start();
    define('BASE_URL', '../');

    require_once(BASE_URL . 'classes/Publications.php');

    $publications = new Publications();
    $result = $publications->getPublicationById($_GET['id']);
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
                    Publications
                    <small>Edit</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Publications</a></li>
                    <li class="active">Edit</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <form method="post" id="edit-publication-form" >
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" name="title" class="form-control" placeholder="Title" value="<?php echo $result['title']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="date" id="year" name="year" class="form-control" placeholder="Year" value="<?php echo $result['year']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="journal">Journal</label>
                        <input type="text" id="journal" name="journal" class="form-control" placeholder="Journal" value="<?php echo $result['journal']; ?>">
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <input type="checkbox" id="is_ugc_approved" name="is_ugc_approved" <?php if($result['is_ugc_approved'] == 1) echo "checked"; ?>>
                        <label for="is_ugc_approved">&nbsp;UGC approved</label>
                    </div>

                    <div class="form-group">
                        <label for="citation">Citation</label>
                        <input type="text" id="citation" name="citation" class="form-control" placeholder="Citation" value="<?php echo $result['citation']; ?>">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger" name="update-publication" id="<?php echo $_GET['id']; ?>">Update Publication</button>
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
    <script src="assets/pages/teacher/manage-publications.js"></script>

    <!-- toastr -->
    <script src="node_modules/toastr/build/toastr.min.js"></script>

    <!-- script for when update button is clicked -->
    <script>
        $(document).ready(function (e) {
            $('[name="update-publication"]').on('click', function (e) {
                e.preventDefault();

                var updated_publication_details = {
                    "publication_id": $(this).attr('id'),
                    "year": $('#year').val(),
                    "journal": $('#journal').val(),
                    "is_ugc_approved": $('#is_ugc_approved').val(),
                    "citation": $('#citation').val(),
                    "title": $('#title').val()
                };

                $.ajax({
                    url: "http://localhost/frcrce/teacher/scripts/publications/update.php",
                    method: "POST",
                    data: "update_publication_json_string=" + JSON.stringify(updated_publication_details),
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

