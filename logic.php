<?php 

$msg="";
if(isset($_POST['login'])){
    $ip_address=getUserIpAddr();  
    $time=time()-30; //30 detik  
    $check_attmp=mysqli_fetch_assoc(mysqli_query($koneksi,"select count(*) as total_count from attempt_count where time_count>$time and ip_address='$ip_address'"));  
        //print_r($check_attmp);
    $total_count=$check_attmp['total_count']; 
    $captcha=$_POST['captcha'];
     
    if($total_count==3) {  
        $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
    }elseif($_SESSION['CODE']==$captcha) { 
             
            $kode_aksess = mysqli_real_escape_string($koneksi, $_POST['kode_akses']);
            $nimk = mysqli_real_escape_string($koneksi, $_POST['nim']);
            $data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_akses INNER JOIN tbl_dpt ON tbl_akses.nim = tbl_dpt.nim WHERE kode_akses='$kode_aksess' AND tbl_akses.nim ='$nimk'");
            $r = mysqli_fetch_array($data_akses);
            $nim = isset($r['nim']);
            $kode_akses = isset($r['kode_akses']);
            $nama_mhs = isset($r['nama_mhs']);
            $level = isset($r['level']);
        if($total_count==3) {  
                $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
            } else if( mysqli_num_rows($data_akses) == 1 ) {
                $level = $r['level'];
                $nama_mhs = $r['nama_mhs'];
                $_SESSION["login"] = true;
                $_SESSION['nim'] = $nim;
                $_SESSION['nama_mhs'] = $nama_mhs;
                $_SESSION['kode_akses'] = $kode_akses;
                $_SESSION['level'] = $level;

                    $sql_query = "select count(*) as cntUser from tbl_akses where nim='".$nimk."' and kode_akses='".$kode_aksess."'";
                    $result = mysqli_query($koneksi,$sql_query);
                    $row = mysqli_fetch_array($result);
                    $count = $row['cntUser'];

                    if($count > 0){
                        $token = getToken(10);
                        $_SESSION['nim'] = $nimk;
                        $_SESSION['token'] = $token;
                    
                        // Update user token 
                        $result_token = mysqli_query($koneksi, "select count(*) as allcount from user_token where nim='".$nimk."' ");
                        $row_token = mysqli_fetch_assoc($result_token);
                        if($row_token['allcount'] > 0){
                           mysqli_query($koneksi,"update user_token set token='".$token."' where nim='".$nimk."'");
                        }else{
                           mysqli_query($koneksi,"insert into user_token(nim,token) values('".$nimk."','".$token."')");
                        }
                        header("location:sistem/index.php");  
                      }
            mysqli_query($koneksi,"delete from attempt_count where ip_address='$ip_address'");  
                      
            } else {  
                $total_count++;   
                $time_remain=3-$total_count;  
                $time=time();  
                if ($time_remain==0) {  
                  $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
                } else {  
                  $msg="NIM Atau Kode Akses Salah ".$time_remain. " Tersisa";  
                } 
                mysqli_query($koneksi,"INSERT INTO `attempt_count`(`ip_address`, `time_count`) VALUES ('$ip_address','$time')");  
            }  
        } else {
            $total_count++;   
            $time_remain=3-$total_count;  
            $time=time();  
            if ($time_remain==0) {  
              $msg="Anda Mencoba Terlalu Banyak Tunggu 30 Detik";  
            } else {  
              $msg="KODE CAPTCHA SALAH ".$time_remain. " Tersisa";  
            } 
            mysqli_query($koneksi,"INSERT INTO `attempt_count`(`ip_address`, `time_count`) VALUES ('$ip_address','$time')");  
   
        }
}
        //fungsi untuk mendapat IP Client
    function getUserIpAddr(){  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }
    
        // membuat token
    function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
    
        for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
        }
  
    return $token;
  }
?>