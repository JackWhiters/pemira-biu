<?php 

$koneksi = mysqli_connect("localhost","disstore_pemira","jambubiji123","disstore_pemira");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>