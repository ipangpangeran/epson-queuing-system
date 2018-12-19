<?php

include "config/database.php";

$detail = mysql_query("SELECT * FROM users WHERE USER_ID='$_SESSION[user_id]'");
    $r  = mysql_fetch_array($detail);
?>
            
<div class="widget widget-simple">
   <div class="widget-header">
      <p><a href="#" data-toggle="modal" data-target="#confirm-detail"><img alt="foto" src="webroot/foto_akun/<?php echo "$r[FOTO]";?>" height="40" width="40"/></a>&nbsp;&nbsp;<span class="label label-success"><?php echo "$r[NAMA_LENGKAP]";?></span></p>
   </div>
   <div class="signin-content">
      <img src="images/Epson-logo-vector.png">
         <div class="widget-content">
            <div class="widget-body">                 
               <nav>
                  <ul class="nav nav-center " style="margin-top: 20px">
                     <li><a class="btn btn-well btn-glyph" href="?link=daftar-customer" style="width:82px" data-toggle="modal"><i class="fontello-icon-edit-2 f30"></i><span class="block">CUSTOMER LIST</span></a></li>
                  </ul>
               </nav>
            </div>
         </div>
   </div>
<!-- 
  <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Counter Control</h4>
           </div>
           <div class="modal-body">
              <center><p>Apakah Anda yakin ingin masuk ke Counter Control ?</p></center>
           </div>
           <div class="modal-footer">
              <a href="?link=menu-antrian-sales" class="btn btn-danger danger">Yes</a>
              <a href="?link=home" class="btn btn-danger danger">No</a>
           </div>
        </div>
     </div>
  </div> -->
</div>

<script>
    $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
});
</script> 