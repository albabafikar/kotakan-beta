<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= @$siteTitle ?> - <?= $this->siteName ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?= base_url() ?>vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>build/css/custom.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?= base_url() ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url() ?>" class="site_title">Kotakan Indonesia</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url() ?>img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?= @$this->userdata->nama ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php include "adminSidebar.php"; ?>
          </div>
        </div>

        <?php include "adminTopNav.php"; ?>

        <!-- page content -->
        <!-- <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
              </div>
            </div>
          </div>
        </div> -->
        <!-- /page content -->
