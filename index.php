<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/klogo2.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles2.css">

    <title>BEM BIU</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    
    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <img src="assets/img/klogo2.png" alt="" class="nav__logo-img"> BEM BIU
            </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#news" class="nav__link">Pemberitahuan</a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">Ketua</a>
                        </li>
                        <li class="nav__item">
                            <a href="#paslon" class="nav__link">Paslon</a>
                        </li>
                        <li class="nav__item">
                            <a href="vote.php" class="nav__link">Voting</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <!-- Theme change button -->
                    <i class="ri-moon-line change-theme" id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class="ri-menu-line"></i>
                    </div>
                </div>

        </nav>
    </header>

    <!--==================== HOME ====================-->
        <div class="shape" style="height: 80vh; overflow: hidden; position: absolute;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-115.75,-254.46 C79.88,352.34 252.58,-101.28 280.22,268.33 L176.51,161.59 L-8.01,232.76 Z" style="stroke: none; fill: #66ffcc;"></path></svg></div>
    
    <main class="main">
        <section class="section i__home" id="home">
            <div class="i-home__container container grid">
            

                <div class="i-home__data">
                    <h2 class="section__title i-home__title">PEMIRA BADAN <br> EKSEKUTIF MAHASISWA <br> UNIVERSITAS BINA INSANI </h2>
                    <a href="#news" class="button">Mulai</a>
                </div>

                <div class="home__social">
                        <span class="home__social-follow">Follow Us</span>

                        <div class="home__social-links">
                            <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                                <i class="ri-instagram-line"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="home__social-link">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </div>
                    </div>
                    <img src="assets/img/klogo2.png" alt="" class="i-home__img">
            </div>
        </section>
        <!--==================== NEWS ====================-->
        <section class="section newsletter" id="news">
            <div class="newsletter__container container grid">
                <h2 class="section__title newsletter__title">PENJELASAN TENTANG HABISNYA MASA JABATAN KETTUA BEM</h2>
                <p class="newsletter__description">
                    Dalam hal ini bla bla bla
                </p>
            </div>
        </section>

        <!--==================== ABOUT KETUA ====================-->
        <section class="section about container" id="about">
            <div class="about__container grid">
                <div class="about__data">
                    <h2 class="section__title about__title">Data Diri Ketua </h2>
                    <p class="about__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt ad inventore est illo eveniet maxime consectetur, quidem vel quisquam illum autem dolore vitae ratione, asperiores iusto quas nemo quae reiciendis.
                    </p>
                </div>
                <img src="assets/img/pp.jpg" alt="" class="about__img">
            </div>
        </section>

        <!--==================== DATA PASLON ====================-->
        <section class="swiper container section" id="paslon">
            <div class="swiper home-swiper">
                <h2 class="section__title swiper__title">Data Paslon</h2>
                <div class="swiper-wrapper">
                    <!-- PASLON 1 -->
                    <section class="swiper-slide">
                        <div class="home__content grid">
                            <div class="paslon__group">

                                <div class="paslon__img-overlay">
                                    <img src="assets/img/pp.jpg" alt="" class="paslon__img-one">
                                </div>

                                <div class="paslon__img-overlay">
                                    <img src="assets/img/ppcewe.jpg" alt="" class="paslon__img-two">
                                </div>
                            </div>

                            <div class="home__data">
                                <h3 class="home__subtitle">PASLON 1</h3>
                                <h1 class="home__title">nama &<br> nama</h1>
                                <p class="home__description">penjelasan lorem ipsum</p>

                                <div class="about__details">
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        We always deliver on time.
                                    </p>
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        We give you guides to protect and care for your plants.
                                    </p>
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        We always come over for a check-up after sale.
                                    </p>
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        100% money back guaranteed.
                                    </p>
                                </div>

                                <div class="home__buttons">
                                    <a href="#" class="button">Vote Now</a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- PASLON 2 -->
                    <section class="swiper-slide">
                        <div class="home__content grid">
                            <div class="paslon__group">

                                <div class="paslon__img-overlay">
                                    <img src="assets/img/pp.jpg" alt="" class="paslon__img-one">
                                </div>

                                <div class="paslon__img-overlay">
                                    <img src="assets/img/ppcewe.jpg" alt="" class="paslon__img-two">
                                </div>
                            </div>

                            <div class="home__data">
                                <h3 class="home__subtitle">PASLON 2</h3>
                                <h1 class="home__title">nama &<br> nama</h1>
                                <p class="home__description">visi & misi mungkin
                                </p>
                                
                                <div class="about__details">
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        We always deliver on time.
                                    </p>
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        We give you guides to protect and care for your plants.
                                    </p>
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        We always come over for a check-up after sale.
                                    </p>
                                    <p class="about__details-description">
                                        <i class="ri-checkbox-fill about__details-icon"></i>
                                        100% money back guaranteed.
                                    </p>
                                </div>

                                <div class="home__buttons">
                                    <a href="#" class="button">Vote Now</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        
        </div>
        <!--==================== VOTE ====================-->
        <section class="section vote">
            <div class="vote__container container grid">
                <div class="vote__data">
                    <h2 class="vote__title">penjelasan Kanapa harus ikut vote</h2>
                    <a href="#" class="button">Go to VOTE</a>
                </div>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="index.php" class="footer__logo">
                    <img src="assets/img/klogo2.png" alt="" class="footer__logo-img"> BEM BIU
                </a>


                <div class="footer__social">
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-instagram-alt'></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-twitter'></i>
                    </a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">About</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Features</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">News</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Services</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Discounts</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Shipping mode</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Company</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Blog</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Our mision</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>


</html>