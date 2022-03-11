<?php
session_start();
include 'koneksi.php';

$msg="";
if(isset($_POST['login'])){
    $ip_address=getUserIpAddr();  
    $time=time()-30; //30 detik  
    $check_attmp=mysqli_fetch_assoc(mysqli_query($koneksi,"select count(*) as total_count from attempt_count where time_count>$time and ip_address='$ip_address'"));  
        //print_r($check_attmp);
    $total_count=$check_attmp['total_count']; 
    $captcha=$_POST['captcha'];
     
    if($total_count==3) {  
        $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
    }elseif($_SESSION['CODE']==$captcha) { 
             
            $kode_aksess = mysqli_real_escape_string($koneksi, $_POST['kode_akses']);
            $nimk = mysqli_real_escape_string($koneksi, $_POST['nim']);
            $data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_akses INNER JOIN tbl_dpt ON tbl_akses.nim = tbl_dpt.nim WHERE kode_akses='$kode_aksess' AND tbl_akses.nim ='$nimk'");
            $r = mysqli_fetch_array($data_akses);
            $nim = isset($r['nim']);
            $kode_akses = isset($r['kode_akses']);
            $nama_mhs = isset($r['nama_mhs']);
            $level = isset($r['level']);
        if($total_count==3) {  
                $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
            } else if( mysqli_num_rows($data_akses) == 1 ) {
                $level = $r['level'];
                $nama_mhs = $r['nama_mhs'];
                $_SESSION["login"] = true;
                $_SESSION['nim'] = $nim;
                $_SESSION['nama_mhs'] = $nama_mhs;
                $_SESSION['kode_akses'] = $kode_akses;
                $_SESSION['level'] = $level;

                    $sql_query = "select count(*) as cntUser from tbl_akses where nim='".$nimk."' and kode_akses='".$kode_aksess."'";
                    $result = mysqli_query($koneksi,$sql_query);
                    $row = mysqli_fetch_array($result);
                    $count = $row['cntUser'];

                    if($count > 0){
                        $token = getToken(10);
                        $_SESSION['nim'] = $nimk;
                        $_SESSION['token'] = $token;
                    
                        // Update user token 
                        $result_token = mysqli_query($koneksi, "select count(*) as allcount from user_token where nim='".$nimk."' ");
                        $row_token = mysqli_fetch_assoc($result_token);
                        if($row_token['allcount'] > 0){
                           mysqli_query($koneksi,"update user_token set token='".$token."' where nim='".$nimk."'");
                        }else{
                           mysqli_query($koneksi,"insert into user_token(nim,token) values('".$nimk."','".$token."')");
                        }
                        header("location:sistem/index.php");  
                      }
            mysqli_query($koneksi,"delete from attempt_count where ip_address='$ip_address'");  
                      
            } else {  
                $total_count++;   
                $time_remain=3-$total_count;  
                $time=time();  
                if ($time_remain==0) {  
                  $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
                } else {  
                  $msg="NIM Atau Kode Akses Salah ".$time_remain. " Tersisa";  
                } 
                mysqli_query($koneksi,"INSERT INTO `attempt_count`(`ip_address`, `time_count`) VALUES ('$ip_address','$time')");  
            }  
        } else {
            $total_count++;   
            $time_remain=3-$total_count;  
            $time=time();  
            if ($time_remain==0) {  
              $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
            } else {  
              $msg="KODE CAPTCHA SALAH ".$time_remain. " Tersisa";  
            } 
            mysqli_query($koneksi,"INSERT INTO `attempt_count`(`ip_address`, `time_count`) VALUES ('$ip_address','$time')");  
   
        }
}
        //fungsi untuk mendapat IP Client
    function getUserIpAddr(){  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }
    
        // membuat token
    function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
    
        for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
        }
  
    return $token;
  }
?>
            <!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
                <!--=============== FAVICON ===============-->
                <link rel="shortcut icon" href="assets/img/klogo2.png" type="image/x-icon">
            
                <!--=============== BOXICONS ===============-->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
            
                <!--=============== SWIPER CSS ===============-->
                <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
            
                <!--=============== CSS ===============-->
                <link rel="stylesheet" href="assets/css/styles2.css">
                
                <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
                <script src="https://kit.fontawesome.com/a81368914c.js"></script>
            
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
                        <a href="index.php" class="nav__link">Kembali</a>
                    </li>

                    <a href="vote2.php" class="button button--ghost">VOTING</a>
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
            
                <!--===================== LOG-IN FORM =====================-->
                <div class="wave"><svg viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M-115.75,-254.46 C79.88,352.34 252.58,-101.28 280.22,268.33 L176.51,161.59 L-8.01,232.76 Z" style="stroke: none; fill: #66ffcc;"></path></svg></div>
                
                <main class="main">
                    <section class="login section" id="login">
                        <div class="login__container container grid">
                            <div class="img__login">
                                <img src="assets/img/klogo2.png">
                            </div>
                            <div class="login-content">
                                <form data-toggle="validator" action="" method="post" id="frmCaptcha">
                                    <img src="assets/img/avatar.svg">
                                    <h2 class="login__title">Welcome</h2>
                                    <div class="input-div one">
                                        <div class="i">
                                                <i class="fas fa-user"></i>
                                        </div>
                                        <div class="div">
                                            <h5>NIM</h5>
                                            <input type="text" class="input" name="nim" id="nim" autocomplete="off" required>
                                        </div>
                                    </div>
                                    
                                    <div class="input-div pass">
                                        <div class="i"> 
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <div class="div">
                                            <h5>Kode Akses</h5>
                                            <input type="password" class="input" name="kode_akses" id="kode_akses" autocomplete="off" required>
                                        </div>
                                    </div>
                                    
                                    <div class="input-div two">
                                        <div class="i">
                                                <i class="fas fa-user"></i>
                                        </div>
                                        <div class="div">
                                            <h5>Captcha</h5>
                                        <img class="captcha" src="captcha.php">

                                            <input type="text" class="input" name="captcha" id="captcha" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="div"><?php echo $msg ?></div>
                                    <ul class="link__bottom">
                                        <li>
                                        <button type="submit" class="button" name="login" id="login">Login</button> 
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </section>
                </main>


    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>
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
    
</body>

</html>