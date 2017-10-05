

<!------------------------------------------------>
<?php if(isset($results)):?>
    <?php echo form_open_multipart('dashboard/update_car_details/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل تفاصيل السيارات</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> رقم السيارة</label>
                    <input type="number" class="form-control half input-style" name="car_code"  value="<?php echo $results['car_code'] ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع السيارة</label>
                    <select class="choose-date selectpicker form-control half" name="car_type_id_fk" id="car_type_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($cars as $record):
                            if($record->id==$results['car_type_id_fk']){
                                $selected='selected';
                            }else{
                                $selected='';
                            } ?>
                            <option value="<?php echo $record->id ?>" <?php echo $selected ?> ><?php echo $record->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم المحرك</label>
                    <input type="number" class="form-control half input-style" name="engine_code" id="engine_code"  value="<?php echo $results['engine_code'] ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">شركة التأمين</label>
                    <select class="choose-date selectpicker form-control half" name="company_id_fk" id="company_id_fk"    data-show-subtext="true" data-live-search="true">
                        <?php if($results['company_id_fk']==0): ?>
                            <option value="0" selected> - لا يوجد - </option>
                        <?php else: ?>
                            <option value="0" > - لا يوجد - </option>
                        <?php endif; ?>
                        <?php foreach ($company as $record):
                            if($record->id==$results['company_id_fk']){
                                $selected='selected';
                            }else{
                                $selected='';
                            }
                            ?>
                            <option value="<?php echo $record->id ?>" <?php echo $selected ?>><?php echo $record->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> مبلغ التأمين</label>
                    <input type="number" class="form-control half input-style" name="insurance_cost"  value="<?php echo $results['insurance_cost'] ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ التأمين</label>
                    <input type="text"   value="<?php echo date('Y-m-d',$results['insurance_date'])?>"  name="insurance_date" class=" some_class_2 form-control half input-style" placeholder="/شهر/يوم /سنة"   id="some_class_1">
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
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تفاصيل السيارات</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('dashboard/add_car_details',array('class'=>"",'role'=>"form" ))?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم السيارة</label>
                    <input type="number" name="car_code"   class="form-control half input-style" placeholder="رقم السيارة" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع السيارة</label>
                    <select class="choose-date selectpicker form-control half" name="car_type_id_fk" id="car_type_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($cars as $record): ?>
                            <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم المحرك</label>
                    <input type="number" class="form-control half input-style" name="engine_code" id="engine_code"  onkeyup="return pass_name();" required>
                    <span  id="optia2" > </span>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">شركة التأمين</label>
                    <select class="choose-date selectpicker form-control half" name="company_id_fk" id="company_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($company as $record): ?>
                            <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> مبلغ التأمين</label>
                    <input type="number" class="form-control half input-style" name="insurance_cost"   required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ التأمين</label>
                    <input type="text"   name="insurance_date" class=" some_class_2 form-control half input-style" placeholder="/شهر/يوم /سنة" required="" id="some_class_1">
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
                                <th class="text-center"> رقم السيارة </th>
                                <th class="text-center"> نوع السيارة </th>
                                <th class="text-center"> رقم المحرك </th>
                                <th class="text-center"> تفاصيل </th>
                                <th class="text-center"> الاجراء </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?> </td>
                                    <td>  <?php echo $record->car_code; ?> </td>
                                    <td>  <?php
                                        if($record->car_type_id_fk){
                                            $this->db->select('*');
                                            $this->db->from('companies_and_cars_types');
                                            $this->db->where('id',$record->car_type_id_fk);
                                            $query2 = $this->db->get();
                                            $dataa2= $query2->row_array();
                                            echo $dataa2['name'] ;
                                        }else{
                                        }
                                        ?> </td>
                                    <td>  <?php echo $record->engine_code; ?> </td>
                                    <td><button class="btn btn-info w-md m-b-5 md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $record->id?>">التفاصيل</button></td>
                                    <td> <a href="<?php echo base_url('dashboard/update_car_details').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف  تفاصيل سيارة </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('dashboard/delete_car_details').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------>
                                <div class="md-modal md-effect-11" id="modal-<?php echo $record->id?>">
                                    <div class="md-content">
                                        <h3>تفاصيل السيارة</h3>
                                        <div class="n-modal-body">
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> رقم السيارة:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><?php echo $record->car_code; ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> نوع السيارة:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5>      <?php
                                                        if($record->car_type_id_fk){
                                                            $this->db->select('*');
                                                            $this->db->from('companies_and_cars_types');
                                                            $this->db->where('id',$record->car_type_id_fk);
                                                            $query2 = $this->db->get();
                                                            $dataa2= $query2->row_array();
                                                            echo $dataa2['name'] ;
                                                        }else{
                                                        }
                                                        ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> رقم المحرك:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><?php echo $record->engine_code; ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> شركة التأمين:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><?php
                                                        if($record->company_id_fk){
                                                            $this->db->select('*');
                                                            $this->db->from('companies_and_cars_types');
                                                            $this->db->where('id',$record->company_id_fk);
                                                            $query2 = $this->db->get();
                                                            $dataa2= $query2->row_array();
                                                            echo $dataa2['name'] ;
                                                        }else{
                                                        }
                                                        ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-add md-close">إغلاق!</button>
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





    <script>
        function pass_name(){
            var user_username=$('#engine_code').val();
            if(user_username != "" &&  user_username !=0){
                var dataString ='engine_num_chik='+ user_username ;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>dashboard/add_car_details',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $("#optia2").html(html);
                    }
                });
            }
        }// end function
    </script>
