<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:../../home.php?link=home");
}
else{
include "../../config/database.php";
echo '{ "aaData":  ';
$sql = mysql_query("SELECT  id, isi_text FROM running_text");

    while ($r=mysql_fetch_array($sql)){
        $aaData[] = $r;
     }
    $json_format = json_encode($aaData);
echo $json_format;
echo " }";	
}
?>
