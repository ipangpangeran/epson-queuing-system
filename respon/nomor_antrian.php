<?php 
error_reporting(0);

include '../config/database.php';

     $sql = mysql_query("SELECT * FROM `temp_antrian`");
      $r  = mysql_fetch_array($sql);
      if(empty($r)){
          echo "-";
      }else{
        echo $r['nomor_antrian'];
      }
?>