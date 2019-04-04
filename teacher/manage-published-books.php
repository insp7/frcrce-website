<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 4/4/2019
 * Time: 6:15 AM
 */

    ob_start();
    define('BASE_URL', '../');
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
                    Pubished Books
                    <small>View</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Published Books</a></li>
                    <li class="active">View</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!-------------------------
                | Your Page Content Here |
                -------------------------->
                <p hidden id="hidden_staff_id"><?php echo $_SESSION['staff_id']; ?></p>

                <div class="box">

                    <div class="box-header">
                        <div class="pull-left">
                            <a href="teacher/add-published-book.php" class="btn btn-danger">ADD <i class="fa fa-plus"></i></a>

                            <?php
                                if(isset($_GET['export'])) {
                                    echo '<a href="admin/manage-published-books.php" class="btn btn-warning">EDITABLE</a>';
                                } else {
                                    echo '<a href="admin/manage-published-books.php?export=true" class="btn btn-success">EXPORTABLE</a>';
                                }
                            ?>

                        </div>
                        <div class="pull-right" id="export-buttons">

                        </div>
                    </div>


                    <div class="box-body">

                        <div class="table-responsive">
                            <table id="published-books-table" class="display nowrap"  style="width:100%">
                                <thead>
                                <tr>
                                    <th>details</th>
                                    <?php
                                        if(!isset($_GET['export'])) {
                                            ?>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <?php
                                        }
                                    ?>
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>details</th>
                                        <?php
                                            if(!isset($_GET['export'])) {
                                                ?>
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

    <!-- sweetalert2 -->
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <!-- custom js -->
    <script src="assets/pages/teacher/manage-published-books.js"></script>

    <!-- End of Plugins and scripts required by this view-->
</body>
</html>