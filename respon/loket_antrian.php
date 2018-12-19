<?php 
error_reporting(0);

include '../config/database.php';

     $sql = mysql_query("SELECT * FROM `temp_antrian` WHERE id = 1");
      $r  = mysql_fetch_array($sql);
      if(empty($r)){
          echo "OFF";
      }else{
        echo $r['loket'];
      }
?>