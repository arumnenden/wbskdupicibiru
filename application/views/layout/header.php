<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $profile['nama_website']; ?></title>
    
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('assets/'); ?>dist/img/upi.png" rel="icon">
    <link href="<?php echo base_url('assets/'); ?>dist/img/upi.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('vendor/'); ?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62b69e893a1e900019a62f39&product=inline-share-buttons" async="async"></script>
    <!-- =======================================================
  * Template Name: Arsha - v2.2.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .whats-float {
            position: fixed;
            transform: translate(108px, 0px);
            top: 25%;
            right: 0;
            width: 150px;
            overflow: hidden;
            background-color: #25d366;
            color: #FFF;
            border-radius: 4px 0 0 4px;
            z-index: 10;
            transition: all 0.5s ease-in-out;
            vertical-align: middle
        }

        .whats-float a span {
            color: white;
            font-size: 15px;
            padding-top: 8px;
            padding-bottom: 10px;
            position: absolute;
            line-height: 16px;
            font-weight: bolder;
        }

        .whats-float i {
            font-size: 30px;
            color: white;
            line-height: 30px;
            padding: 10px;
            transform: rotate(0deg);
            transition: all 0.5s ease-in-out;
            text-align: center;

        }

        .whats-float:hover {
            color: #FFFFFF;
            transform: translate(0px, 0px);
        }

        .whats-float:hover i {
            transform: rotate(360deg);
        }
    </style>
</head>

<body>
    
    <header id="header" class="fixed-top header-inner-pages">
        <div class="red-bar"></div>
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="<?php echo base_url('landing/index'); ?>"><img src="<?php echo base_url('assets/'); ?>dist/img/upi2.png" alt="" class="img-fluid"></a></h1>
    

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class=""><a href="<?php echo base_url('landing/index'); ?>">Beranda</a></li>
                    <li><a href="https://drive.google.com/file/d/1I08MCSUeoKLWoK0lrPHs1rYImk6Q_BB_/view?usp=sharing">Pedoman WBS</a></li>
                    <!-- <li><a href="<?php echo base_url('landing/index'); ?>#about">Fitur</a></li> -->
                    <!--<li><a href="<?php echo base_url('landing/artikel'); ?>">Artikel</a></li>-->
                    <!-- <li><a href="<?php echo base_url('landing/promosi'); ?>">Prokem</a></li> -->
                    <!-- <li><a href="<?php echo base_url('landing/pkk'); ?>">PKK</a></li> -->
                    <li><a href="<?php echo base_url('landing/index'); ?>#faq">FAQ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-menu dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Web Universitas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="https://kd-cibiru.upi.edu/index.php/ppid">PPID</a>
                        <a class="dropdown-item" href="https://zi.upicibiru.com/">Zona Integrasi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="https://wbs.kemdikbud.go.id/">WBS Kemdikbudristek</a>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('landing/index'); ?>#contact">Daftar</a></li>
                    
                </ul>
                
            </nav>
            <a href="<?php echo base_url('auth/index'); ?>" class="get-started-btn scrollto">Login</a>
        </div>
    </header>