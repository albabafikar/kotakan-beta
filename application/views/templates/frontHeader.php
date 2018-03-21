<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SITE META -->
    <title>Kotakan.id | Indonesian Foodbox Marketplace</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="<?= base_url() ?>resources/images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url() ?>resources/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>resources/images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>resources/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>resources/images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>resources/images/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>resources/images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>resources/images/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>resources/images/apple-touch-icon-152x152.png">

    <!-- TEMPLATE STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/style.css">

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>resources/css/flexslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>resources/css/bootstrap-datepicker.min.css">
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>

    <!-- START SITE -->
    <div id="wrapper">
        <header class="header">
            <div class="container-menu">
                <nav class="navbar navbar-default yamm">
                    <div class="container">
                        <div class="navbar-table">
                            <div class="navbar-cell">
                                <div class="navbar-header">
                                    <a class="navbar-brand" style="padding-top: 5px;" href="<?= base_url() ?>"><img src="<?= base_url() ?>resources/images/logo.png" alt="" class="img-responsive"></a>
                                    <div class="open-menu">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="fa fa-bars"></span>
                                        </button>
                                    </div>
                                </div><!-- end navbar-header -->
                            </div><!-- end navbar-cell -->
                            <div class="navbar-cell stretch">
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                    <div class="navbar-cell">
                                        <ul class="nav navbar-nav navbar-center">
                                            <li><a class="active" href="<?= base_url() ?>" title="">Home</a></li>
                                            <li class="dropdown megamenu yamm-half hovermenu"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Menu Kotakan &nbsp; <b class="fa fa-angle-down"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="box">
                                                                    <h5>Pilihan Menu Kotakan</h5>
                                                                    <ul>
                                                                        <li><a href="<?= base_url().'menu/nasikotak' ?>"><i class="fa fa-cutlery"></i>Paket Nasi Kotakan</a></li>
                                                                        <li><a href="<?= base_url().'menu/snackbox' ?>"><i class="fa fa-archive"></i>Paket Snack Kotakan</a></li>
                                                                        <li><a href="<?= base_url().'menu/katering' ?>"><i class="fa fa-cutlery"></i>Paket Katering Prasmanan</a></li>
                                                                        <li><a href="<?= base_url().'menu/coffeebreak' ?>"><i class="fa fa-coffee"></i>Paket Coffee Break</a></li>
                                                                        <li><a href="#"><i class="fa fa-archive"></i>Paket Bundling Kotakan *Comingsoon*</a></li>
                                                                    </ul>
                                                                </div><!-- end box -->
                                                            </div><!-- end col -->
                                                            <!--div class="col-md-6 col-sm-6">
                                                                <div class="box">
                                                                    <h5>User Profile</h5>
                                                                    <ul>
                                                                        <li><a href="edit-account.html">Edit Account</a></li>
                                                                        <li><a href="public-profile.html">Public profile</a></li>
                                                                        <li><a href="sales.html">My Sales</a></li>
                                                                        <li><a href="messages.html">Messages</a></li>
                                                                        <li><a href="<?= base_url() ?>resources/upload/-item.html"><?= base_url() ?>resources/upload/ Item</a></li>
                                                                        <li><a href="downloads.html">Downloads</a></li>
                                                                        <li><a href="login.html">Login & Register</a></li>
                                                                    </ul>
                                                                </div><!-- end box -->
                                                            <!--/div--><!-- end col -->
                                                        </div>
                                                    </div><!-- end ttmenu-content -->
                                                    </li>
                                                </ul>
                                            </li><!-- end mega menu -->
                                            <li><a href="<?= base_url() ?>about" title="Tentang Kami">Tentang Kami</a></li>
                                            <li><a href="<?= base_url() ?>blog" title="Blog &amp; Promo">Blog &amp; Promo</a></li>
                                            <li><a href="<?= base_url() ?>contact" title="FAQ &amp; Kontak">FAQ &amp; Kontak</a></li>
                                            <li><a href="<?= base_url() ?>confirmation" title="Konfirmasi Pembayaran">Konfirmasi Pembayaran</a></li>
                                        </ul>
                                        
                                    </div><!-- end navbar-cell -->
                                </div><!-- /.navbar-collapse -->        
                            </div><!-- end navbar cell -->
                        </div><!-- end navbar-table -->
                    </div><!-- end container fluid -->
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>