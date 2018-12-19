<?php
include '../../config/database.php';
$binjai = mysql_query("SELECT * FROM produk");
$wew = mysql_num_rows($binjai);
?>

<img id="media-image" class="mySlides w3-animate-fading"  src="" type='image/png' width="100%" height="50%" ">
     <input type="hidden" id="wew" value="<?php echo $wew; ?>"/>

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