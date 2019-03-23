<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<!--INIT-->
<?php
    ob_start();
    define('BASE_URL', '');
    require_once(BASE_URL . 'classes/NewsFeed.php');
    require_once(BASE_URL . 'authenticate.php');
?>
<!--END OF INIT-->

<base href="<?php echo BASE_URL; ?>">

<!-- HEADER -->
<?php
    include_once(BASE_URL . 'includes/ui/header.php');
?> <!-- End of HEADER -->

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
                    Page Header
                    <small>Optional description</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

              <!--------------------------
                | Your Page Content Here |
                -------------------------->
                <div class="col-md-9">

                    <?php
                        $news_feed = new NewsFeed();
                        $result_set = $news_feed->getAllNews();

                        foreach($result_set as $row) {
                            extract($row);
                            ?>
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                         src="assets/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                        <a href="#"><?php echo $title; ?></a>
                                        <a href="#" class="pull-right btn-box-tool">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </span>
                                    <span class="description"><?php echo $created_at; ?></span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    <?php echo $description; ?>
                                </p>
                            </div>
                            <!-- /.post -->
                            <?php
                        }
                    ?>

                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="assets/img/user6-128x128.jpg" alt="User Image">
                            <span class="username">
                                <a href="#">Adam Jones</a>
                                <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                            </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row margin-bottom">
                            <div class="gallery-mine">
                                <?php
                                    require_once('classes/NewsImages.php');

                                    $news_images = new NewsImages();
                                    $news_result_set = $news_images->getAllNewsImages();

                                    $i = 0;
                                    foreach($news_result_set as $row) {
                                        $i++;
                                        if ($i < 7) {
                                            ?>
                                            <a href="upload-folder/<?php echo $row['news_image_path']; ?>" data-toggle="lightbox" data-gallery="hidden-images">
                                                <img src="upload-folder/<?php echo $row['news_image_path']; ?>" class="gallery-img-mine" alt="news_image!">
                                            </a>
                                            <?php
                                        } else {
//                                            ?>
<!--                                            IF this issue is not solved, then create a hidden modal, and display the remaining images in it... -->
<!--                                            later upon a button click show the modal! -->

                                            <!-- elements not showing, use data-remote -->
                                            <div data-toggle="lightbox" data-gallery="hidden-images" data-remote="https://localhost/frcrce/uploadFolder/<?php echo $row['news_image_path']; ?>"></div>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <p>
                            <?php echo $description; ?>
                        </p>
                    </div>
                    <!-- /.post -->

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="assets/img/user4-128x128.jpg" alt="User profile picture">

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
                <!-- /.col-md-3 -->

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
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>

    <!-- light-box.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

    <!-- My custom scripts -->
    <script src="assets/js/scripts.js"></script>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
    <!-- End of Plugins and scripts required by this view-->
</body>
</html>