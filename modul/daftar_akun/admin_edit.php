<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:../../home.php?link=home");
}
   $detail = mysql_query("SELECT * FROM 
                            users
                            WHERE 
                            USER_ID='$_GET[id]'");
    $r    = mysql_fetch_array($detail);
    $control="modul/daftar_akun/controller.php";
 //   $date = date("Y-m-d H:i:s time()+60*60*7");
    ?>
<div class='row-fluid sortable'>
				<div class='box span12'>
					<div class='box-header well' data-original-title>
						<div class='box-icon'>
							<a href='?link=pengguna-akun' class='btn btn-round' title="Daftar" data-rel="tooltip"><i class='icon-th'></i></a>
              <a href="?link=pengguna-akun&act=Edit&id=<?php echo "$r[USER_ID]"?>" class="btn btn-round" title="Ubah" data-rel="tooltip"><i class='icon-pencil'></i></a>
							<a href="?link=pengguna-akun&act=Add" class="btn btn-round" title="Tambah" data-rel="tooltip"><i class="icon-plus"></i></a>							
							<a href="<?php echo "$control";?>?link=pengguna-akun&act=delete&id=<?php echo "$r[USER_ID]"?>" onClick="return confirm('Apakah Anda benar-benar mau menghapus <?php echo "$r[NAMA_LENGKAP]";?>?')" class="btn btn-round" title="Hapus" data-rel="tooltip"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class='box-content'>
						<form method="POST" action='<?php echo "$control?link=pengguna-akun&act=update"; ?>' enctype='multipart/form-data'>
              <input type="hidden" name="id" value="<?php echo "$r[USER_ID]"; ?>">
                <div class="page-header">
                  <b> <label>USERNAME Pengguna</label> <input class='input-xlarge focused' type='text' name="USERNAME" id="USERNAME" value="<?php echo "$r[USERNAME]";?>" required> &nbsp;&nbsp;</b>&nbsp;<span id="pesan"></span>
						      <b> <label>Password Lama </label><input class='input-xlarge focused' type='password' name="PASSWORD_LAMA"  id="PASSWORD_LAMA" > &nbsp;&nbsp;</b><span id="pesan_pas"></span>
                  <b> <label>Password Baru </label><input class='input-xlarge focused' type='password' name="PASSWORD_BARU" id="PASSWORD"  value="" > &nbsp;&nbsp;</b>
						    </div> 
						 
              <div class="row-fluid ">            
							  <div class="span4">
                  <div class='control-group error'>
								    <label class='control-label '>Nama Lengkap</label>
								      <div class='controls'>
								        <input class='input-large focused' name="NAMA_LENGKAP" type='text' value="<?php echo "$r[NAMA_LENGKAP]";?>"required>
								      </div>
							   </div>
                  <div class='control-group error'>
								    <label class='control-label '>NIP</label>
								      <div class='controls'>
								        <input class='input-large focused' name="NIP" type='text' value="<?php echo "$r[NIP]";?>" required>
								      </div>
							    </div>
							    <div class='control-group error'>
                    <label class='control-label'>No. Telpon</label>
                      <div class='controls'>
                        <input class='input-large focused' type='text' name="TELPON" value="<?php echo "$r[TELPON]";?>" required >
                      </div>
                  </div>
							  </div>

                <div class="span4">
                  <div class='control-group error'>
								    <label class='control-label' for='LEVEL_ID' >Level User</label>
								      <div class='controls'>
								        <select class='input-large datepicker' id='LEVEL_ID'   name="LEVEL_ID" required>
									         <option value="">Pilih Level User</option>
									           <?php $query=mysql_query("SELECT * FROM level");
                              if ($r[LEVEL_ID]==0){
                               echo "<option value=0 selected>- Pilih Level User -</option>";
                             }   
                              while($w=mysql_fetch_array($query)){
                              if ($r[LEVEL_ID]==$w[LEVEL_ID]){
                                    echo "<option value=$w[LEVEL_ID] selected>$w[NAME]</option>";
                                        }
                              else{
                                    echo "<option value=$w[LEVEL_ID]>$w[NAME]</option>";
                                        }
                              }?>
									
								        </select>
							        </div>
							    </div>
                  <div class='control-group error'>
                    <label class='control-label' for='LOKET'>Loket</label>
                      <div class='controls'>
                        <select class='input-large datepicker' id='LOKET' name="LOKET" required>
                          <option value="">Pilih Loket User</option>
                            <?php  $wew=mysql_query("SELECT * FROM loket");
                              while($s=mysql_fetch_array($wew)){?>              
                          <option value="<?php echo"$s[no_loket]";?>" ><?php echo"$s[nama_loket]";?></option>
                            <?php }?>
                        </select>
                      </div>
                  </div>

                    <?php if ($r[BLOKIR]=='0'){ ?>
                <div class='control-group'>
                  <label class='control-label' >Status</label>
                    <div class='controls'>
                    <label class='radio'>
                    <input type=radio name='BLOKIR' id='optionsRadios1' value='0' checked> Aktif   
                    </label>
                    <br>
                  <label class='radio'>
                    <input type=radio name='BLOKIR' value='1' id='optionsRadios2' > Tidak Aktif 
                  </label>
                </div>
                </div>
                      <?php }
                              else{ ?>
                    <div class='control-group'>
                      <label class='control-label' >Status</label>
                      <div class='controls'>
                        <label class='radio'>
                          <input type=radio name='BLOKIR' id='optionsRadios1' value='0' > Aktif   
                        </label>
                        <br>
                        <label class='radio'>
                          <input type=radio name='BLOKIR' value='1' id='optionsRadios2' checked> Tidak Aktif 
                        </label>
                      </div>
                      </div>
                      <?php } ?>
							  </div>
							     <div class="span4 ">
                    <center><div class='control-group'>
							         <label class='control-label' for='fileInput'> 
                            <?php if ($r[FOTO]==''){
                                echo '<center><img alt="foto" src="images/future_agent.png" /><br>belum ada foto</center>';
                                     }  else { ?>
                                      <img alt="foto" src="webroot/foto_akun/<?php echo "$r[FOTO]";?>" height="120" width="120"/>
                            <?php }?>
                       </label>
							  <div class='controls'>
								<input class='input-file uniform_on' id='fileInput' type='file' name='fupload' >
							  </div>
							</div></center>
							  </div>
							  
							  </div>
                <div class='form-actions'>
							     <button type='submit' class="next finish btn btn-blue">Submit</button>
							     <a href="?link=pengguna-akun" class="next finish btn btn-green">Cancel</a>
							  </div>
    </form>  
                                                     
						  </div><!--/row -->     
                                                    
					</div>
				</div><!--/span-->
                                <script> 
$(document).ready(function(){
   $("#USERNAME").change(function(){ 
		// tampilkan animasi loading saat pengecekan ke database
    $('#pesan').html("<img src='images/loader.gif' /> checking ...");	
    var USERNAME  = $("#USERNAME").val(); 
    
    $.ajax({
     type:"POST",
     url:"modul/daftar_akun/checking.php",    
     data: "USERNAME=" + USERNAME,
     success: function(data){                 
       if(data==0){
          $("#pesan").html(' <div class="alert alert-success"> USERNAME belum terdaftar </div>');
 	        $('#USERNAME').css('border', '3px #090 solid');	
       }  
       else{
          $("#pesan").html(' <div class="alert alert-error"> USERNAME sudah terdaftar </div>');
 	        $('#USERNAME').css('border', '3px #C33 solid');	
       }
     }
    }); 
	})
});
</script>
<?PHP $detail = mysql_query("SELECT * FROM 
                            users
                            WHERE 
                            USER_ID='$_GET[id]'");
    $r    = mysql_fetch_array($detail);
    $control="modul/daftar_akun/controller.php";
    
 //   $date = date("Y-m-d H:i:s time()+60*60*7");?>

<script>
$(document).ready(function(){
   $("#PASSWORD_LAMA").change(function(){ 
		// tampilkan animasi loading saat pengecekan ke database
    $('#pesan_pas').html("<img src='images/loader.gif' /> checking ...");	
    var PASSWORD_LAMA  = $("#PASSWORD_LAMA").val(); 
    
    $.ajax({
     type:"POST",
     url:"modul/daftar_akun/checking_pass.php",    
     data: "PASSWORD_LAMA=" + PASSWORD_LAMA,
     success: function(data){                 
         if(data=='<?php echo "$r[PASSWORD]";?>'){
          $("#pesan_pas").html(' <div class="alert alert-success"> PASSWORD SUDAH SAMA </div>');
 	        $('#PASSWORD_LAMA').css('border', '3px #090 solid');	
       }  
       else{
          $("#pesan_pas").html(' <div class="alert alert-error"> PASSWORD BELUM SAMA </div>');
 	        $('#PASSWORD_LAMA').css('border', '3px #C33 solid');	
       }
     }
    }); 
	})
});
</script>
<script> 
$(document).ready(function(){
   $("#LOKET").change(function(){ 
    // tampilkan animasi loading saat pengecekan ke database
    $('#cek').html("<img src='images/loader.gif' /> checking ..."); 
    var LOKET  = $("#LOKET").val(); 
    
    $.ajax({
     type:"POST",
     url:"modul/daftar_akun/cek_loket.php",    
     data: "LOKET=" + LOKET,
     success: function(data){                 
       if(data==0){
          $("#cek").html(' <div class="alert alert-success"> LOKET belum terdaftar </div>');
          $('#LOKET').css('border', '3px #090 solid');  
       }  
       else{
          $("#cek").html(' <div class="alert alert-error"> LOKET sudah terdaftar </div>');
          $('#LOKET').css('border', '3px #C33 solid');  
       }
     }
    }); 
  })
});
</script>

<script type="text/javascript">
      $(document).ready(function(){      
	     if ($('.page-header').size()) {
		      $.getScript(
			       'js/jquery.passroids.min.js',
			         function() {
				          $('form').passroids({
					           main : "#PASSWORD"
				          });
			         }
		      );
	     }
      });
    </script>