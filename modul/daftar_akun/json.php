<?php
session_start();
include "../../config/database.php";

echo '{ "aaData":  ';
$sql = mysql_query("SELECT USER_ID, USERNAME, NAMA_LENGKAP FROM users");
	$i = 1;
    while ($r=mysql_fetch_array($sql)){
    array_splice($r, 0, 0, $i);    
        $aaData[] = $r;
        $i++;
     }
    $json_format = json_encode($aaData);
echo $json_format;
echo " }";	



?>
