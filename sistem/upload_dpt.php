<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index.php");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
$nim_ketua= mysqli_real_escape_string($koneksi, $_POST['nim_ketua']);
$nm_paslon_ketua= mysqli_real_escape_string($koneksi, $_POST['nm_paslon_ketua']);
$nim_wakil= mysqli_real_escape_string($koneksi, $_POST['nim_wakil']);
$nm_paslon_wakil= mysqli_real_escape_string($koneksi, $_POST['nm_paslon_wakil']);
$no_urut= mysqli_real_escape_string($koneksi, $_POST['no_urut']);

    if($_POST['simpan']){
            $ekstensi_diperbolehkan = array('png','jpg','JPG');
            $gambar1 = $_FILES['gambar1']['name'];
            $x = explode('.', $gambar1);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['gambar1']['size'];
            $file_tmp = $_FILES['gambar1']['tmp_name'];     
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran <= 2000000){          
                    move_uploaded_file($file_tmp, 'foto/'.$gambar1);
                    $query = mysqli_query($koneksi, "INSERT INTO data_paslon VALUES(NULL, '$gambar1')");
            $gambar2 = $_FILES['gambar2']['name'];
            $x = explode('.', $gambar2);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['gambar2']['size'];
            $file_tmp = $_FILES['gambar2']['tmp_name'];     
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran <= 2000000){          
                    move_uploaded_file($file_tmp, 'foto/'.$gambar2);
                    $query = mysqli_query($koneksi, "INSERT INTO data_paslon VALUES(NULL, '$gambar2')");
                }
            }
        }
      }
    }
        
    mysqli_query($koneksi,"INSERT INTO data_paslon(id, nim_ketua, nm_paslon_ketua, gambar1, nim_wakil, nm_paslon_wakil, gambar2, no_urut)
    VALUES ('','$nim_ketua','$nm_paslon_ketua','$gambar1','$nim_wakil','$nm_paslon_wakil','$gambar2','$no_urut')");
    ?>
    <script>window.alert('Berhasil');
    window.location='input_data_paslon.php';</script>;
    <?php
    
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
                <a href="index.php" class="navbar-brand mx-4 mb-3">
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
                    <a class="nav-item nav-link  active" href="upload_dpt.php">
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
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img class="rounded-circle" src="logo.png" alt="" style="width: 40px; height: 40px;"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="login100-pic d-lg-inline-flex"><?php echo $_SESSION['nama_mhs']; ?></span>
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
                  <h2><i class="fa fa-user"> Upload DPT</i></h2>   
                </div>
              </div>

         
              <div class="row">
                <div class="col-lg-6">
                    <?php 
                       if(isset($_GET['berhasil'])){
                       echo "<p>".$_GET['berhasil']." Data DPT berhasil di Upload</p>";
                        }
                    ?>
                    <form action="aksi_upload_dpt.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <br>
                        <label><b>Format file xls</b></label>
                        <input type="file" name="file_dpt" required="required" class="form-control-file">
                      </div>
                      <br>
                      <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-success" value="upload">
                      </div>
                      <br>
                    </form>

                    <h3>Data DPT Belum memilih</h3>
                    <br>
                    <div>
                      	<form method="post" action="#">
                            <input type="text" name="q" placeholder="Cari...">
                            <select name="column">
                              <option value="nim">NIM</option>
                              <option value="nama_mhs">NAMA</option>
                            </select>
                            <input type="submit" name="submit" value="Find">
                      </form>
                    </div>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                          <tr>
                              <th>Nim</th>
                              <th>Nama</th>
                              <th>Status</th>
                              <th>Email</th>
                              <th>Opsi</th>
                          </tr>
                            <?php
                              	if (isset($_POST['submit'])) {

                                              $q = $koneksi->real_escape_string($_POST['q']);
                                              $column = $koneksi->real_escape_string($_POST['column']);

                                              if ($column == "nim") {
                                                  $column = "nim";
                                              $sql = $koneksi->query("SELECT * FROM tbl_dpt WHERE $column LIKE '%$q%'");
                                              if (!empty($sql) && $sql->num_rows > 0) {
                                                while ($data = $sql->fetch_array()) {
                                                         ?>
                                                  <tr>
                                                    <td><?php echo $data['nim']; ?></td>
                                                    <td style="text-transform: capitalize;"><?php echo $data['nama_mhs']; ?></td>
                                                    <td><mark style="background-color: yellow;"><b><?php echo $data['status']; ?></b></mark></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus_dpt.php?nim=<?php echo $data['nim']; ?>">Hapus</a>
                                                  </td>
                                                  </tr>
                                                <?php
                                                }
                                              } else
                                                echo "<center>Data Nim Tidak Ada!</center>";
                                                  }
                                              else if ($column == "nama_mhs") {
                                                       $column = "nama_mhs";
                                                      $sql = $koneksi->query("SELECT * FROM tbl_dpt WHERE $column LIKE '%$q%'");
                                                      if (!empty($sql) && $sql->num_rows > 0) {
                                                while ($data = $sql->fetch_array()) {
                                                         ?>
                                                  <tr>
                                                    <td><?php echo $data['nim']; ?></td>
                                                    <td style="text-transform: capitalize;"><?php echo $data['nama_mhs']; ?></td>
                                                    <td><mark style="background-color: yellow;"><b><?php echo $data['status']; ?></b></mark></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus_dpt.php?nim=<?php echo $data['nim']; ?>">Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                              } else
                                                echo "<center>Data Nama Tidak Ada!</center>";
                                              }
                                            else if($column == '' || $column == '') {
                                                    $data_dpt = mysqli_query($koneksi,"SELECT * FROM tbl_dpt WHERE status='Belum memilih'");
                                                    while($d = mysqli_fetch_array($data_dpt)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $d['nim']; ?></td>
                                                        <td style="text-transform: capitalize;"><?php echo $d['nama_mhs']; ?></td>
                                                        <td><mark style="background-color: yellow;"><b><?php echo $d['status']; ?></b></mark></td>
                                                        <td><?php echo $d['email']; ?></td>
                                                        <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus_dpt.php?nim=<?php echo $d['nim']; ?>">Hapus</a>
                                                        </td>
                                                    </tr>
                                                      <?php } 
                                            }
                                            else if($column == '') {
                                                    $data_dpt = mysqli_query($koneksi,"SELECT * FROM tbl_dpt WHERE status='Belum memilih'");
                                                    while($d = mysqli_fetch_array($data_dpt)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $d['nim']; ?></td>
                                                        <td style="text-transform: capitalize;"><?php echo $d['nama_mhs']; ?></td>
                                                        <td><mark style="background-color: yellow;"><b><?php echo $d['status']; ?></b></mark></td>
                                                        <td><?php echo $d['email']; ?></td>
                                                        <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus_dpt.php?nim=<?php echo $d['nim']; ?>">Hapus</a>
                                                        </td>
                                                    </tr>
                                                      <?php } 
                                            }
                                  }
                                  else {
                                      $data_dpt = mysqli_query($koneksi,"SELECT * FROM tbl_dpt WHERE status='Belum memilih'");
                                      while($d = mysqli_fetch_array($data_dpt)){
                            ?>
                          <tr>
                              <td><?php echo $d['nim']; ?></td>
                              <td style="text-transform: capitalize;"><?php echo $d['nama_mhs']; ?></td>
                              <td><mark style="background-color: yellow;"><b><?php echo $d['status']; ?></b></mark></td>
                              <td><?php echo $d['email']; ?></td>
                              <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus_dpt.php?nim=<?php echo $d['nim']; ?>">Hapus</a>
                              </td>
                          </tr>
                            <?php } 
                                  }
                                  ?>
                             
                        </table>
                      </div>
                  </div>


                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-12">
                        <h3>Data DPT sudah memilih</h3>
                          <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Waktu</th>
                            </tr>
                              <?php
                                $data_dpt = mysqli_query($koneksi,"SELECT * FROM tbl_dpt WHERE status='(Sudah memilih)'");
                                while($d = mysqli_fetch_array($data_dpt)){
                              ?>
                            <tr>
                                <td><?php echo $d['nim']; ?></td>
                                <td><?php echo $d['nama_mhs']; ?></td>
                                <td><mark style="background-color: #00cc00; color: white;"><b><?php echo $d['status']; ?></b></mark></td>
                                <td><?php echo $d['waktu']; ?></td>
                                
                            </tr>
                              <?php } ?>
                          </table>
                        </div>
                      </div>
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
