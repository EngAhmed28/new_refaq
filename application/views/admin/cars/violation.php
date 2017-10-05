

.


<!------------------------------------------------>
<?php if(isset($results)):?>
    <?php echo form_open_multipart('dashboard/update_car_violation/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل مخالفة سيارة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم امر التشغيل</label>
                    <input type="number" class="form-control half input-style" name="violation_num"  value="<?php echo $results['violation_num'] ?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ اليوم</label>
                    <input type="text"  name="date" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة"  value="<?php echo date('Y-m-d',$results['date']) ?>"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم السيارة</label>
                    <select class="choose-date selectpicker form-control half" name="car_id_fk" id="car_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($cars as $record):
                            if($record->id==$results['car_id_fk']){
                                $selected='selected';
                            }else{
                                $selected='';
                            }
                            ?>
                            <option value="<?php echo $record->id ?>" <?php echo $selected  ?>><?php echo $record->car_code ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">السائق</label>
                    <select class="choose-date selectpicker form-control half" name="driver_id_fk" id="driver_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($cars as $record):
                            if($record->id==$results['car_id_fk']){
                                $selected='selected';
                            }else{
                                $selected='';
                            }
                            ?>
                            <option value="<?php echo $record->id ?>" <?php echo $selected  ?>><?php echo $record->car_code ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> رقم الايصال</label>
                    <input type="number" class="form-control half input-style" name="receipt_code"  value="<?php echo $results['receipt_code'] ?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">ملاحظات</label>
                    <textarea  class="form-control" style="margin: 0px 0px 0px -5px; height: 61px; width: 354px;" name="note" id="note" cols="30" rows="10"><?php echo $results['note'] ?></textarea>
                </div>

            </div>
        </div>
    </div>
    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="update" value="تعديل" class="btn btn-add  w-md m-b-5">
    </div>
    <div class="form-group col-sm-5"></div>
    <?php echo form_close()?>
    <!----------------------input------------------->
    <!--edit-->
<?php else: ?>
    <!--add-->
    <?php echo form_open_multipart('dashboard/add_car_violation',array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">  مخالفة السيارات</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم امر التشغيل</label>
                    <input type="number" class="form-control half input-style" name="orders_num" value="<?php
                    if($last ==null) {
                        echo   $last=1;
                    }else{
                        $a= $last[0]->id;
                        echo $a+1;
                    }
                    ?>"  readonly  >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ اليوم</label>
                    <input type="text"  name="date" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة"   id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم السيارة</label>
                    <select class="choose-date selectpicker form-control half" name="car_id_fk" id="car_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($cars as $record):
                            if(in_array($record->id,$all)){

                                continue;
                            } ?>
                            <option value="<?php echo $record->id ?>"><?php echo $record->car_code ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">السائق</label>
                    <select class="choose-date selectpicker form-control half" name="driver_id_fk" id="driver_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($drivers as $record):

                            if(in_array($record->id,$ddd)){

                                continue;
                            } ?>
                            <option value="<?php echo $record->id ?>"><?php echo $record->driver_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الايصال</label>
                    <input type="number" class="form-control half input-style" name="receipt_code"   required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">ملاحظات</label>
                    <textarea  class="form-control" style="margin: 0px 0px 0px -5px; height: 61px; width: 354px;" name="note" id="note" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>

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
                                <th class="text-center"> رقم السيارة  </th>
                                <th class="text-center"> اسم السائق  </th>
                                <th class="text-center"> ملاحظات   </th>
                                <th class="text-center"> رقم الايصال </th>
                                <th class="text-center"> التاريخ  </th>
                                <th class="text-center"> الاجراء </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?> </td>
                                    <td> <?php
                                        if($record->car_id_fk){
                                            $this->db->select('*');
                                            $this->db->from('cars');
                                            $this->db->where('id',$record->car_id_fk);
                                            $query2 = $this->db->get();
                                            $dataa2= $query2->row_array();

                                            echo $dataa2['car_code'] ;
                                        }else{

                                        }
                                        ?></td>
                                    <td>  <?php
                                        if($record->driver_id_fk){
                                            $this->db->select('*');
                                            $this->db->from('drivers');
                                            $this->db->where('id',$record->driver_id_fk);
                                            $query2 = $this->db->get();
                                            $dataa2= $query2->row_array();

                                            echo $dataa2['driver_name'] ;
                                        }else{

                                        }
                                        ?>  </td>
                                    <td>  <?php echo $record->note; ?> </td>
                                    <td>  <?php echo $record->receipt_code; ?> </td>
                                    <td>  <?php echo date('Y-m-d',$record->date)  ?> </td>
                                    <td> <a href="<?php echo base_url('dashboard/update_car_violation').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف مخالفة سيارة </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('dashboard/delete_car_violation').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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








