<?php
/**
 * Created by PhpStorm.
 * User: Aniket
 * Date: 2/20/2019
 * Time: 11:19 PM
 */

    if(session_status() == PHP_SESSION_NONE)
        session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.4.1 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="node_modules/ionicons/dist/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">

    <!-- select2 -->
    <link rel="stylesheet" type="text/css" href="node_modules\select2\dist\css\select2.min.css">

    <!-- Light-box -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="assets/css/skins/skin-blue.min.css">

    <!-- Styles for datatables; This link is only used once for now; TODO: come up with a better implementation -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!--    <link rel="stylesheet" href="node_modules/datatables.net-bs/css/dataTables.bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!-- toastr -->
    <link rel="stylesheet" href="node_modules/toastr/build/toastr.min.css">

    <!-- sweetAlert2 -->
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

