<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index.php");
  exit;
}
include '../koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['akses'])) {
  $nim = $_POST['nim'];
  $query = mysqli_query($koneksi, "SELECT email FROM tbl_dpt WHERE nim='$nim'");
  $email= mysqli_fetch_array($query);
function acak($panjang)
{
    $kode_akses = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($kode_akses)-1);
  $string .= $kode_akses[$pos];
    }
    return $string;
}
//cara memanggilnya
$hasil= acak(6);


}

error_reporting(0);

if(isset($_POST['simpan'])) {
$nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
$kode_akses= mysqli_real_escape_string($koneksi, $_POST['kode_akses']);


    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_akses WHERE nim='$nim'"));
    if ($cek > 0){
    echo "<script>window.alert('Maaf Anda sdh terdaftar sebelumnya')
    window.location='buat_akses.php'</script>";
    }else {
    mysqli_query($koneksi,"INSERT INTO tbl_akses(nim, kode_akses)
    VALUES ('$nim','$kode_akses')");
 
    // echo "<script>window.alert('kode akses telah aktif')
    // window.location='buat_akses.php'</script>";
    }


  
    $mail = new PHPMailer(true);
  
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pwdformatif@gmail.com';                     //SMTP username
    $mail->Password   = 'pwdformatif123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
$kode_akses= mysqli_real_escape_string($koneksi, $_POST['kode_akses']);





$query = mysqli_query($koneksi, "SELECT email FROM tbl_dpt WHERE nim='$nim'");
$email= mysqli_fetch_array($query);

$query2 = mysqli_query($koneksi, "SELECT kode_akses FROM tbl_akses WHERE nim='$nim'");

  $kode_akses2 = mysqli_fetch_array($query2);

  $mail->setFrom('pwdformatif@gmail.com', 'BEM BIU'); //Add a recipient
  $mail->addAddress($email['email']);
  
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = "BEM BIU (KODE AKSES - PEMIRA)";
  $mail->Body    = 'NIM = '.$nim.'<br>ini Kode Verifikasi Kamu <b>'.$kode_akses2['kode_akses'].'</b>';
  if($mail->send()){
	
    // echo  header("Location: buat_akses.php");
    echo "<script>window.alert('kode akses telah aktif dan sudah terkirim di email')
    window.location='buat_akses.php'</script>";
     
      } else{
          echo 'Gagal Untuk Mengirim Pesan Email.';
  }
  

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aplikasi E-Pemira</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img class="rounded-circle" src="logo.png" alt="" style="width: 40px; height: 40px;"></i> E-PEMIRA</h3>
                </a>

                <!-- Navbar -->
                <div class="navbar-nav w-100">

                <li class="nav-item active">
                    <a class="nav-item nav-link" href="index.php">
                        <i class="fa fa-desktop"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <?php
                $level = $_SESSION['level'] == 'admin';
                if($level){
                  ?>

                <li class="nav-item">
                    <a class="nav-item nav-link" href="input_data_paslon.php">
                        <i class="fa fa-user"></i>
                        <span>Input Data Paslon</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-item nav-link" href="upload_dpt.php">
                        <i class="fa fa-file"></i>
                        <span>Upload DPT</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-item nav-link active" href="buat_akses.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Buat Akses</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-item nav-link"  href="hasil_suara.php">
                        <i class="fa fa-chart-bar"></i>
                        <span>Hasil Suara</span>
                    </a>
                </li>

                <?php } ?>
                <br>
                <li class="nav-item nav-link">
                    <a class="nav-link" href="../logout.php">
                        <span>Logout</span>
                    </a>
                </li>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img class="rounded-circle" src="logo.png" alt="" style="width: 40px; height: 40px;"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['nama_mhs']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Surat Suara -->
            <div id="page-wrapper" >
            <div id="page-inner" style="margin:25px 25px 25px 25px">
              <div class="row">
                <div class="col-lg-12">
                  <h2><i class="fa fa-lightbulb-o"> Buat Akses</i></h2>   
                </div>
              </div>              

                <div class="row">
                  <div class="col-lg-6">
                    <form action="" method="post">
                      <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" required="required" placeholder="Masukan NIM..." class="form-control" autocomplete="off">
                      </div>
                      <br>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="akses" value="Filter" class="form-control">
                      </div>
                      <br>                        
                    </form>

                    <form action="" method="post">
                       <div class="form-group">
                        <input type="text" style="background-color: yellow; font-size: 22px;" name="nim" placeholder="nim" required="required" class="form-control" value="<?php echo $nim; ?>">
                      </div>
                      <br>
                      <div class="form-group">
                        <input type="text" style="background-color: yellow; font-size: 22px;" name="email" placeholder="email" required="required" class="form-control" value="<?php echo $email['email']; ?>">
                      </div>
                      <br>
                      <div class="form-group">
                        <input type="text" style="background-color: yellow; font-size: 22px;" name="kode_akses" required="required" placeholder="Kode akses" class="form-control" autocomplete="off" value="<?php echo $hasil; ?>">
                      </div>
                      <br>
                      <div class="form-group">
                        <input type="submit" class="btn btn-success" name="simpan" value="Aktifkan" class="form-control">
                      </div>                        
                    </form>
                  </div>
                </div>
                 
                  <!-- /. ROW  --> 
              </div>
             <!-- /. PAGE INNER  -->
            </div>
            <!-- Surat Suara End -->



            <!-- Footer Start -->

            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>