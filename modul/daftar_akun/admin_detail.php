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
     <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<div class="box-icon">
                            <a href='?link=pengguna-akun' class='btn btn-round' title="Daftar" data-rel="tooltip"><i class='icon-th'></i></a>
                            <a href="?link=pengguna-akun&act=Edit&id=<?php echo "$r[USER_ID]"?>" class="btn btn-round" title="Ubah" data-rel="tooltip"><i class='icon-pencil'></i></a>
							<a href="?link=pengguna-akun&act=Add" class="btn btn-round" title="Tambah" data-rel="tooltip"><i class="icon-plus"></i></a>
							<a href="<?php echo "$control";?>?link=pengguna-akun&act=delete&id=<?php echo "$r[USER_ID]"?>" onClick="return confirm('Apakah Anda benar-benar mau menghapus <?php echo "$r[NAMA_LENGKAP]";?>?')" class="btn btn-round" title="Hapus" data-rel="tooltip"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered">
						  <thead>
							  <tr>
                                <th>Property</th>
                                <th>Value</th>                              
							  </tr>
						  </thead>   
                                                 
						  <tbody>
                            <tr>
                                <td class="center"><?php echo "Foto"; ?></td>
                                    <td class="center"><?php if ($r[FOTO]==''){ echo '<center>belum ada foto</center>';
                                    }  else { ?>
                                    <img alt="foto" src="webroot/foto_akun/<?php echo "$r[FOTO]";?>" height="120" width="120"/>
                                    <?php }?>
                                </td>
                            </tr>
                                                            <td class="center"><?php echo "Username"; ?></td>
                                                            <td class="center"><?php echo "$r[USERNAME]" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "Password"; ?></td>
                                                            <td class="center"><?php echo "*********" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "Nama Pengguna"; ?></td>
                                                            <td class="center"><?php echo "$r[NAMA_LENGKAP]" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "NIP"; ?></td>
                                                            <td class="center"><?php echo "$r[NIP]" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "Aktif"; ?></td>
                                                            <td class="center">
                                                                <?php 
                                                                        if($r[BLOKIR]=='0'){
                                                                            echo '<span class="label label-success">Aktif</span>';
                                                                        }else {
                                                                            echo '<span class="label label-important">Tidak Aktif</span>';
                                                                }
                                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "Level User"; ?></td>
                                                            <td class="center">
                                                                <?php 
                                                                        if($r[LEVEL_ID]=='1'){
                                                                            echo '<span class="label label-success">Administrator</span>';
                                                                        }else {
                                                                            echo '<span class="label label-important">CS</span>';
                                                                }
                                                                    ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "Loket"; ?></td>
                                                            <td class="center">
                                                                <?php 
                                                                        echo "Loket ".$r[LOKET];
                                                                
                                                                    ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "No. Telpon"; ?></td>
                                                            <td class="center"><?php echo "$r[TELPON]" ?></td>
                                                        </tr>
                                                         <tr>
                                                            <td class="center"><?php echo "Di Buat Oleh"; ?></td>
                                                            <td class="center"><?php
                                                                $created=mysql_query("SELECT NAMA_LENGKAP FROM users WHERE USER_ID='$r[CREATED_BY]'");
                                                                $w=mysql_fetch_array($created);       
                                                                echo "$w[NAMA_LENGKAP]";
                                                            ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center"><?php echo "Waktu Save"; ?></td>
                                                            <td class="center"><?php echo "$r[CREATED]" ?></td>
                                                        </tr>
						  </tbody>
                                                  
					  </table>      
                                            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
                                      