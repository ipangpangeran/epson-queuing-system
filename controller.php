<?php
session_start();

 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:index.php");
}
else{
include "config/database.php";
include "config/fungsi_zona.php";
include('headerSystem.php'); 

$link=$_GET['link'];
$act=$_GET['act'];


if ($link=='save-antrian' AND $act=='input'){   
    
  mysql_query("INSERT INTO `antrian_save`(`nomor_antrian`, `created`, `created_by`) 
               VALUES ('$_POST[nomor_antrian]','$wib','$_SESSION[user_id]')");
  mysql_query("UPDATE total_antrian SET status = 'success' WHERE id = ''");
  echo "<script>
                window.alert('Data: $_POST[nomor_antrian] Berhasil Ditambah $wib');
                window.location='system.php?link=menu-antrian'
        </script>";
}
/*elseif ($link=='save-antrian-service' AND $act=='input'){   
    
  mysql_query("INSERT INTO `antrian_service_save`(`nomor_antrian`, `created`, `created_by`) 
               VALUES ('$_POST[nomor_antrian]','$wib','$_SESSION[user_id]')");
  echo "<script>
                window.alert('Data: $_POST[nomor_antrian] Berhasil Ditambah $wib');
                window.location='system.php?link=menu-antrian-service'
        </script> ";
}
elseif ($link=='save-antrian-pengambilan' AND $act=='input'){   
    
  mysql_query("INSERT INTO `antrian_pengambilan_save`(`nomor_antrian`, `created`, `created_by`) 
               VALUES ('$_POST[nomor_antrian]','$wib','$_SESSION[user_id]')");
  echo "<script>
                window.alert('Data: $_POST[nomor_antrian] Berhasil Ditambah $wib');
                window.location='system.php?link=menu-antrian-pengambilan'
        </script> ";
}*/
elseif ($link=='daftar-customer' AND $act=='delete'){
  mysql_query("DELETE FROM antrian_save WHERE id='$_GET[id]'");
  echo "<script>
                window.alert('Data : $_GET[id], Berhasil Dihapus');
                window.location='system.php?link=daftar-customer'
        </script> ";
}
/*elseif ($link=='daftar-customer-service' AND $act=='delete'){
  mysql_query("DELETE FROM antrian_service_save WHERE id='$_GET[id]'");
  echo "<script>
                window.alert('Data : $_GET[id], Berhasil Dihapus');
                window.location='system.php?link=daftar-customer-service'
        </script> ";
}
elseif ($link=='daftar-customer-pengambilan' AND $act=='delete'){
  mysql_query("DELETE FROM antrian_pengambilan_save WHERE id='$_GET[id]'");
  echo "<script>
                window.alert('Data : $_GET[id], Berhasil Dihapus');
                window.location='system.php?link=daftar-customer-pengambilan'
        </script> ";
}
*/elseif ($link=='daftar-customer' AND $act=='deleteall'){
  mysql_query("DELETE FROM antrian_save");
  echo "<script>
                window.alert('Semua Data Customer Berhasil Dihapus');
                window.location='system.php?link=daftar-customer'
        </script> ";
}
/*elseif ($link=='daftar-customer-service' AND $act=='deleteall'){
  mysql_query("DELETE FROM antrian_service_save");
  echo "<script>
                window.alert('Semua Data Customer Service Berhasil Dihapus');
                window.location='system.php?link=daftar-customer-service'
        </script> ";
}
elseif ($link=='daftar-customer-pengambilan' AND $act=='deleteall'){
  mysql_query("DELETE FROM antrian_pengambilan_save");
  echo "<script>
                window.alert('Semua Data Customer Pengambilan Barang Berhasil Dihapus');
                window.location='system.php?link=daftar-customer-pengambilan'
        </script> ";
}*/
elseif ($link=='sales-save-xls' AND $act=='save'){
  echo "<script>
                window.alert('Data export to excel, coca cek sana!');
                window.location='system.php?link=sales-save-xls'
        </script> ";
}

 include('footer.php');
}
?>
