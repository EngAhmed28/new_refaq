


<!------------------------------------------------>
<?php if(isset($results)):?>
    <?php echo form_open_multipart('dashboard/update_orders_car/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل أمر شغل</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم امر التشغيل</label>
                    <input type="number" class="form-control half input-style" name="orders_num"  value="<?php echo $results['orders_num'] ?>" >
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
                    <label class="label label-green  half">رقم العداد</label>
                    <input type="text" class="form-control half input-style" name="counter_number_go"  value="<?php echo $results['counter_number_go'] ?>" required>
                </div>
            <?php if($results['return']==1): ?>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">رقم العدادالعودة</label>
                <input type="text" class="form-control half input-style" name="counter_number_returns"  value="<?php echo $results['counter_number_return'] ?>" required>
            </div>
            <?php endif; ?>
            </div>
            </div>
        </div>

<!-- -------------------------------------------->
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">جهة المأمورية</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">من</label>
                    <input type="text"  name="place_from" value="<?php echo date('Y-m-d',$results['place_from']) ?>" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required="" id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الي</label>
                    <input type="text"  name="place_to" value="<?php echo date('Y-m-d',$results['place_to']) ?>" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required="" id="some_class_1">
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------------------------->
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">التاريخ</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">من</label>
                    <input type="text"  name="date_from" value="<?php echo date('Y-m-d',$results['date_from']) ?>" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required="" id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الي</label>
                    <input type="text"  name="date_to" value="<?php echo date('Y-m-d',$results['date_to']) ?>" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required="" id="some_class_1">
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
    <?php echo form_open_multipart('dashboard/add_orders_car/',array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">  أمر شغل</h3>
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
                    <label class="label label-green  half">رقم العداد</label>
                    <input type="text" class="form-control half input-style" name="counter_number_go"   required>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------------------------->
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">جهة المأمورية</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">من</label>
                    <input type="text"  name="place_from"  class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الي</label>
                    <input type="text"  name="place_to" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required id="some_class_1">
                </div>
            </div>
        </div>
    </div>
    <!-- -------------------------------------------->
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">التاريخ</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">من</label>
                    <input type="text"  name="date_from"  class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الي</label>
                    <input type="text"  name="date_to"  class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة" required id="some_class_1">
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
                                <th class="text-center"> رقم امر التشغيل   </th>
                                <th class="text-center"> رقم السيارة  </th>
                                <th class="text-center"> اسم السائق  </th>
                                <th class="text-center"> جهة من   </th>
                                <th class="text-center"> جهة الي </th>
                                <th class="text-center"> التاريخ من </th>
                                <th class="text-center"> التاريخ الي </th>
                                <th class="text-center"> الاجراء </th>
                                <th class="text-center"> اجراء العودة </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?> </td>
                                    <td>  <?php echo $record->orders_num; ?> </td>
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
                                    <td>  <?php echo $record->place_from; ?> </td>
                                    <td>  <?php echo $record->place_to; ?> </td>
                                    <td>  <?php echo date('d-m-Y',$record->date_from) ?> </td>
                                    <td>  <?php echo date('d-m-Y',$record->date_to) ?> </td>
                                    <td> <a href="<?php echo base_url('dashboard/update_orders_car').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                    <?php if($record->return ==1): ?>
                                        <td><?php echo  $record->counter_number_go - $record->counter_number_return  ?></td>
                                    <?php else: ?>
                                        <td>
                                            <button class="btn btn-info w-md m-b-5 md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $record->id?>">تسجيل العودة</button>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <div class="md-modal md-effect-11" id="modal-<?php echo $record->id?>">
                                    <div class="md-content">
                                        <h3>اجراء العودة</h3>
                                        <?php echo form_open_multipart('dashboard/update_orders_car_return/'.$record->id,array('class'=>"",'role'=>"form" ))?>
                                        <div class="n-modal-body">
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> رقم العداد:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="counter_number_return" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-default btn-next"  name="add_return" value="إغلاق" />
                                            <input type="submit" class="btn btn-success btn-next"  name="add_return" value="حفظ" />
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>

                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف أمر شغل </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('dashboard/delete_orders_car').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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





