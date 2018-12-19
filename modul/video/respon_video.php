<?php
include '../../config/database.php';
$detail = mysql_query("SELECT * FROM videos");
$r = mysql_fetch_array($detail); 
$end = mysql_num_rows($detail);
?>

<body onload="tes()">
<div id='media-player' class="span12">
   <video id="media-video" src="modul/video/videos/1.mp4" class="span12" style="margin-top:5px; margin-left:12px;" controls autoplay >
      <input type="hidden" id="end" value="<?php echo $end; ?>"/>
   </video>
</div>
</body>

<!--SCRIPT NEXT VIDEO-->
<script type="text/javascript">
function tes(){
  var vid = document.getElementById("media-video");
  var end = document.getElementById("end").value;
  var i = 2;
  console.log("Playing 1.mp4");
    vid.onended = function(){
      console.log("Playing "+i+".mp4");
      vid.src = "modul/video/videos/"+i+".mp4";
      i++;
      if(i > end){
        i=1;
      }
    }
}
</script>