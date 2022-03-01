<?php
session_start();
include 'koneksi.php';
if(isset($_POST['login'])){
    $captcha=$_POST['captcha'];
    if($_SESSION['CODE']==$captcha) {
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

    } else {
            echo "Please enter valid captcha code";
        }
    }
			?>