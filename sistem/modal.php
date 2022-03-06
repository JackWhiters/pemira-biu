<?php
include "../koneksi.php";
 
$userid = $_POST['userid'];
 
$sql = "select * from data_paslon where id=".$userid;
$result = mysqli_query($koneksi,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td><h1>VISI<h1></td>
</tr>
<tr>
    <td><?php echo $row['visi']; ?></td>
</tr>
<tr>
    <td><br></td>
</tr>
<tr>
    <td><h1>MISI</h1></td>
</tr>
<tr>
    <td><?php echo $row['misi']; ?></td>
</tr>

</table>
 
<?php } ?>