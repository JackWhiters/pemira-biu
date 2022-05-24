<?php
session_start();
include 'koneksi.php';
include 'logic.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description" />
    <meta name="author" content="Your name" />

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
    <meta name="twitter:card" content="summary_large_image" />

    <!-- Webpage Title -->
    <title> PEMIRA BEM BIU </title>

    <!-- Styles -->
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
      rel="stylesheet"
    />

    <link href="vendors/css/bootstrap.css" rel="stylesheet" />
    <link href="vendors/css/fontawesome-all.css" rel="stylesheet" />
    <link href="vendors/css/swiper.css" rel="stylesheet" />
    <link href="vendors/css/magnific-popup.css" rel="stylesheet" />
    <link href="vendors/css/styleslogin.css" rel="stylesheet" />
    

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    
    
    <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="login/css/style.css" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="vendors/css/swiper-bundle.min.css">

    <!-- Favicon  -->
    <link rel="icon" href="vendors/images/klogo2.png" />
  </head>
  <body data-spy="scroll" data-target=".fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
      <div class="container">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Gemdev</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.php"
          ><img src="vendors/images/klogo2.png" alt="" class="i-home__img">
        </a>

        <button
          class="navbar-toggler p-0 border-0"
          type="button"
          data-toggle="offcanvas"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="navbar-collapse offcanvas-collapse"
          id="navbarsExampleDefault"
        >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="index.php"
                > Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#ketua"> Ketua </a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#paslon"> Paslon </a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="vote.php"> Voting </a>
            </li>
          </ul>
         
        <!-- <img src="assets/img/klogo2.png" alt="" class="i-home__img"> -->
</div>
</section>
            </span>
          </span>
        </div>
        <!-- end of navbar-collapse -->
      </div>
      <!-- end of container -->
    </nav>


    <!-- end of header -->
    <!-- end of basic-1 -->
    <!-- end of statement -->

<!--    -->
 <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 col-lg-5">
            <div class="wrap">
              <div
                class="img"
                style="background-image: url(vendors/images/klogo2.png)"
              ></div>
              <div class="login-wrap p-4 p-md-5" >
                <div class="d-flex">
                  <div class="w-100">
                    <h3 class="mb-4">Login</h3>
                  </div>
                </div>
                <form action="#" method="post" class="signin-form">
                  <div class="form-group mt-3">
                    <input
                      type="text"
                      class="form-control"
                      name="nim"
                      id="nim"
                      autocomplete="off"
                      required
                    />
                    <label class="form-control-placeholder" for="username"
                      >NIM</label
                    >
                  </div>
                  <div class="form-group">
                    <input
                      id="password-field"
                      type="password"
                      class="form-control"
                      name="kode_akses"
                      autocomplete="off"
                      required
                      required
                    />
                    <label class="form-control-placeholder" for="password"
                      >Kode Akses</label
                    >
                    <span
                      toggle="#password-field"
                      class="fa fa-fw fa-eye field-icon toggle-password"
                    ></span>
                  </div>

                  <div class="form-group d-flex">
                    <div class="text-left">
                      <input
                        type="text"
                        class="form-control"
                        name="captcha"
                        id="captcha"
                        autocomplete="off"
                        required
                      />
                    </div>
                    <div class="text-right">
                      <img class="captcha" src="captcha.php" />
                    </div>
                  </div>
                  <div class="div"><?php echo $msg ?></div>
                  <div class="form-group">
                    <button
                      type="submit"
                      class="form-control btn btn-primary rounded submit px-3"
                      name="login" id="login"
                      style="color:#093d77"
                    >
                      Vote
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =============== SCROLL UP ===============
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a> -->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    
    <script src="js/validator.min.js"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script>

        <!-- Scripts -->
    <script src="vendors/js/jquery.min.js"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="vendors/js/bootstrap.min.js"></script>
    <!-- Bootstrap framework -->
    <script src="vendors/js/jquery.easing.min.js"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="vendors/js/swiper.min.js"></script>
    <!-- Swiper for image and text sliders -->
    <script src="vendors/js/jquery.magnific-popup.js"></script>
    <!-- Magnific Popup for lightboxes -->
    <!-- <script src="vendors/js/scripts.js"></script> -->
    
    <!--=============== SWIPER JS ===============-->
    <script src="vendors/js/swiper-bundle.min.js"></script>
    <!--=============== MAIN JS ===============-->
    <script src="vendors/js/main.js"></script>
    <!-- Custom scripts -->
    
</body>

</html>