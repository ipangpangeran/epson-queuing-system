<?php 
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:../../home.php?link=home");
}
$control="modul/daftar_akun/controller.php"; 
?>
<div class='row-fluid sortable'>
	<div class='box span12'>
		<div class='box-content'>
            <form method="POST" action='<?php echo "$control?link=pengguna-akun&act=input"; ?>' enctype='multipart/form-data'>
                <div class="page-header">
                    <b> <label>USERNAME Pengguna</label> <input class='input-xlarge focused' type='text' name="USERNAME" id="USERNAME" required> &nbsp;&nbsp;</b>&nbsp;<span id="pesan"></span>
					<b> <label>PASSWORD Pengguna </label><input class='input-xlarge focused' type='password' name="PASSWORD" id="PASSWORD" required> &nbsp;&nbsp;</b>
				</div> 
				<div class="row-fluid ">                      
					<div class="span4">
                        <div class='control-group error'>
							<label class='control-label '>Nama Lengkap</label>
								<div class='controls'>
								  <input class='input-large focused' name="NAMA_LENGKAP" type='text' required>
								</div>
						</div>
                        <div class='control-group error'>
							<label class='control-label '>NIP</label>
								<div class='controls'>
								  <input class='input-large focused' name="NIP" type='text' required>
								</div>
						</div>
						<div class='control-group error'>
							<label class='control-label'>No. Telpon</label>
								<div class='controls'>
								  <input class='input-large focused' type='text' name="TELPON" required>
								</div>
						</div>
					</div>

					<div class="span4">
                        <div class='control-group error'>
							<label class='control-label' for='LEVEL_ID' >Level User</label>
								<div class='controls'>
								  <select class='input-large datepicker' id='LEVEL_ID'   name="LEVEL_ID" required>
									<option value="">Pilih Level User</option>
									<?php  $tampil=mysql_query("SELECT * FROM level");
                                                                while($w=mysql_fetch_array($tampil)){?>              
                                    <option value="<?php echo"$w[LEVEL_ID]";?>" ><?php echo"$w[NAME]";?></option>
                                    <?php
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
                                    <option value="<?php echo "$s[no_loket]";?>" ><?php echo "$s[nama_loket]";?></option>
                                    <?php
                                    }?>
								  </select>
								  <span id="cek"></span>
								</div>
						</div>
                        <div class='control-group'>
							<label class='radio'>
								<input type=radio name='BLOKIR' id='optionsRadios1' value='0' checked> Aktif   
							</label>&nbsp;
							<label class='radio'>
								<input type=radio name='BLOKIR' value='1' id='optionsRadios2' > Tidak Aktif 
							</label>
						</div>
					</div>
					<div class="span4 ">
                        <center>
                        <div class='control-group'>
							  <label class='control-label' for='fileInput'><img alt="foto" src="images/future_agent.png" /></label>
							  <div class='controls'>
								<input class='input-file uniform_on' id='fileInput' type='file' name='fupload' required>
							  </div>
						</div>
						</center>
					</div>

				</div>
                    
                    <div class='form-actions'>
						<button type='submit' class='btn btn-primary'>Submit</button>
						<button type='reset' class='btn'>Cancel</button>
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