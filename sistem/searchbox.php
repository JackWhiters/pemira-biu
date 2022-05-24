<?php
include "../koneksi.php";
	if (isset($_POST['submit'])) {

		$q = $koneksi->real_escape_string($_POST['q']);
		$column = $koneksi->real_escape_string($_POST['column']);

		if ($column == "" || ($column != "nim" && $column != "nama_mhs")) {
        $column = "nim";

		$sql = $koneksi->query("SELECT nim FROM tbl_dpt WHERE $column LIKE '%$q%'");
		if (!empty($sql) && $sql->num_rows > 0) {
			while ($data = $sql->fetch_array())
				echo $data['nim'] . "<br>";
		} else
			echo "Data Nim Tidak Ada!";
        }
        else if ($column == "nama_mhs") {
			 $column = "nama_mhs";
            $sql = $koneksi->query("SELECT nama_mhs FROM tbl_dpt WHERE $column LIKE '%$q%'");
            if (!empty($sql) && $sql->num_rows > 0) {
			while ($data = $sql->fetch_array())
				echo $data['nama_mhs'] . "<br>";
		} else
			echo "Data Nama Tidak Ada!";
        }

        }
?>