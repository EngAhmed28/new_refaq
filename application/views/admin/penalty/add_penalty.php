
<!------------------------------------------------>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('Administrative_affairs/edit_penalty/'.$result[0]->id)?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل موظف</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> تاريخ اليوم</label>
                    <input type="text" name="date"  class=" some_class_2 form-control half input-style" placeholder="/ ---/--- /--" required value="<? echo date('Y-m-d', $result[0]->date); ?> id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم الموظف</label>
                    <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id"    data-show-subtext="true" data-live-search="true">
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
                    <label class="label label-green  half">الإدارة</label>
                    <select class="choose-date selectpicker form-control half" name="main_depart" id="main_depart"  disabled  data-show-subtext="true" data-live-search="true">
                        <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo $depart_name[$get_data2[$result[0]->emp_id][0]->administration][0]->name;?></option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">القسم</label>
                    <select class="choose-date selectpicker form-control half" name="sub_depart" id="sub_depart"  disabled   data-show-subtext="true" data-live-search="true">
                        <option><?php if(!empty($get_data2[$result[0]->emp_id]))echo$depart_name[$get_data2[$result[0]->emp_id][0]->department][0]->name;?></option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع الجزاء</label>
                    <select class="choose-date selectpicker form-control half" name="penalty_type" id="penalty_type"    data-show-subtext="true" data-live-search="true">
                        <? if($result[0]->penalty_type ==1){?>
                            <option value="1">مادية</option>
                            <option value="2">أخري</option>
                        <?  }elseif($result[0]->penalty_type ==2){?>
                            <option value="2">أخري</option>
                            <option value="1">مادية</option>
                        <?} ?>
                    </select>
                </div>
                <? if($result[0]->penalty_type ==1){?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> القيمة</label>
                    <input type="number" name="value"  class="form-control half input-style" value="<? echo $result[0]->value;?>">
                </div>
                <?}elseif($result[0]->penalty_type ==2){?>
                <div class="form-group col-sm-4" id="value" style="display: none">
                    <label class="label label-green  half"> القيمة</label>
                    <input type="number" name="value"  class="form-control half input-style" >
                </div>
                <? }?>
                <div class="form-group col-sm-4" >
                    <label class="label label-green  half"> التفاصيل</label>
                    <textarea name="content" id="content"  style="margin: 0px; height: 49px; width: 355px;" cols="30" rows="10"><?php echo $result[0]->content; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="edit" value="تعديل" class="btn btn-add">
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
                <h3 class="panel-title"> إضافة موظف</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('Administrative_affairs/add_penalty/')?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ اليوم</label>
                    <input type="text" name="date"  class=" some_class_2 form-control half input-style" placeholder="/ ---/--- /--" required  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم الموظف</label>
                    <?php if($_SESSION['role_id_fk'] ==2):?>
                        <input type="text" name="emp_id"  class=" some_class_2 form-control half input-style" value="<?php echo $get_data['employee'];?>">
                    <?else:?>
                    <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id"  onchange="getTermsAndCredits(this.value);"   data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php if (!empty($employs)):?>
                            <?php  foreach ($employs as $record):?>
                                <option value="<?php  echo $record->id;?>"><?php  echo $record->employee;?></option>
                            <?php  endforeach;?>
                        <?php endif;?>
                        <?php endif;?>
                    </select>
                    <div id="optionearea3"></div>
                </div>
                <div class="form-group col-sm-4" >
                    <label class="label label-green  half">الإدارة</label>
                    <div id="optionearea3">
                    <?php if($_SESSION['role_id_fk'] ==2):?>
                        <input type="text"  name="main_depart" readonly value="<?php echo $depart_name[$get_data['administration']][0]->name;?>">
                    <?else:?>
                        <input type="text" name="main_depart">
                    <?endif;?>
                        </div>
                </div>
                <div class="form-group col-sm-4" >
                    <label class="label label-green  half">القسم</label>
                    <div id="optionearea4">
                        <?php if($_SESSION['role_id_fk'] ==2):?>
                            <input type="text"  name="sub_depart"  readonly value="<?php echo $depart_name[$get_data['department']][0]->name;?>">
                        <?else:?>
                            <input type="text" name="sub_depart">
                        <?endif;?>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع الجزاء</label>
                    <select class="choose-date selectpicker form-control half" name="penalty_type" id="penalty_type" onchange="checkduration()"    data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <option value="1">مادية</option>
                        <option value="2">أخري</option>
                    </select>
                </div>

                <div class="form-group col-sm-4"  id="value" style="display: none">
                    <label class="label label-green  half"> القيمة</label>
                    <input type="number" name="value"  class="form-control half input-style" >
                </div>

                <div class="form-group col-sm-4" >
                    <label class="label label-green  half"> التفاصيل</label>
                    <textarea name="content" id="content"  style="margin: 0px; height: 49px; width: 355px;" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="add" value="حفظ" class="btn btn-add">
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
                                <th>الاجراء</th>
                         <?php if($_SESSION['role_id_fk'] == 1 ||$_SESSION['role_id_fk'] == 2):?>
                          <th class="text-center">الإعتماد</th>
                            <?php endif;?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1;foreach ($records as $row ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo date('Y-m-d',$row->date);?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id])) :echo$get_data2[$row->emp_id][0]->employee; endif;?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id]))echo $depart_name[$get_data2[$row->emp_id][0]->administration][0]->name;?></td>
                                    <td><?php if(!empty($get_data2[$row->emp_id]))echo$depart_name[$get_data2[$row->emp_id][0]->department][0]->name;?></td>
                                    <td> <a href="<?php echo base_url('Administrative_affairs/edit_penalty').'/'.$row->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$row->id;?>"><i class="fa fa-trash-o"></i></button></a>
                                    </td>

                                        <?php if($_SESSION['role_id_fk'] == 1 ||$_SESSION['role_id_fk'] == 2):?>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success m-r-2 m-b-5 btn-xs" data-toggle="modal" data-target="#modala<?php echo $row->id;?>">موافق</button>
                                        <button type="button" class="btn btn-danger m-r-2 m-b-5 btn-xs" data-toggle="modal" data-target="#modalr<?php echo $row->id;?>">رفض</button>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$row->id;?>" tabindex="-1" role="dialog">
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
                                                <a href="<?php echo base_url('Administrative_affairs/delete_penalty').'/'.$row->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------>

                                <!--------------------------------------------------------->

                                <!-- Modal success -->
                                <div class="modal fade modal-success" id="modala<?php echo $row->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">موافقة</h1>
                                            </div>
                                            <?php echo form_open_multipart('Administrative_affairs/suspend_penalty/'.$row->id)?>
                                            <div class="modal-body">
                                                                    <textarea name="reason"  style="margin: 0px; width: 564px; height: 89px;" id="reason" cols="30"
                                                                              rows="10"></textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn " data-dismiss="modal">إغلاق</button>
                                                <input  role="button"  type="submit"  name="accept" value="موافقة"  class="btn btn-success" >
                                            </div>
                                            <?php echo form_close()?>
                                        </div>
                                    </div>
                                </div>
                                <!----------------------->
                                <!-- Modal denger -->
                                <div class="modal fade modal-danger" id="modalr<?php echo $row->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">رفض</h1>
                                            </div>
                                            <?php echo form_open_multipart('Administrative_affairs/suspend_penalty/'.$row->id)?>
                                            <div class="modal-body">
                                                                  <textarea name="reason"  style="margin: 0px; width: 564px; height: 89px;" id="reason" cols="30"
                                                                            rows="10"></textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn " data-dismiss="modal">إغلاق</button>
                                                <input  style="margin-left: 70px;" type="submit"  name="ref" value="رفض"  class="btn btn-danger" >
                                            </div>
                                            <?php echo form_close()?>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------------------------------>
                                <?php $a++;endforeach;  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php  endif; endif; ?>









<!--------------------------------------------------------------------->

            <script>

                function getTermsAndCredits(value) {
                    search(value);
                    go(value);
                }

                function search(valu)
                {
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea3').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea3').html('');
                        return false;
                    }

                }

            </script>

            <script>
                function go(valuu)
                {
                    if(valuu)
                    {
                        var dataString = 'valuu=' + valuu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>/administrative_affairs/add_penalty',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea4').html(html);
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea4').html('');
                        return false;
                    }

                }

            </script>
            <script>
                $('#value').hide();
                function checkduration() {
                    var penalty_type =$("#penalty_type").val();
                    if(penalty_type ==1){
                        $('#value').show();
                    }else{
                        $('#value').hide();
                    }
                }
            </script>

