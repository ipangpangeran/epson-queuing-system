<?php 
session_start();
error_reporting(0);

include "timeout.php";

    if($_SESSION[login]==1){
	   if(!cek_login()){
		  $_SESSION[login] = 0;
	}
}
    if($_SESSION[login]==0){
        header('location:logout.php');
}
    else{
    if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=index.php><b>LOGIN</b></a></center>";
}
    else{
   // include('headerSystem.php'); 
?>

<!DOCTYPE HTML>
<!--
	Aerial 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
<link rel="shortcut icon" href="webroot/ico/epson.png" />
<link rel="stylesheet" href="css/button.css" />

<title>EPSON SERVICE CENTRES INDONESIA</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="jquery.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="overlay"></div>
			<div id="main">
					<header id="header" class="span">
                     <div class="signin-content"><br><br>
                        <img src="../images/banner_tab.png">
                     </div>   
                     <br>
                     <center style="margin-top: -24px" >
						<h6>Please Select From Choice Below and Take The Ticket</h6>
						<nav>
							<ul>
								<li><a id="sales" href="#" class="fa fa-money" style="color:black;"><br><q>Sales</q></a></li>
								<li></li>
								<li><b id="service" href="#" class="fa fa-wrench" style="color:black;"><br><q>Service</q></b></li>
								<li></li>
								<li><g id="pengambilan" href="#" class="fa fa-check-square-o" style="color:black;"><br><q>PickUp</q></g></li>
                                <li></li>
							</ul>
						</nav>
                        <br>
                     </center>

        <span id="counter" class="counter" ></span>
        <?php 
        session_start();
        //echo "$_SESSION[antrian]";?>
					</header>
				
			</div>
		</div>

<script>

function timer() {
    setTimeout(function(){ document.getElementById("counter").style.display = "none"; }, 5000);
  }
$(document).ready(function () { 
   
   $('#sales').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        next();
   });

   function next() {
    // AJAX Call Below
    // rest of your code
    document.getElementById("counter").style.display = "block";
    $.ajax({
         type: "POST",
         url: "print_sales.php",
         success: function (response) {
             $(".counter").load("respon/respon_sales.php");
             timer();
             //alert ("successfully loaded");
         }
     });
    }
    });

  
   $('#service').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        back();
   });
   
   function back() {
// AJAX Call Below
// rest of your code
document.getElementById("counter").style.display = "block";
$.ajax({
     type: "POST",
     url: "print_service.php",
     success: function (response) {
         $(".counter").load("respon/respon_service.php");
         timer()
         //alert ("successfully loaded");
     }    
 })
}

$('#pengambilan').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        binjai();
   });
function binjai() {
    // AJAX Call Below
    // rest of your code
    document.getElementById("counter").style.display = "block";
    $.ajax({
         type: "POST",
         url: "print_pengambilan.php",
         success: function (response) {
             $(".counter").load("respon/respon_pengambilan.php");
             timer()
             //alert ("successfully loaded");
         }
     });
}

</script>
	</body>
</html>
<?php }
}
?>