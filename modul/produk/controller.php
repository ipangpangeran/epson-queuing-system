<?php
session_start();
error_reporting(0);
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:../../home.php?link=home");
}
else{
include "../../config/database.php";
include "../../config/fungsi_zona.php";
include "../../config/fungsi_thumb.php";
include "../../config/library.php";

$link=$_GET['link'];
$act=$_GET['act'];

// Input image
if ($link=='produk' AND $act=='input'){

  if(isset($_FILES['produk'])){
           
            $name = $_FILES['produk']['name'];
            $type = explode('.', $name);
            $type = end($type);
            $size = $_FILES['produk']['size'];
            $tmp = $_FILES['produk']['tmp_name'];

            if($type != 'jpg' && $type != 'JPG' && $type != 'jpeg' && $type != 'JPEG' && $type != 'PNG' && $type != 'png'){
              echo "<script>
                window.alert('Format Tidak Sesuai');
                window.location='../../system.php?link=produk&act=Add'
                </script> ";
            } else {
              $num = mysql_query("SELECT * FROM produk");
              $random_name = mysql_num_rows($num)+1;
              move_uploaded_file($tmp, 'images/'.$random_name.'.'.$type);
              mysql_query("INSERT INTO produk VALUES('','$name', '$random_name.$type', '$_POST[NAMA_PRODUK]', '$_POST[HARGA_PRODUK]', '$_SESSION[user_id]', '$wib')");
            echo "<script>
                window.alert('Upload Berhasil');
                window.location='../../system.php?link=produk'
                </script> ";
            }
  }
}

// Hapus image
elseif ($link=='produk' AND $act=='delete'){
  $url = mysql_query("SELECT url FROM produk WHERE id='$_GET[id]'");
  while($url = mysql_fetch_array($url)){
    $loc_file = $url[0];
  };
  mysql_query("DELETE FROM produk WHERE id='$_GET[id]'");
  unlink('images/'.$loc_file);
  header('location:../../system.php?link='.$link);
}

// Update 
elseif ($link=='produk' AND $act=='update'){
  mysql_query("UPDATE produk
                SET name_produk = '$_POST[NAMA_PRODUK]', price = '$_POST[HARGA_PRODUK]', created_by = '$_SESSION[user_id]', created = '$wib'
                WHERE id = '$_POST[id]'");
  echo "<script>
                window.alert('Data Berhasil Diubah');
                window.location='../../system.php?link=produk'
        </script> ";
}
else {
    echo "<script>
                window.alert('SISTEM SEDANG BERMASALAH');
                window.location='../../system.php?link=produk'
          </script> ";
}
}
?>
