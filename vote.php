<?php
session_start();
include 'koneksi.php';
if(isset($_POST['login'])){
	$kode_akses = mysqli_real_escape_string($koneksi, $_POST['kode_akses']);
	$nimk = mysqli_real_escape_string($koneksi, $_POST['nim']);
	$data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_akses INNER JOIN tbl_dpt ON tbl_akses.nim = tbl_dpt.nim WHERE kode_akses='$kode_akses' AND tbl_akses.nim ='$nimk'");
	$r = mysqli_fetch_array($data_akses);
	$nim = isset($r['nim']);
	$kode_akses = isset($r['kode_akses']);
	$nama_mhs = isset($r['nama_mhs']);
	$level = isset($r['level']);
	if( mysqli_num_rows($data_akses) == 1 ){
		$level = $r['level'];
		$nama_mhs = $r['nama_mhs'];
		$_SESSION["login"] = true;
		$_SESSION['nim'] = $nim;
		$_SESSION['nama_mhs'] = $nama_mhs;
		$_SESSION['kode_akses'] = $kode_akses;
		$_SESSION['level'] = $level;
		header('location:sistem');
	}else {
		echo "<script type='text/javascript'>
		setTimeout(function () {
				window.setTimeout(function(){
					window.location.replace('index.php');
					},3000);
					</script>";
				}
				
			}
			?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" />
    <!-- website name -->
    <meta property="og:site" content="" />
    <!-- website link -->
    <meta property="og:title" content="" />
    <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" />
    <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>BEM-BIU - VOTE</title>

    <!-- Styles -->
    
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/klogo2.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styless.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
				<!--===============================================================================================-->	
				<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
				<!--===============================================================================================-->
				<link rel="stylesheet" type="text/css" href="css/util.css">
				<link rel="stylesheet" type="text/css" href="css/main.css">
                <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <!-- <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> -->
    <!-- end of preloader -->


    <!-- Navigation -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="assets/img/klogo2.png" alt="" class="nav__logo-img"> BEM BIU
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php#home" class="nav__link ">Halaman Utama</a>
                    </li>

                    <li class="nav__item">
                        <a href="index.php#news" class="nav__link">Pemberitahuan</a>
                    </li>

                    <li class="nav__item">
                        <a href="index.php#about" class="nav__link">Tentang Ketua</a>
                    </li>

                    <a href="log-in.php" class="button button--ghost active-link">VOTING</a>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

        </nav>
    </header>
    <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header  class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h1>Log In</h1> -->
                    <!-- Sign Up Form -->
                    <!-- Tekan ctrl+f akses  -->
                    <div class="form-container">
                        <form data-toggle="validator"  action="" method="post">
                            <div class="logo">
                                <img src="img/logo_evoting1.png" alt="" srcset="" width="100px">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="nim" id="nim" autocomplete="off" required>
                                <label class="label-control" for="nim">nim</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" name="kode_akses" id="kode_akses" autocomplete="off" required>
                                <label class="label-control" for="kode akses">Kode Akses</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button" name="login" id="login">Masuk</button>
                            </div>
                            <!-- <div class="form-message">
                                <div id="lmsgSubmit" class="h9 text-left hidden"></div>
                            </div> -->
                        </form>
                    </div>
                    <!-- end of form container -->
                    <!-- end of sign up form -->


                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
        </header>
    <!-- end of ex-header -->
    <!-- end of header -->

    <script src="js/sweetalert.min.js"></script>
				<!--===============================================================================================-->	
				<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/bootstrap/js/popper.js"></script>
				<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/select2/select2.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/tilt/tilt.jquery.min.js"></script>
				<script >
					$('.js-tilt').tilt({
						scale: 1.1
					})
				</script>
				<!--===============================================================================================-->
				<script src="js/main.js"></script>


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script>
    <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script>
    <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script>
    <!-- Custom scripts -->
</body>

</html>