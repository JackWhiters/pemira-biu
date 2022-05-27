<?php 

$koneksi = mysqli_connect("localhost","bemf1323_pemira","jambubiji123","bemf1323_pemira");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>