<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 6:28 AM
 */

    ob_start();
    define('BASE_URL', '../');

    require_once(BASE_URL . 'classes/PublishedBooks.php');

    $published_books = new PublishedBooks();
    $result = $published_books->getPublishedBookById($_GET['id']);
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
                    Published books
                    <small>Edit</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Published Books</a></li>
                    <li class="active">Edit</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <form method="post" id="edit-published-book-form" >
                    <div class="form-group">
                        <label for="details">Details</label>
                        <input id="details" name="details" class="form-control" placeholder="Detail" value="<?php echo $result['details']; ?>">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger" name="update-published-book" id="<?php echo $_GET['id']; ?>">Update Published book</button>
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

    <!-- toastr -->
    <script src="node_modules/toastr/build/toastr.min.js"></script>

    <!-- script for when update button is clicked -->
    <script>
        $(document).ready(function (e) {
            $('[name="update-published-book"]').on('click', function (e) {
                e.preventDefault();

                var updated_published_book_details = {
                    "published_books_id": $(this).attr('id'),
                    "details": $('#details').val()
                };

                $.ajax({
                    url: "http://localhost/frcrce/teacher/scripts/published-books/update.php",
                    method: "POST",
                    data: "update_published_books_json_string=" + JSON.stringify(updated_published_book_details),
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

                            toastr["info"]("Published Book details updated!", "Success");
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

