<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<!-- HEADER -->
<?php
    require_once("includes/ui-elements/header.php");
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
            require_once("includes/ui-elements/navigation.php");
        ?> <!-- End of NAVIGATION -->

        <!-- SIDEBAR -->
        <?php
            require_once("includes/ui-elements/sidebar.php");
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

        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- FOOTER -->
        <?php
            require_once("includes/ui-elements/footer.php");
        ?> <!-- End of FOOTER -->

        <!-- CONTROL-SIDEBAR -->
        <?php
            require_once("includes/ui-elements/control-sidebar.php");
        ?> <!-- End of CONTROL-SIDEBAR -->
    </div>
    <!-- ./wrapper -->

    <!-- SCRIPTS -->
    <?php
        require_once("includes/ui-elements/scripts.php");
    ?>

</body>
</html>