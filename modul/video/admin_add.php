<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo header("location:../../home.php?link=home");
}

$control="modul/video/controller.php";
     
?>
<div class="row-fluid">
    <div class="span12 grider">
        <div class="widget widget-simple">
        <div class="widget-header">
        <h4><i class="fontello-icon-upload"></i>Upload Video</h4>
        </div>
            <div class="widget-body">
               <form method="POST" action='<?php echo "$control?link=video&act=input"; ?>' enctype='multipart/form-data'>
                Select Video : <br/>
                <input type='file' name='video' />
                <br/>
                &nbsp;&nbsp; <i style="font-style:italic; color:#ff0606;">Format Video .MP4 maksimal 500 MB</i>
                <br/><br/>
                <button type="submit" value=Upload class="next finish btn btn-blue">Save</button>
                <a href="?link=video" class="next finish btn btn-green">Cancel</a>
            </div>
                </form>
        </div>
    </div>                      <!-- // Widget --> 
</div>