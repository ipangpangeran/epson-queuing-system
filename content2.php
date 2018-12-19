<?php
include 'config/database.php';
$binjai = mysql_query("SELECT * FROM produk");
$wew = mysql_num_rows($binjai);
?>

<!-- IMAGE PRODUK -->
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

</section>
