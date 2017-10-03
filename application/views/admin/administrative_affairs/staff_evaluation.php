




<!------------------------------------------------>

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> تقييم الموظفين</h3>
        </div>
        <?php
        if(isset($result) && $result!=null && !empty($result)){
            $out['emp_id']=$result[0]->emp_id;
            $out['evaluation_date']=date('m-d-Y',$result[0]->evaluation_date);
            $out['input']='<input type="submit" role="button" name="UPDATE" value="تعديل" class="btn btn-add">';
            $out['form']='Administrative_affairs/UpdateStaffEvaluation/'.$result[0]->emp_id."/".$result[0]->evaluation_date."/".$result[0]->date_s;
            $out['readonly']='readonly="readonly"';
            $eval_setting=$result;
        }else{
            $out['emp_id']='';
            $out['readonly']='';
            $out['evaluation_date']='';
            $out['input']='<input type="submit" role="button" name="ADD" value="حفظ" class="btn btn-add">';
            $out['form']='Administrative_affairs/StaffEvaluation';
        }
        ?>
        <?php  echo form_open_multipart($out['form']);?>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">إسم الموظف</label>
                <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id"   required data-show-subtext="true" data-live-search="true">
                    <option value=""> إختر الموظف</option>
                    <?php foreach ($employees as $row):
                        $select="";  if($row->id == $out['emp_id']){$select='selected="selected"';}?>
                        <option value="<?php echo $row->id?>" <?php echo $select?>> <?php echo $row->employee?></option>
                    <?php  endforeach?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">تاريخ التقييم</label>
                <input type="text" name="evaluation_date"  <?php echo $out['readonly']?> class=" some_class_2 form-control half input-style" placeholder="/ ---/--- /--" required value="<?php echo $out['evaluation_date']?>" id="some_class_1">
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------->
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> عناصر التقييم</h3>
        </div>

        <div class="panel-body">
            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center">م</th>
                    <th class="text-center">عنصر التقييم</th>
                    <th class="text-center">درجة النهاية العظمى</th>
                    <th class="text-center"> درجة  التقييم </th>
                </tr>
                </thead>
                <?php
                $a=1;$total=0;$total_emp_eval=0;
                foreach ($eval_setting as $rows ):?>
                    <?php  if(isset($result) && $result!=null && !empty($result)){
                        $emp_grade=$rows->evaluation_type_grade;
                        $evaluation_type_id=$rows->evaluation_type_id;
                        $total_emp_eval +=$rows->evaluation_type_grade;
                        ?>
                        <input type="hidden" name="id_for_update<?php echo $a ?>"  value="<?php  echo $rows->id;?>"/>
                    <?php }else{
                        $emp_grade=0;
                        $evaluation_type_id=$rows->id;
                    }?>
                    <tr>
                        <td><?php echo $a ?></td>
                        <td><? echo $rows->title;?>
                            <input type="hidden" name="evaluation_type_id<?php echo $a ?>"  value="<?php  echo $evaluation_type_id;?>"/>
                        </td>
                        <td><?php  echo $rows->grade;?>
                            <input type="hidden" id="max<?php echo $a ?>"  value="<?php  echo $rows->grade;?>"/>  </td>
                        <td>   <input type="number" class="form-control" id="grade<?php echo $a ?>" min="0" max="<?php echo $rows->grade;?>"
                                      name="evaluation_type_grade<?php echo $a ?>" value="<?php echo $emp_grade?>" onchange="CalculateTotal(<?php echo $a ?>);" /> </td>
                    </tr>
                    <?php
                    $a++;  $total+=$rows->grade  ;
                endforeach;  ?>
                <tr>
                    <td><?php echo $a?> </td>
                    <td>المجموع </td>
                    <td><? echo $total;?> </td>
                    <td><input type="number" class="form-control" name="totalgrade" id="totalgrade" value="<?php echo $total_emp_eval?>" readonly="readonly" /> </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function CalculateTotal(num) {
        var max_grade=parseInt($("#max"+num).val()) ;
        var emp_grade=parseInt($("#grade"+num).val());

        if(emp_grade >  max_grade){
            alert("يجب ان تكون درجة التقييم أقل من او مساويه لدرجة النهاية العظمى " );
            $("#grade"+num).val(max_grade);
        }
        total=0;
        var max= <?php echo sizeof($eval_setting);?>;
        for(i = 1; i <= max; i++){
            var onegrade=parseInt($('#grade'+i).val());
            total+=parseInt(onegrade);
        }
        $('#totalgrade').val(total);
    }
</script>
<!----------------------input------------------->
<div class="form-group col-sm-5"></div>
<div class="form-group col-sm-4">
    <input type="hidden" name="MAX" value="<?php echo sizeof($eval_setting);?>"/>
    <?php echo  $out['input']?>
</div>
<div class="form-group col-sm-5"></div>
<?php echo form_close()?>
<!----------------------input------------------->

<?php if(isset($table)&& $table!=null && !empty($table) ):?>
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
                            <th class="text-center">إسم الموظف </th>
                            <th class="text-center">درجة التقييم</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $a=1;foreach ($table as $record ):?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php  echo $record->employee;?></td>
                                <td><?php   echo $record->sub;?></td>
                                <td> <a href="<?php echo base_url('Administrative_affairs/UpdateStaffEvaluation').'/'.$record->employee_id.'/'.$record->sub_date[0].'/'.$record->sub_date[1]?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                    <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->employee_id;?>"><i class="fa fa-trash-o"></i></button></a>
                                </td>
                            </tr>
                            <!------------------------>
                            <div class="modal fade modal-danger" id="modald<?php echo$record->employee_id;;?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h1 class="modal-title">حذف تقييم</h1>
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
                            <?php
                            $a++;
                        endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php  endif; ?>














<!--------------------------------------------------------------------->
