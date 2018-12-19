<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:../../home.php?link=home");
}
else{
include "../../config/database.php";

echo '{ "aaData":  ';
$sql = mysql_query("SELECT  id, name, url FROM videos");
$i = 1;
    while ($r=mysql_fetch_array($sql)){
    	array_splice($r, 0, 0, $i);
        $aaData[] = $r;
    	$i++;
     }
    $json_format = json_encode($aaData);
echo $json_format;
echo " }";	

}

?>
