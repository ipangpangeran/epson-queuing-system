<div id="main-sidebar" class="sidebar sidebar-inverse" style="top:5px; left:6px;">
            <div class="well well-black well-small"> 
            <img src="/antrian-epson/epson/Banner.png">       
                <div class="section-title">   
                <center>
                <h4 style="font-weight:bold; color: #1c4594;"></i>EPSON SALES & SERVICE</h4><br>
                </center>
                </div>
                  <div class="row-fluid">    
                    <div class="span7">
                      <center><h6 style="font-weight:bold; color:#1c4594;">Nomor Antrian</h6>    
                              <h1 class="well well-black well-small">
                              <br>
                              <span id="respon_antrian" style="font-family:SimHei; font-size: 133px; font-weight:bold; color:#0783cd;"></span></h1>
                      </center>
                    </div>
                    <div class="span5 pull-right">
                      <center><h6 style="font-weight:bold; color:#1c4594;">Loket</h6>
                              <h1 class="well well-black well-small" >
                              <br>
                              <span id="loket_antrian" style="font-family:SimHei; font-size: 133px; font-weight:bold; color:#0783cd;"></span></h1>
                      </center>
                    </div>                    
                  </div>
                  <div class="row-fluid">    
                    <div class="span7">
                      <center><h6 style="font-weight:bold; color:#1c4594; width: 490px;">Antrian Berikutnya</h6>    
                              <h1 class="well well-black well-small" style="width: 490px;">
                              <span id="respon_pengambilan" style="font-family:SimHei; font-size: 44px; font-weight:bold; color:#0783cd;"></span></h1>
                      </center>
                    </div>                    
                  </div>
            </div>

            <div class="well well-black well-small">
                  <div class="row-fluid">    
                    <div class="span7">
                      <center>   
                        <h6 class="well well-black well-small" style="width: 490px; color:#1c4594;">
                            <span id="respon_produk"></span>
                        </h6>
                      </center>
                    </div>                   
                  </div>
            </div>
</div>

<!-- SCRIPT REAL TIME KE LCD -->

<script>
  $(document).ready(function() {
  $("#respon_produk").load("modul/produk/respon_produk.php");
   var refreshId = setInterval(function() {
  $("#respon_produk").load('modul/produk/respon_produk.php');
   }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>
             
<script>
  $(document).ready(function() {
  $("#respon_antrian").load("respon/nomor_antrian.php");
   var refreshId = setInterval(function() {
  $("#respon_antrian").load('respon/nomor_antrian.php');
   }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>

<script>
  $(document).ready(function() {
  $("#loket_antrian").load("respon/loket_antrian.php");
    var refreshId = setInterval(function() {
  $("#loket_antrian").load('respon/loket_antrian.php');
  }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>

<script>
  $(document).ready(function() {
  $("#respon_pengambilan").load("respon/respon_pengambilan.php");
   var refreshId = setInterval(function() {
  $("#respon_pengambilan").load('respon/respon_pengambilan.php');
   }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>

