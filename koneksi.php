<?php 

$koneksi = mysqli_connect("localhost:3306","root","","e-pemira");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>