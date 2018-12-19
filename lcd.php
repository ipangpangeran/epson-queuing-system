<?php 
error_reporting(0);

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Layar LCD Utama</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="ILKOM IPB">
<meta name="author" content="Pangeran">

<!-- Le styles -->
<link href="webroot/css/lib/bootstrap.css" rel="stylesheet">
<link href="webroot/css/lib/bootstrap-responsive.css" rel="stylesheet">
<link href="webroot/css/boo-extension.css" rel="stylesheet">
<link href="webroot/css/boo_1.css" rel="stylesheet">
<link href="webroot/css/style.css" rel="stylesheet">
<link href="webroot/css/boo-coloring.css" rel="stylesheet">
<link href="webroot/css/boo-utility.css" rel="stylesheet">
<link href="webroot/css/video.css" rel="stylesheet">
<link href="webroot/css/w3.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="webroot/plugins/selectivizr/selectivizr-min.js"></script>
    <script src="webroot/plugins/flot/excanvas.min.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="webroot/ico/epson.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="webroot/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="webroot/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="webroot/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="webroot/ico/apple-touch-icon-57-precomposed.png">
<style> 
    .color { color:black; }  
    .blink { padding-top:20px; color:white; -webkit-animation: blink .75s linear infinite; -moz-animation: blink .75s linear infinite; -ms-animation: blink .75s linear infinite; -o-animation: blink .75s linear infinite; animation: blink .75s linear infinite; } @-webkit-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @-moz-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @-ms-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @-o-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } 
</style>

<script src="webroot/js/lib/jquery.js"></script>            
<link rel="stylesheet" href="compiled/flipclock.css">
</head>

<body class="sidebar-left">
<div class="page-container">
    <div id="header-container">
    <div id="main-container">
    
<!-- ANTRIAN -->
    <?php include "content.php" ?>

        <div id="main-content" class="main-content container-fluid">
         <div id="page-content" class="page-content">

<!-- VIDEO -->
<?php
  include 'config/database.php';
  $detail = mysql_query("SELECT * FROM videos");
  $r = mysql_fetch_array($detail); 
  $end = mysql_num_rows($detail);
?>
<body onload="tes()">
    <section>                    
     <div class="row-fluid">
        <div class="span12">
            <div id='media-player' class="span12">
            <video id="media-video" src="modul/video/videos/1.mp4" class="span12" style="margin-top:5px; margin-left:12px;" controls autoplay>
                <input type="hidden" id="end" value="<?php echo $end; ?>"/>
            </video>
            </div>
        </div>
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

<!-- SCRIPT REAL TIME VIDEO -->
<script>
  $(document).ready(function() {
  $("#media-video").load();
   var refreshId = setInterval(function() {
  $("#media-video").load();
   }, 100000); //setiap 10 menit refresh
  $("#media-video").autoplay = true;
  $.ajaxSetup({ cache: false });
});
</script>

<!-- IMAGE PRODUK -->
<?php
  include 'config/database.php';
  $binjai = mysql_query("SELECT * FROM produk");
  $wew = mysql_num_rows($binjai);
?>

<div class="row-fluid">
    <div class="w3-content w3-section" style="max-width:500px; max-height:150px">
        <img id="media-image" class="mySlides w3-animate-fading"  src="" type='image/png' width="100%" height="50%" ">
        <input type="hidden" id="wew" value="<?php echo $wew; ?>"/>
    </div>
</div>

<script>
var i = 1;
carousel();

function carousel() {
    var x = document.getElementById("wew").value; 
    if (i > x) {i = 1}
    document.getElementById("media-image").src="modul/produk/images/"+i+".png";
    i++;
    setTimeout(carousel, 10000);
}
</script>

<!-- SCRIPT REAL TIME PICTURE PRODUK -->
<script>
  $(document).ready(function() {
  $("#media-image").load();
   var refreshId = setInterval(function() {
  $("#media-image").load();
   }, 100000);
  $.ajaxSetup({ cache: false });
});
</script>

         </div>
        </div>
    </div>
    </div>

    <?php include "footer_lcd.php" ?>

</div>
</body>
</html>
