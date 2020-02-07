<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarJaidee</title>

    <meta property="og:url" content="<?=base_url('search/garage/detailgarage/' . $garageId)?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?="CarJaidee - " . $garageData->garageName?>" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="<?=base_url('public/image/garage/' . $garageData->picture)?>" />

    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">

    <!-- PLUGINS CSS STYLE -->
    <!-- Bootstrap -->
    <!-- <link href="<?=base_url('public/')?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="<?=base_url("/public/vendor/datatables/dataTables.bootstrap4.css")?>" rel="stylesheet">
    <!-- Themefisher Font -->
    <!-- <link href="<?=base_url('public/')?>plugins/themefisher-font/style.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <link href="<?=base_url('public/')?>plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="<?=base_url('public/')?>plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Slick Carousel -->
    <link href="<?=base_url('public/')?>plugins/slick/slick.css" rel="stylesheet">
    <link href="<?=base_url('public/')?>plugins/slick/slick-theme.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="<?=base_url('public/')?>css/style.css?<?php echo time(); ?>" rel="stylesheet">

    <!-- FAVICON -->
    <!-- <link href="<?=base_url('public/')?>images/favicon.png" rel="shortcut icon"> -->

    <style>
    .main-nav .navbar-brand {
        /* padding: 0px 40px 0px 50px; */
    }

    .about {
        padding: 130px 0px 15px 0px;
    }
    </style>

</head>

<body class="body-wrapper">