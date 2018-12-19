<?php
include '../../config/database.php';
?>

<marquee style='margin: 4pt;' direction='left' scrollamount='9' height='35px' width='100%' bgcolor='#272B2E' behavior="scroll">
    <?php 
      $sql = mysql_query("SELECT id, isi_text FROM running_text");
             while ($r=mysql_fetch_array($sql)){
             echo "$r[isi_text]";
    }?>
</marquee>
