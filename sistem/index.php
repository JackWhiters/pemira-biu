<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index.php");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
  date_default_timezone_set('Asia/jakarta');
  $waktu = date('H:i:sa');
  $nim = $_SESSION['nim'];
  $kode_akses= $_SESSION['kode_akses'];
  $nomor_paslon =$_POST['nomor_paslon'];

  $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_paslon WHERE kode_akses='$kode_akses'"));
  if ($cek > 0){
    echo"<script>window.alert('Anda tidak bisa melakukan voting lagi')
          window.location='index.php'</script>";
        }else {
          mysqli_query($koneksi, "UPDATE tbl_dpt SET status='(Sudah Memilih)', waktu='$waktu' WHERE nim='$nim'");
          mysqli_query($koneksi,"INSERT INTO tbl_paslon(kode_akses, nomor_paslon)
            VALUES ('$kode_akses','$nomor_paslon')");

          echo"<script>window.alert('Voting Berhasil')
          window.location='index.php'</script>";
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
                    <a class="nav-item nav-link active" href="index.php">
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
                    <a class="nav-item nav-link" href="buat_akses.php">
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
                <a href="index.php" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="login100-pic d-lg-inline-flex"><b style="font-size: 18px;"><?= $_SESSION['nama_mhs']; ?></b></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="../logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Surat Suara -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4" >
                    <div class="card-body py-3" style="background-color : #01c05d;">
                        <br>
                        <br>
                        <h1 class="m-0 font-weight-bold text-center" style="color : white;">SURAT SUARA</h1>
                        <h1 class="m-0 font-weight-bold text-center" style="color : white;">PEMILIHAN RAYA</h1>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#01c05d" fill-opacity="1" d="M0,160L40,144C80,128,160,96,240,90.7C320,85,400,107,480,144C560,181,640,235,720,256C800,277,880,267,960,245.3C1040,224,1120,192,1200,165.3C1280,139,1360,117,1400,106.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
                    <div class="card-body">
                                
                        <h3 class="m-0 font-weight-bold text-center">KETUA DAN WAKIL KETUA</h3>
                        <h3 class="m-0 font-weight-bold text-center">BADAN EKSEKUTIF MAHASISWA</h3>
                        <h3 class="m-0 font-weight-bold text-center">UNIVERSITAS BINA INSANI</h3>
                        <h3 class="m-0 font-weight-bold text-center">TAHUN 2022</h3>
                        <div class="text-center"> 
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    
            
                    <div class="alert alert-success" style="background-color: white;">
                        <form action="" method="post">
                            <div class="row">
                                <?php
                                $data_paslon = mysqli_query($koneksi,"SELECT * FROM data_paslon");
                                while($d = mysqli_fetch_array($data_paslon)){
                                ?>
                                <div class="col-sm-12 col-xl-6">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <td colspan="2" style="background-color: #fffff; color: black; font-size: 50px; text-align: center;"><b><?php echo $d['no_urut']; ?></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img style="width: 100%;" src="<?php echo "foto/".$d['gambar1']; ?>"></td>
                                            <td><img style="width: 100%;" src="<?php echo "foto/".$d['gambar2']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><h2><?php echo $d['nm_paslon_ketua']; ?></h2></td>
                                            <td align="center"><h2><?php echo $d['nm_paslon_wakil']; ?></h2></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: center; padding: 20px; background-color: white;"><input type="radio" class="form-check-input" required="required" name="nomor_paslon" value="<?php echo $d['no_urut']; ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php } ?>
                                <input style="color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;" type="submit" name="simpan" value="Vote" class="btn btn-success" onclick="return confirm('YAKIN DENGAN PILIHAN ANDA')">
                            </div>    
                        </form> 
                    </div>
                </div> 
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