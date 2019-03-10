<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 3/4/2019
 * Time: 7:07 PM
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

    if(!(isset($_SESSION['student_id']) || isset($_SESSION['staff_id'])))
        header("Location: " . BASE_URL . "login.php");

    if(isset($_POST['news_title'])) {
        extract($_POST);

        GeneralFunctions::insert(array(
                'title' => $news_title,
                'description' => $news_description,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $_SESSION['staff_id']) , 'news_feed');

        header("Location: view-news.php");
    }
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
                    <li class="active">Create News</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <form method="post" id="news-form">
                    <div class="form-group">
                        <label for="news_title">News Title</label>
                        <input id="news_title" name="news_title" class="form-control" placeholder="Event Name">
                    </div>
                    <div class="form-group">
                        <label for="news_description">News Description</label>
                        <textarea name="news_description" id="news_description" class="form-control" cols="30" rows="5" placeholder="Event Details"></textarea>
                    </div>
    <!-- TODO: FOR IMAGE -->
    <!--                <div class="form-group">-->
    <!--                    <label for="news_title">Event Name</label>-->
    <!--                    <input id="event_name" name="event_name" class="form-control" placeholder="Event Name">-->
    <!--                </div>-->
                    <div class="form-group">
                        <button class="btn btn-instagram" type="submit">Create News Feed</button>
                    </div>
                </form>
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
    <!-- jQuery 3 -->
    <script src="<?php echo BASE_URL; ?>node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo BASE_URL; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>