


<!------------------------------------------------>
<?php if(isset($select_all)):
    if(!empty($select_members)):
        $arr =array();
        foreach( $select_members as $member):
            $arr[]= $member->members_nums;
        endforeach;
    endif;
    echo form_open_multipart('admin/Directors/edit_time_table/'.$select_all[0]->council_id_fk)?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل جدول أعمال</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half"> تاريخ الجلسة</label>
                    <input type="text"  name="session_date" class=" some_class_2 form-control half input-style"  value="<?php echo date('m/d/Y',$select_all[0]->session_date) ?>" placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half"> اختر كود المجلس</label>
                    <select class="choose-date selectpicker form-control half" name="council_id_fk"  data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php if(!empty($magls)):
                            foreach ($magls as $record):
                                $select='';
                                if($select_all[0]->council_id_fk == $record->id){
                                    $select='selected';
                                }

                                ?>
                                <option value="<? echo $record->id; ?>" <?php echo $select;?>><? echo $record->id;?></option>
                            <?php endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">الأعضاء</label>
                    <?php if (!empty($members)):
                        $d=1;
                        for ($a=0;$a<sizeof($members);$a++):
                            $checked='';
                            if(!empty($arr)):
                                if(in_array($members[$a]->id, $arr)){
                                    $checked ='checked';
                                }
                            endif;
                            ?>
                    <div class="col-sm-6"></div>
                                <input tabindex="10" type="checkbox" name="member<? echo$d; ?>" value="<? echo $members[$a]->id;  ?>" id="square-checkbox<?php echo $d;?>" <? echo $checked; ?>>
                                <label for="square-checkbox<?php echo $d;?>"><? echo $members[$a]->member_name;  ?></label><br>

                            <?php $d++;endfor; endif;?>
                    <input type="hidden" name="max" value="<? echo sizeof($members); ?>"/>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">إضافة بنود</label>
                    <input type="number" id="band_num"  name="band_num" min="1" max="10"
                           onkeyup="return lood_edit($('#band_num').val());" class="form-control half input-style"  />
                </div>
            </div>
            <div class="panel-body" id="optionearea2">

            </div>
        </div>
    </div>

    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="edit" value="تعديل" class="btn btn-add  w-md m-b-5">
    </div>
    <div class="form-group col-sm-5"></div>
    <?php echo form_close()?>
    <!----------------------input------------------->
    <!--edit-->
<?php else: ?>
    <!--add-->

    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> إضافة  جدول أعمال</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('admin/Directors/add_time_table')?>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half"> تاريخ الجلسة</label>
                    <input type="text"  name="session_date" class=" some_class_2 form-control half input-style"   required placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half"> اختر كود المجلس</label>
                    <select class="choose-date selectpicker form-control half" name="council_id_fk"  data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php if(!empty($magls)):
                            foreach ($magls as $record):?>
                                <option value="<?php echo $record->id; ?>"><?php echo $record->id;?></option>
                            <?php endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-6">

                    <label class="label label-green  half">الأعضاء</label>
                    <?php if (!empty($members)):
                        $d=1;
                        for ($a=0;$a<sizeof($members);$a++):
                            ?>
                                 <div class="col-sm-6"></div>
                                <input tabindex="10" type="checkbox" name="member<? echo$d; ?>" value="<? echo $members[$a]->id;  ?>" id="square-checkbox<?php echo $d;?>" >
                                <label for="square-checkbox<?php echo $d;?>"> <? echo $members[$a]->member_name;  ?></label><br>

                            <?php $d++;endfor; endif;?>
                    <input type="hidden" name="max" value="<? echo sizeof($members); ?>"/>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">البنود</label>
                    <input type="number" id="band_num"  name="band_num" min="1" max="10" onkeyup="return lood($('#band_num').val());" class="form-control half input-style"  required>
                </div>
            </div>
            <div class="panel-body" id="optionearea1">

            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------->

    <!--------------------------------------------------------------------->




    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="add" value="حفظ" class="btn btn-add  w-md m-b-5">
    </div>
    <?php echo form_close()?>
    <div class="form-group col-sm-5"></div>

    <!----------------------input------------------->

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
                                <th class="text-center">الاجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo date('d-m-Y',$record->session_date) ?></td>
                                    <td><a href="<?php echo base_url().'admin/Directors/items_decisions/'.$record->id?>"><button type="button" class="btn btn-info w-md m-b-5 btn-xs"  ><i class="fa fa-list"></i> عرض </button></a></td>
                                    <!----------------------------------------------------------------->
                                    <td>
                                        <button type="button" class="btn btn-success w-md m-b-5 btn-xs" data-toggle="modal" data-target="#details<?php echo $record->id  ?>" > عرض</button>   </td>

                                    <!----------------------------------------------------------------->
                                    <td> <a href="<?php echo base_url('admin/Directors/edit_time_table').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                </tr>

                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف جدول أعمال </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('admin/Directors/delete_time_table').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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

    <?php  endif; endif; ?>
            <script>
                function lood(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'band_num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>admin/Directors/add_time_table',
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
                
                function lood_edit(num){
                    if(num>0 && num != '')
                    {
                        var id = num;
                        var dataString = 'band_num=' + id ;
                        $.ajax({
                            type:'post',
                            url: '<?php echo base_url() ?>admin/Directors/band_num',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $("#optionearea2").html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $("#vid_num").val('');
                        $("#optionearea2").html('');
                    }
                }
            </script>


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
