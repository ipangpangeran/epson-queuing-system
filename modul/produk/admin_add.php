<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo header("location:../../home.php?link=home");
}

$control="modul/produk/controller.php";
     
?>
<div class="row-fluid">
    <div class="span12 grider">
        <div class="widget widget-simple">
        <div class="widget-header">
        <h4><i class="fontello-icon-upload"></i>Upload Image</h4>
        </div>
            <div class="widget-body">
              <form method="POST" action='<?php echo "$control?link=produk&act=input"; ?>' enctype='multipart/form-data'>
                <div class='control-group error'>
                    <label class='control-label '>Nama Produk</label>
                    <div class='controls'>
                        <input class='input-large focused' name="NAMA_PRODUK" type='text' required> 
                    </div>
                </div>
                <div class='control-group error'>
                    <label class='control-label '>Harga Produk</label>
                    <div class='controls'>
                        <input class='input-large focused' name="HARGA_PRODUK" type='text' required> &nbsp;&nbsp; <i style="font-style:italic; color:#ff0606;">Contoh Input: 15000000</i>
                    </div>
                </div>
                Select Image : <br/> 
                <input type='file' name='produk' /> <br>
                &nbsp;&nbsp; <i style="font-style:italic; color:#ff0606;">Ukuran gambar maksimal 100 MB, dimensi gambar minimal 1000 pixel perbandingan 3:1, format gambar PNG/JPG no backgorund</i>
                <br/><br/>
                <button type="submit" value=Upload class="next finish btn btn-blue">Save</button>
                <a href="?link=produk" class="next finish btn btn-green">Cancel</a>
              </form>
            </div>
</div>
</div>                      <!-- // Widget --> 
</div>