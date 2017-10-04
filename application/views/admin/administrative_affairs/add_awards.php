
<!------------------------------------------------>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('Administrative_affairs/edit_awards/'.$result[0]->id)?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">تعديل مكافأة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ اليوم</label>
                    <input type="text"  name="date" class=" some_class2 form-control half input-style" value="<? echo date('m-d-Y',$result[0]->date); ?>" placeholder="يوم / شهر / سنة"  id="some_class_1">
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم الموظف</label>
                    <select class="choose-date selectpicker form-control half" name="department" id="department"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                            <?php  foreach ($employs as $record):
                                $dis ='';
                                if($result[0]->emp_id == $record->id){
                                    $dis ='selected';

                                }?>
                                <option value="<?php  echo $record->id;?>" <?echo $dis;?>><?php  echo $record->employee;?></option>
                            <?php  endforeach;?>
                        <?php endif;?>
                        </select>
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> قيمة المكافأة</label>
                    <input type="number" name="value"  class="form-control half input-style" readonly value="<? echo $result[0]->value;?>"  >
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> التفاصيل</label>
                    <textarea  name="details" id="details"  class="form-control"><? echo $result[0]->details; ?> </textarea>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------------->
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
                <h3 class="panel-title">إضافة مكافأة</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('Administrative_affairs/add_awards/')?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ اليوم</label>
                    <input type="text"  name="date" class=" some_class form-control half input-style" placeholder="شهر / يوم / سنة" required="" id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم الموظف</label>
                    <?php if($_SESSION['role_id_fk'] ==2 ||$_SESSION['role_id_fk'] ==1):?>
                        <input type="text" name="emp_id" value="<?php echo $get_data['employee'];?>" disabled class="form-control half input-style">
                    <?elseif($_SESSION['role_id_fk'] ==3):?>
                    <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id"    required  data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                            <?php  foreach ($employs as $record):?>
                                <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                            <?php  endforeach;?>
                        <?php endif;?>
                        <?php endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">قيمة المكافأة</label>
                    <input type="number" name="value"  class="form-control half input-style" placeholder=" المسمي الوظيفي" readonly >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">التفاصيل</label>
                    <textarea class="form-control" name="details" id="details"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------->
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
                                <th>م</th>
                                <th>تاريخ اليوم</th>
                                <th>إسم الموظف</th>
                                <th>الإدارة</th>
                                <th>القسم</th>
                                <th>قيمة المكافأة </th>
                                <th>الاجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo date('Y-m-d',$record->date);?></td>
                                    <td><?php echo$get_data2[$record->emp_id][0]->employee;?></td>
                                    <td><?php if(!empty($get_data2[$record->emp_id]))echo $depart_name[$get_data2[$record->emp_id][0]->administration][0]->name;?></td>
                                    <td><?php if(!empty($get_data2[$record->emp_id]))echo$depart_name[$get_data2[$record->emp_id][0]->department][0]->name;?></td>
                                    <td><?php echo$record->value;?></td>
                                    <td> <a href="<?php echo base_url('Administrative_affairs/edit_awards').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a>

                                    </td>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف مكافأة</h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url('Administrative_affairs/delete_awards').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $a++;endforeach;  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php  endif; endif; ?>





