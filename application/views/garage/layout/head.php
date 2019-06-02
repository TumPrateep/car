<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>public/themes/garage/images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/themes/garage/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?=base_url()?>public/themes/garage/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/themes/garage/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/themes/garage/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>public/themes/garage/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>public/themes/garage/css/helper.css" rel="stylesheet">
    <link href="<?=base_url("/public/css/responsive.dataTables.min.css") ?>" rel="stylesheet">
    <link href="<?=base_url()?>public/themes/garage/css/style.css" rel="stylesheet">

    <link href="<?=base_url()?>public/css/fullcalendar.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .header .top-navbar .navbar-nav > .nav-item > .nav-link{
            color: #ffffff !important;
        }
        .navbar-bg-Orange, .dark-logo , .header .top-navbar .navbar-header{
            background-color: #ff471a !important;
        }
        .bg-o-footer{
            background-color: #ffb380;
            color: #ffffff;
        }
        .ft-white{
        color: #e62e00 !important;
        }
        .pad-bot{
            padding-top: : 7px!important;
        }
        .bg-sidebar{
            background-color: #1a1a1a;
        }
        .bg-container{
            background-color: #f2f2f2;
        }
        .garage-white i.garage-white{
        color: #cccccc !important;
        }
        .sidebar-nav > ul > li.active > a {
        color: #cccccc !important;
        }
        .sidebar-nav ul li a:hover {
        color: #ffffff !important;
        }
        .sidebar-nav ul li a {
        color: #e6e6e6 !important;
        }
        .sidebar-nav > ul > li > a.active {
        background-color: #333333 !important;
        color: #ffffff !important;
        }
        .sidebar-nav > ul > li > ul > li > a.active {
        background-color: #333333 !important;
        color: #ffffff !important;
        }
        .sidebar-nav > ul > li.active > a:hover {
        color: #ffffff !important;
        }
        .brand-image{
            width: 80%;
            height: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
        }
        .size-sm-model{
            width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }
        .text-font-model{
            font-size: 18px;
        }
        .navbar-light .navbar-brand{
            color: #ffffff;
        }
        .order-left{
            margin-left: auto;
        }
        td a{
            color: #000000 !important;
        }
        .card-rating{
            border: 1px solid #ff6600;
            border-radius: 5px;
            padding-bottom: 10px;
            padding-top: 10px;
            padding-right: 10px;
            padding-left: 10px;
        }
        .card-comment{
            border: 1px solid #bfbfbf;
            border-radius: 3px;
            padding-bottom: 10px;
            padding-top: 10px;
            padding-right: 10px;
            padding-left: 10px;
        }
        .progress-hgt{
            height: 14px;
        }
        .progress-center{
            padding-top: 4px !important;
        }
        .score-top{
            padding-top: 10px;
        }
        .txt-rating{
            height: 35px;
            font-size: 80px;
        }
        .txt-score{
            /*height: 20px;*/
            font-size: 40px;
        }
        .Yellow-star{
            color: #ffff33;
        }
        .textarea-l{
            height: 100px;
        }
        .modal-size-l{
            width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .bg-Orange{
            background-color: #ff751a;
        }
        .size-star{
            font-size: 20px;
        }
        .pad-star{
            padding-top: 10px;
        }
        .modal-dialog.appove{
            width: 500px;
        }

        /************
         575px
        ************/

        @media only screen and (max-width: 575px)
        {
            .modal-dialog.appove{
                margin-top: -50px;
                width: 70%;
            }
            .btn.btn-model{
                width: 100%;
            }
        }
    </style>
</head>