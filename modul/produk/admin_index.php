<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo header("location:../../home.php?link=home");
}
else{
switch($_GET[act]){
  default: ?>
    <section>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="fileupload-buttonbar">
                                        <h4 class="title"><i class="fontello-icon-picture"></i>Picture Product Promotion</h4>
                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                        <ul class="btn-toolbar pull-right">
                                        <li><a href="?link=produk&act=Add" class="btn btn-blue "> <i class="fontello-icon-plus-1"></i> 
                                        <span>Tambah</span>
                                        </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="widget widget-simple widget-table">
                                <table id="json" class="table table-striped table-content table-condensed boo-table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="no_mobile" scope="col">No <span class="column-sorter"></span></th>
                                            <th class="no_mobile" scope="col">ID<span class="column-sorter"></span></th>
                                            <th class="no_mobile" scope="col">Nama Picture<span class="column-sorter"></span></th>
                                            <th class="no_mobile" scope="col">URL<span class="column-sorter"></span></th>
                                            <th class="no_mobile" scope="col">Nama Produk<span class="column-sorter"></span></th>
                                            <th class="no_mobile" scope="col">Harga Produk<span class="column-sorter"></span></th>

                                            <th class="alignright">Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                                
                            </div>
                            <!-- // Widget -->
                        </div>
                        <!-- // Column -->
                    </div>
                    <!-- // Example row -->
                </section>
                <hr>
            
<?php   break; ?>
  
<?php  // Form Add 
        case "Add": ?>
        <?php include "admin_add.php";  ?>                             
    <?php break;  ?>
                
<?php  // Form Edit 
        case "Edit": ?>
        <?php include "admin_edit.php";  ?>                             
    <?php break;  ?>
  
<?php  // Form Detail
        case "Detail": ?>
        <?php include "admin_detail.php";  ?>                             
    <?php break;  

}
}
?>
<script>
    $(document)
        .ready(function () {
     // DATATABLE  -------------------------------------------------------------------------------- * -->
        		$('#json')
                        .dataTable({
                        sScrollY: "374px",
                        sAjaxSource: "modul/produk/json.php",
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
                                [0, 'asc']
                        ],
                        aoColumnDefs: [{
                                "aTargets": [0],
                                'sClass': 'hidden-phone'
                        }, {
                        "aTargets": [6],
                        "sName": "RoleId",
                        "sDefaultContent": "",
                        "bSearchable": false,
                        "bSortable": false,
                        "fnRender": function (oObj)                              
                        {
                            return "<a  class='btn btn-yellow' href='?link=produk&act=Detail&id="+oObj.aData[1]+"'>Edit</a>  ";
                        }
                        }],
                        sDom: "<'row-fluid'<'widget-header' <'span6'<'table-header-title'>> <'span6'f>>>rtiS"
                })     
                // inject to datatable DTSC
                
           });
</script>