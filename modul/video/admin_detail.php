<?php 
    $detail = mysql_query("SELECT * FROM 
                            videos
                            WHERE 
                            id='$_GET[id]'");
    $r    = mysql_fetch_array($detail); 
    $control="modul/video/controller.php";
    ?>
<div class="navbar">
<div class="navbar-inner">
<div class="fileupload-buttonbar">
    <h4 class="title"><i class="fontello-icon-video"></i>Detail</h4>
                                                <!-- The fileinput-button span is used to style the file input field as button -->
        <ul class="btn-toolbar pull-right">
            <li><a class="btn btn-green " href="?link=video"><i class="fontello-icon-list-numbered-1"></i>
            <span>Daftar </span>
            </a></li>
            
            <li><a class="btn btn-red " href="<?php echo "$control";?>?link=video&act=delete&id=<?php echo "$r[id]"?>" onClick="return confirm('Apakah Anda benar-benar mau menghapus <?php echo "$r[name]";?>?')"><i class="fontello-icon-trash-1"></i>
            <span>Hapus </span>
            </a></li>
            </ul>
</div>
<!-- // Fileupload-buttonbar --> 
</div>
</div>
<section>
    <div class="row-fluid">
        <div class="span12">
        <div class="well well-box well-nice">
                                <!-- // content item -->
        <table class="table table-striped table-content">
        <thead>
        <tr>
            <th>Property</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="center"><?php echo "Nama File"; ?></td>
            <td class="center"><?php echo "$r[name]" ?></td>
        </tr>
        <tr>
            <td class="center"><?php echo "Url"; ?></td>
            <td class="center"><?php echo "$r[url]" ?></td>
        </tr>
        <tr>
        <td class="center"><?php echo "Di Buat Oleh"; ?></td>
            <td class="center"><?php
            $created=mysql_query("SELECT NAMA_LENGKAP FROM users WHERE USER_ID='$r[created_by]'");
            $w=mysql_fetch_array($created);       
            echo "$w[NAMA_LENGKAP]";
            ?></td>
        </tr>
        <tr>
            <td class="center"><?php echo "Waktu Save"; ?></td>
            <td class="center"><?php echo "$r[created]" ?></td>
        </tr>
                                                        
</tbody>
</table>
                                <!-- // table-content --> 
</div>
                           
</div>
                        <!-- // Column -->
                        
</div>
</section>