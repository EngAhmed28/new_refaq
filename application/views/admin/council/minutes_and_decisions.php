<!--------------------------------------------------------------------->

<?php if(isset($records)&&$records!=null):?>
    <div class="col-sm-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <div class="btn-group" id="buttonexport">
                    <a href="#">
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="btn-group">
                    <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                    <ul class="dropdown-menu exp-drop" role="menu">
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});">
                                <img src="img/json.png" width="24" alt="logo"> JSON</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                <img src="img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                        </li>
                        <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                <img src="img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                <img src="img/xml.png" width="24" alt="logo"> XML</a>
                        </li>
                        <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});">
                                <img src="img/sql.png" width="24" alt="logo"> SQL</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});">
                                <img src="img/csv.png" width="24" alt="logo"> CSV</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});">
                                <img src="img/txt.png" width="24" alt="logo"> TXT</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});">
                                <img src="img/xls.png" width="24" alt="logo"> XLS</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                <img src="img/word.png" width="24" alt="logo"> Word</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});">
                                <img src="img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});">
                                <img src="img/png.png" width="24" alt="logo"> PNG</a>
                        </li>
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                                <img src="img/pdf.png" width="24" alt="logo"> PDF</a>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th class="text-center"> م </th>
                            <th class="text-center">تاريخ الجلسة</th>
                            <th class="text-center">بنود الجلسة </th>
                            <th class="text-center">الحضور</th>
                            <th class="text-center">القرارات</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php $a=1;foreach ($records as $record ):?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo date('d-m-Y',$record->session_date) ?></td>
                                <td><a href="<?php echo base_url().'admin/Directors/items_decisions/'.$record->id.'/minutes_and_decisions'?>"><button type="button" class="btn btn-info w-md m-b-5 btn-xs"  ><i class="fa fa-list"></i> عرض </button></a></td>
                                <td><button type="button" class="btn btn-success w-md m-b-5 btn-xs" data-toggle="modal" data-target="#details<?php echo $record->id  ?>" > عرض</button>   </td>
                                <td><a href="<?php echo base_url().'admin/Directors/add_decisions/'.$record->id?>"><button type="button" class="btn btn-add btn-xs "> إضافة</button></a></td>

                                <td> <a href="<?php echo base_url('admin/Directors/add_decisions').'/'.$record->id.'/edit'?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                    <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                            </tr>
                            <!------------------------>
                            <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h1 class="modal-title">حذف جلسة </h1>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل تريد حذف العنصر !
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                            <a href="<?php echo base_url('admin/Directors/delete_decision').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------>
                            <?php $a++;endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php  endif; ?>

<?php $a=1;foreach ($records as $record ):?>

    <div class="modal fade" id="details<?php echo $record->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3><i class="fa fa-plus m-r-5"></i> الحضور</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-horizontal col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <strong>التوقيعات</strong>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                        <thead>
                                        <tr>
                                            <th style="color:#0c72ca; ">م</th>
                                            <th style="color:#0c72ca; ">إسم العضو</th>
                                            <th style="color:#0c72ca; ">المسمي الوظيفي</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($all_members[$record->id])):
                                            $a=1;
                                            foreach ($all_members[$record->id] as $row):
                                                ?>
                                                <tr>

                                                    <td><?php  echo $a ;?></td>
                                                    <td> <?php echo $get_job_title[$row->members_nums]->member_name?></td>
                                                    <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name?></td>
                                                </tr>
                                                <?php  $a++;  endforeach; endif;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>

<!--------------------------------------------------------------------->


<script>
function lood(num){
if(num>0 && num != '')
{
var id = num;
var dataString = 'band_num=' + id ;
$.ajax({
    type:'post',
    url: '<?php echo base_url() ?>/admin/Directors/add_time_table',
    data:dataString,
    dataType: 'html',
    cache:false,
    success: function(html){
        $("#optionearea1").html(html);
    }
});
return false;
}
else
{
$("#vid_num").val('');
$("#optionearea1").html('');
}
}
</script>
