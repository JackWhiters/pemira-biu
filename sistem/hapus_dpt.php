<?php

include '../koneksi.php';

$nim= $_GET['nim'];

$pilih = mysqli_query($koneksi,"SELECT * FROM tbl_dpt WHERE nim='$nim'");
while(mysqli_fetch_array($pilih)){

mysqli_query($koneksi,"DELETE FROM tbl_dpt WHERE nim='$nim'");

header("location:upload_dpt.php");

}
?>