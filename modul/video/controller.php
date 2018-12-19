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

$module=$_GET['link'];
$act=$_GET['act'];

// Input video
if ($module=='video' AND $act=='input'){
  if(isset($_FILES['video'])){
           
            $name = $_FILES['video']['name'];
            $type = explode('.', $name);
            $type = end($type);
            $size = $_FILES['video']['size'];
            $tmp = $_FILES['video']['tmp_name'];
            if($type != 'mp4' && $type != 'MP4' && $type != 'flv' && $type != 'FLV'){
              echo "<script>
                    window.alert('Format Tidak Sesuai');
                    window.location='../../system.php?link=video&act=Add'
                    </script> ";
            } else {
              $num = mysql_query("SELECT * FROM videos");
              $random_name = mysql_num_rows($num)+1;
              move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$type);
              mysql_query("INSERT INTO videos VALUES('','$name', '$random_name.$type', '$_SESSION[user_id]', '$wib')");
              echo "<script>
                    window.alert('Upload Berhasil');
                    window.location='../../system.php?link=video'
                    </script> ";
            }
  }
            
}

// Hapus video
elseif ($module=='video' AND $act=='delete'){
  $url = mysql_query("SELECT url FROM videos WHERE id='$_GET[id]'");
  while($url = mysql_fetch_array($url)){
    $loc_file = $url[0];
  };
  mysql_query("DELETE FROM videos WHERE id='$_GET[id]'");
  unlink('videos/'.$loc_file);
  header('location:../../system.php?link='.$module);
}

else {
    echo "<script>
                window.alert('SISTEM SEDANG BERMASALAH');
                window.location='../../system.php?link=video'
        </script> ";
}
}
?>
