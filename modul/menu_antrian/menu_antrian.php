<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:index.php");
}
if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='cs'){
$loket = $_SESSION[loket];

?>

<div class="sidebar-item"></div> 
  <div class="well well-black">
  <hr>
    <div class="section-title">
      <center><h4 style="font-weight:bold; color:#625669;"><i class=" fontello-icon-control"></i>COUNTER CONTROL</h4></center>
    </div>
      <div class="row-fluid">
        <div class="span4">
          <center><h6 style="font-weight:bold; color:#625669;">Nomor Antrian</h6>    
            <h1 class="well well-black well-small inline" > <br><span class="counter" style="font-family:SimHei; font-size: 75px; font-weight:bold; color:#3C3540;"> </span><img id="loader" src="webroot/img/loader/loader.gif" style="display: none"> <br></h1></center>
        </div>
        <div class="span3">
          <center><h6 style="font-weight:bold; color:#625669;">Loket</h6>
            <h1 class="well well-black well-small inline" ><br><span style="margin-top:10px; font-family:SimHei; font-size: 75px; font-weight:bold; color:#3C3540;"><?php echo "$loket";?></span></h1></center>
        </div>
        <div class="span5">
          <center><h6 style="font-weight:bold; color:#625669;">Menu</h6>
          <br><br>
          <a class="btn btn-well btn-glyph btn-black" href="#" style="width:82px" data-toggle="modal" data-target="#confirm-save" onmouseup= tes()><i class="fontello-icon-edit-2 f30"></i><span class="block">SAVE & NEXT</span></a>
          <a class="btn btn-well btn-glyph btn-black" name="play" onclick="mulai();" type="button" style="width:82px"><i class="fontello-icon-megaphone-1 f30"></i><span class="block">SOUND</span></a>
            <br><br>
          <a class="btn btn-well btn-glyph btn-red" href="#" style="width:82px" data-toggle="modal" data-target="#confirm-restart-print"><i class=" fontello-icon-print f30"></i><span class="block">RESET</span></a>
          </center>
        </div>

<script>
    $(document).ready(function() {
        $("#loader").hide(),
        $(".counter").load("respon/respon_antrian.php");
       $.ajaxSetup({ cache: false });

        $('#next').click(function(e){
            $(".counter").hide();
            $("#loader").show();
            e.preventDefault();
            e.stopPropagation();
            next();
       });
   function next() {
    $.ajax({
         type: "POST",
         url: "content/antrian/counter.php",
         success: function (response) {
             $(".counter").show();
             $("#loader").hide();
             $(".counter").load("respon/respon_antrian.php",1)
         }
     });
}
});

   $('#back').click(function(e){
       $(".counter").hide();
       $("#loader").show();
       e.preventDefault();
        e.stopPropagation();
        back();
   });
   function back() {
        $.ajax({
             type: "POST",
             url: "content/antrian/back.php",
             success: function (response) {
                 $(".counter").show();
                 $("#loader").hide();
                 $(".counter").load("respon/respon_antrian.php",350);
             }
         });
}
    $(document).ready(function(){
        $("#play").click(function(){
            document.getElementById('suarabel').play();
        });

    });
</script>

<script>
  function tes(){
    $('#confirm-save').on('shown.bs.modal', function(){
    $('#barcode').focus();
       });  
}
</script>


<div class="span2">
  <center><h1 style="font-weight:bold; color:gray;">A</h1><h5 style="font-weight:bold; color:gray">Sales</h5>
  <h1 class="well well-black well-small inline" ><br><span id="apakau" style="margin-top:10px; font-family:SimHei; font-size: 75px; font-weight:bold; color:#3C3540;"></span></h1></center>
</div>
<div class="span2">
  <center><h1 style="font-weight:bold; color:gray;">B</h1><h5 style="font-weight:bold; color:gray">Service</h5>
  <h1 class="well well-black well-small inline" ><br><span id="apakau2" style="margin-top:10px; font-family:SimHei; font-size: 75px; font-weight:bold; color:#3C3540;"></span></h1></center>
</div>
<div class="span2">
  <center><h1 style="font-weight:bold; color:gray;">C</h1><h5 style="font-weight:bold; color:gray">Pick Up</h5>
  <h1 class="well well-black well-small inline" ><br><span id="apakau3" style="margin-top:10px; font-family:SimHei; font-size: 75px; font-weight:bold; color:#3C3540;"></span></h1></center>
</div>
</div>
<hr>

<script>
  $(document).ready(function() {
  $("#apakau").load("print/data_sales.txt");
   var refreshId = setInterval(function() {
  $("#apakau").load('print/data_sales.txt');
   }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>

<script>
  $(document).ready(function() {
  $("#apakau2").load("print/data_service.txt");
   var refreshId = setInterval(function() {
  $("#apakau2").load('print/data_service.txt');
   }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>

<script>
  $(document).ready(function() {
  $("#apakau3").load("print/data_pengambilan.txt");
   var refreshId = setInterval(function() {
  $("#apakau3").load('print/data_pengambilan.txt');
   }, 1500);
  $.ajaxSetup({ cache: false });
});
</script>

<div class="modal fade" id="confirm-save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <?php $control="controller.php";?>
    <form  id="formNextAccountSettings" class="form-condensed" method="POST" action="<?php echo "$control?link=save-antrian&act=input";?>">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Save Customer</h4>
        </div>
        <div class="modal-body">
          <fieldset>                                
            <ul class="form-list">
              <li class="control-group span4">
              <i style="font-style:italic; font-weight: bold; color:#ff0606;">Apakah Proses Transaksi Sudah Selesai ?</i>
                <label for="accountAddressState" class="control-label">Scan Barcode<span class="required"></span></label>
                  <div class="controls">
                    <input id="barcode" class="input-large" type="text" name="nomor_antrian" value="" required>
                  </div>
              </li>                       
            </ul>         
          </fieldset>                           
        </div>
        <div class="modal-footer">
          <button type="submit" class="next finish btn btn-blue">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
    $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
});
</script>


<div class="modal fade" id="confirm-next" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Antrian Berikutnya</h4>
         </div>
         <div class="modal-body">
            <center><p>Apakah Anda sudah menyimpan data Customer ?</p></center>
         </div>
         <div class="modal-footer">
            <a href="?link=menu-antrian" class="next finish btn btn-danger danger">Yes</a>
         </div>
      </div>
   </div>
</div>

<script>
    $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
});
</script>    

                  
<div class="modal fade" id="confirm-restart-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Restart Semua No antrian</h4>
      </div>
      <div class="modal-body">
        <center><p>Anda Yakin Ingin Mengulang Print Semua Antrian ?<br><br> <b>Semua antrian akan dimulai dari nomor "1"</b></p></center>
      </div>
      <div class="modal-footer">
        <a href="print/restart_sales.php" class="btn btn-danger danger">Yes</a>
      </div>
    </div>
  </div>
</div>

<script>
    $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
});
</script>                                    

<script>
    $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
});
</script>                                                                

<?php }
else { ?>     
<center>
  <div class="widget widget-simple widget-collapsible bg-yellow-light">
    <div class="widget-header header-small clickable" data-toggle="collapse" data-target="#demoYellow">
      <h4><i class=" fontello-icon-attention-4"></i> <small>Ups!</small></h4>
        <div class="widget-tool"><span class="btn btn-glyph btn-link widget-toggle-btn fontello-icon-publish"></span></div>
    </div>
    <div id="demoYellow" class="widget-content collapse in">
      <div class="widget-body">
        <div class="widget-row">
          <p>Maaf, anda tidak memiliki hak akses menggunakan menu ini. terimakasih</p>
        </div>
      </div>
    </div>
  </div>
</center>
<?php }?>