<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo header("location:home.php?link=home");
}
else{
    $detail = mysql_query("SELECT * FROM antrian_save");
    $r    = mysql_fetch_array($detail); 
    $control="controller.php";

switch($_GET[act]){
default: ?>

<script type="text/javascript" src="../../resources/js/jquery.min.js"></script>
<script type="text/javascript" src="../../resources/tableExport.jquery.plugin-master/tableExport.js"></script>
<script type="text/javascript" src="../../resources/tableExport.jquery.plugin-master/jquery.base64.js"></script>

<script type="text/javascript" src="../../resources/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="../../resources/jspdf/jspdf.js"></script>
<script type="text/javascript" src="../../resources/jspdf/libs/base64.js"></script>

<!--a href="#" onClick ="$('#table').tableExport({type:'json',escape:'false'});">JSON</a>
<a href="#" onClick ="$('#table').tableExport({type:'excel',escape:'false'});">XLS</a>
<a href="#" onClick ="$('#table').tableExport({type:'csv',escape:'false'});">CSV</a>
<a href="#" onClick ="$('#table').tableExport({type:'pdf',escape:'false'});">PDF</a
<a href="?link=sales-save-xls">XLS</a>-->

<section>
   <div class="row-fluid">
      <div class="span12">
         <div class="widget widget-simple widget-table">
            <div class="widget-header">
               <span class="label label-success"><h5>Customer List</h5></span>
                  <table id="table" class="table table-striped table-content table-condensed boo-table table-hover">
                     <thead>
                        <tr>
                           <th class="no_mobile" scope="col">No <span class="column-sorter"></span></th>
                           <th class="no_mobile" scope="col">ID <span class="column-sorter"></span></th>
                           <th class="no_mobile" scope="col">Jenis Antrian <span class="column-sorter"></span></th>
                           <th class="no_mobile" scope="col">Waktu Pelayanan <span class="column-sorter"></span></th>
                                            
                           <th class="alignright">Actions</th>
                        </tr>
                     </thead>
                  </table>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="navbar">
    <div class="navbar-inner">
        <div class="fileupload-buttonbar">
         <ul class="btn-toolbar pull-right">
            <li><a class="btn btn-red" data-href="" data-toggle="modal" data-target="#confirm-delete"><i class="fontello-icon-trash-1"></i>
            <span>Hapus </span></a></li>
         </ul>
        </div>
    </div>
</div>

<hr>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Hapus Data</h4>
         </div>
            <div class="modal-body">
               <p>Anda Yakin Ingin Menghapus Semua Data Customer ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="<?php echo "$control";?>?link=daftar-customer&act=deleteall" class="btn btn-danger danger">Delete</a>
            </div>
      </div>
   </div>
</div>

<script>
    $('#modal').on('show', function() {
    $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>

            
<?php break;?>
  
<?php // Form Detail 
      case "Detail": 
      include "daftar_antrian_detail.php"; 
      break;  
}
}
?>
<script>
    $(document)
        .ready(function () {
     // DATATABLE
				// -------------------------------------------------------------------------------- * -->
        		$('#table')
                        
                        .dataTable({
                        sScrollY: "374px",
                        sAjaxSource: "modul/save_antrian/json_antrian.php",
                        bDeferRender: true,
                        bStateSave: true,
                        OScroller: {
                                LoadingIndicator: true
                        },

                        oLanguage: {
                                sSearch: 'Global search:',
                                sLengthMenu: 'Show _MENU_ entries',
                                sZeroRecords: 'No record found <br><img title="webroot/img/loader/horizontal_01_white.gif" src="webroot/img/loader/horizontal_01_white.gif">',
                        },
                        aaSorting: [
                                [0, 'desc']
                        ],
                        aoColumnDefs: [{
                                "aTargets": [0],
                                'sClass': 'hidden-phone'
                        
                        }, {
                                "aTargets": [4],
                                
                                "sName": "RoleId",
                                "sDefaultContent": "",
                        "bSearchable": false,
                        "bSortable": false,
                        "fnRender": function (oObj)                              
                        {
                            // oObj.aData[0] returns the RoleId
                            
                            return "<a  class='btn btn-yellow' href='?link=daftar-customer&act=Detail&id="+oObj.aData[1]+"'>View</a>";
                            
                        }
                        
                        }],
                    
                    
                        sDom: "<'row-fluid'<'widget-header' <'span6'<'table-header-title'>> <'span6'f>>>rtiS"
                })
                
                       
                // inject to datatable DTSC
                $('#wrapper .table-header-title')
                        .html($('#DTSC_header_title')
                        .html());
           });
</script>