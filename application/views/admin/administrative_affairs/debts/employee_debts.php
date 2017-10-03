
    <?php
    if(isset($result) && $result!=null && !empty($result)){
        $out['debt_id']=$result[0]->debt_id;
        $out['debt_date']=date('m-d-Y',$result[0]->debt_date);
        $out['emp_id']=$result[0]->emp_id;
        $out['value']=$result[0]->value;
        $out['notes']=$result[0]->notes;
        $out['administration']=$result[0]->emp_data->administration;
        $out['department']=$result[0]->emp_data->department;
        $out['input']='<input type="submit" role="button" name="UPDATE" value="تعديل" class="btn btn-add btn-rounded w-md m-b-5">';
        $out['form']='Administrative_affairs/UpdateEmployeesDebts/'.$result[0]->debt_id;
        $out["desable"]='';
        $out['hidden']='';
    }else{
        $out['debt_date']="";
        $out['value']="";
        $out['notes']="";
        $out['emp_id']="";
        $out['administration']="";
        $out['department']="";
        $out["desable"]='';
        $out['hidden']='';
        if(isset($emp_data) && $emp_data!=null && !empty($emp_data) ){
            $out['emp_id']=$emp_data['id'];
            $out['administration']=$emp_data['administration'];
            $out['department']=$emp_data['department'];
            $out["desable"]='disabled="disabled"';
            $out['hidden']='<input type="hidden" name="emp_id" value="'.$emp_data['id'].'" />';
        }
        $out['input']='<input type="submit" role="button" name="ADD" value="حفظ" class="btn btn-add btn-rounded w-md m-b-5">';
        $out['form']='Administrative_affairs/EmployeesDebts';
    }
    ?>
    <?php  echo form_open_multipart($out['form']);?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل موظف</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> تاريخ اليوم</label>
                    <input type="text"  name="debt_date" class=" some_class_2 form-control half input-style"  value="<?php echo $out['debt_date']?>" placeholder="يوم / شهر / سنة"  id="some_class_1">
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الإدارة</label>
                    <select class="choose-date selectpicker form-control half" name="administration" id="administration"  disabled  onchange="return lood($('#administration').val());" data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php if(!empty($admin)):
                            foreach ($admin as $record):
                                $selected='';if($record->id == $out['administration']){$selected='selected="selected"';}
                                ?>
                                <option value="<? echo $record->id;?>" <? echo $selected;?>   ><? echo $record->name;?></option>
                            <?php  endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">القسم</label>
                        <select name="department" id="optionearea1" <? echo $out['desable'];?>   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true" onchange="return lood_emp($('#optionearea1').val());" required="required">
                            <option value="">إختر الإدارة أولا</option>
                            <?php   if(isset($emp_data) && $emp_data!=null && !empty($emp_data) || isset($result) ){
                                foreach ($departs as $one_row){
                                    $selected=''; if($one_row->id == $out['department']){$selected='selected="selected"';}  ?>
                                    <option value="<?php echo $one_row->id;?>" <?php echo $selected;?>   ><?php echo $one_row->name;?></option>
                                <?php  }
                            }?>
                        </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> إسم الموظف</label>
                    <select name="emp_id" id="optionearea2" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true" <? echo $out['desable'];?>  required="required" >
                        <option value="">إختر الادارة و القسم أولا</option>
                        <?php
                        if(isset($emp_data) && $emp_data!=null && !empty($emp_data) || isset($result) ){
                            foreach ($employees as $row):
                                $select="";  if($row->id == $out['emp_id']){$select='selected="selected"';}?>
                                <option value="<?php echo $row->id?>" <?php echo $select?>> <?php echo $row->employee?></option>
                            <?php  endforeach ;}?>
                    </select>                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> قيمة السلفة</label>
                    <input type="number" name="value"  class="form-control half input-style" value="<?php echo $out["value"] ?>" placeholder=" قيمة السلفة"  >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">ملاحظات</label>
                    <textarea class="form-control half input-style"  name="notes"><? echo $out['notes'];?></textarea>
                </div>

            </div>
        </div>
    </div>
    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <?php echo  $out['hidden']?>
        <?php echo  $out['input']?>

    </div>
    <div class="form-group col-sm-5"></div>
    <?php echo form_close()?>
    <!----------------------input------------------->
    <?php if(isset($table)&& $table!=null && !empty($table)):?>
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
                                <th class="text-center">م</th>
                                <th class="text-center">اسم الموظف</th>
                                <th class="text-center">تاريخ السلفة </th>
                                <th class="text-center">قيمة السلفة</th>
                                <th class="text-center">الإجراء</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">التفاصيل</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1;foreach ($table as $record ):
                                if($record->approved == 0){
                                    $state="لم يتم الاجراء";
                                    $button='
                                   <a href="'.base_url().'Administrative_affairs/UpdateEmployeesDebts/'.$record->debt_id.'"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                   <a href="#"><button type="button" class="btn btn-danger btn-xs"  ><i class="fa fa-trash-o"></i></button></a>';
                                }
                                elseif($record->approved == 1){
                                    $state="مقبولة";
                                    $button='غير متاح';
                                }
                                elseif($record->approved ==2){
                                    $state="مرفوضة";
                                    $button='غير متاح';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $a ?></td>
                                    <td class="text-center"><?php echo $record->emp_name ?></td>
                                    <td class="text-center"><?php echo date("Y-m-d",$record->debt_date)  ?></td>
                                    <td class="text-center"><?php echo $record->value?></td>
                                    <td class="text-center"><?php echo $button?> </td>
                                    <td class="text-center"><?php echo $state?> </td>
                                    <td class="text-center"><button class="btn btn-info md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $record->debt_id ?>">التفاصيل</button></td>
                                </tr>
                              <!------------------------------------------>
                                <div class="md-modal md-effect-1" id="modal-<?php echo $record->debt_id ?>">
                                    <div class="md-content">
                                        <h3>تفاصيل الطلب</h3>
                                        <div class="n-modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>اسم الموظف: </b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4><?php echo $record->emp_name ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>تاريخ السلفة: </b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4><?php echo date("Y-m-d",$record->debt_date)  ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4><b>قيمة السلفة: </b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4><?php echo $record->value?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-add md-close">إغلاق</button>
                                    </div>
                                </div>
                                <!------------------------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo $record->debt_id ;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف طلب سلفة</h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url('Administrative_affairs/DeleteStaffEvaluation').'/'.$record->employee_id.'/'.$record->sub_date[0].'/'.$record->sub_date[1] ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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

<!--------------------------------------------------------------------->
<script>
    function lood_dep(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/LoadPages',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>
<script>
    function lood_emp(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'dep_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/LoadPages',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>