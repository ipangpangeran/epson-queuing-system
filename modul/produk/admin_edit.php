<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
   echo header("location:../../home.php?link=home");
}
else{
      $detail = mysql_query("SELECT * FROM 
                            produk
                            WHERE 
                            id='$_GET[id]'");
    $r    = mysql_fetch_array($detail); 
    $control="modul/produk/controller.php";
?>
<div class="row-fluid">
    <div class="span12 grider">
        <div class="widget widget-simple">
            <div class="widget-header">
            <h4><i class="fontello-icon-wrench-2"></i>Edit Harga Image Produk</h4>
            </div>
            <div class="widget-content">
                <div class="widget-body">
                    <form id="formNextAccountSettings" class="form-condensed" action="<?php echo "$control?link=produk&act=update";?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo "$r[id]"; ?>">
                    <div class='control-group error'>
                        <label class='control-label'>Nama Produk</label>
                        <div class='controls'>
                        <input class='input-large focused' name="NAMA_PRODUK" type='text' value="<?php echo "$r[name_produk]";?>" required>
                        </div>
                    </div>
                    <div class='control-group error'>
                        <label class='control-label'>Harga Produk</label>
                        <div class='controls'>
                        <input class='input-large focused' name="HARGA_PRODUK" type='text' value="<?php echo "$r[price]";?>" required> &nbsp;&nbsp; <i style="font-style:italic; color:#ff0606;">Contoh Input: 15000000</i>
                    </div>
                    </div>
                    <tr>
                        <td class="center"><?php echo "Image"; ?></td>
                        <td class="center"><img src='modul/produk/images/<?php echo "$r[url]";?>' type='image/png' style="width:50%"></td>
                    </tr>
                    <div class='form-actions'>
                        <button type='submit' class="next finish btn btn-blue">Update</button>
                        <a href="?link=produk" class="next finish btn btn-green">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>