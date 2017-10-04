
<!------------------------------------------------>
<?php if(isset($result)):?>
    <?php  echo form_open_multipart('Administrative_affairs/update_vacation/'.$result['id'])?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">تعديل أجازة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الإدارة</label>
                    <select class="choose-date selectpicker form-control half" name="main_dep_f_id" id="main_dep_f_id"  disabled  data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php if(!empty($admin)):
                            foreach ($admin as $record):
                                $sect='';
                                if( $employ_name[$result['emp_id']][0]->administration ==$record->id ){
                                    $sect ='selected';
                                }
                                ?>
                                <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                            <?php  endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الموظف</label>
                    <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id"   disabled data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
                            foreach ($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $records):
                                $select ='';

                                if($result['emp_id'] ==  $records->id ){
                                    $select ='selected';
                                }
                                ?>
                                <option value="<? echo $records->id;?>" <? echo $select;?>><? echo $records->employee;?></option>
                            <?php  endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع الأجازة</label>
                    <select class="choose-date selectpicker form-control half" name="vacation_id" id="vacation_id"  required  data-show-subtext="true" data-live-search="true">
                        <?php $vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                        for($a=0;$a<sizeof($vacation);$a++):

                            $select='';
                            if($a ==$result['vacation_id']){
                                $select='selected';
                            }
                            ?>
                            <option value="<? echo $a; ?>" <? echo $select;?>><? echo $vacation[$a]; ?></option>
                        <? endfor ?>
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> من</label>
                    <input type="text"  name="from_date" class=" some_class_2 form-control half input-style"  placeholder="يوم / شهر / سنة"  value="<? echo $result['from_date'];?>" id="some_class_1">
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إلي</label>
                    <input type="text"  name="to_date" class=" some_class_2 form-control half input-style"  placeholder="يوم / شهر / سنة"  value="<? echo $result['to_date'];?>" id="some_class_2">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">التأشيره المطلوبة</label>
                    <textarea class="form-control"  name="visa"><? echo $result['visa'];?></textarea>
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الموظف القائم بالعمل</label>
                    <select class="choose-date selectpicker form-control half" name="emp_assigned_id" id="emp_assigned_id"  required  data-show-subtext="true" data-live-search="true">
                        <option value="">إختر </option>
                        <?php
                        if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
                            foreach($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $record):
                                $select ='';
                                if($record->id == $result['emp_id']){
                                    continue;
                                }
                                if($record->id == $result['emp_assigned_id']){
                                    $select ='selected';
                                }
                                ?>
                                <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->employee;?></option>
                            <? endforeach; endif;?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="update" value="حفظ" class="btn btn-add  w-md m-b-5">
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
                <h3 class="panel-title"> إضافة أجازة</h3>
            </div>
            <div class="panel-body">
                <?php  echo form_open_multipart('Administrative_affairs/add_vacation')?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الإدارة</label>
                    <?php if($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 2  ):?>
                    <select class="choose-date selectpicker form-control half" name="main_dep_f_id" id="main_dep_f_id"   onchange="return sub($('#main_dep_f_id').val());" data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php if(!empty($admin)):
                            foreach ($admin as $record):
                                $sect='';
                                if( $result[0]->administration ==$record->id ){
                                    $sect ='selected';
                                }
                                ?>
                                <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                            <?php  endforeach; endif;?>
                    </select>
                    <?php elseif($_SESSION['role_id_fk'] == 3): ?>
                    <input type="hidden" name="main_dep_f_id" value="<? echo $employ_name[$_SESSION['emp_code']][0]->administration ?>">
                    <select class="choose-date selectpicker form-control half" name="main_dep_f_id" id="main_dep_f_id"   disabled  data-show-subtext="true" data-live-search="true">
                            <?php if (!empty($employ_name[$_SESSION['emp_code']])):
                                if(!empty($admin)):
                                    foreach ($admin as $record):
                                        $sect='';
                                        if( $employ_name[$_SESSION['emp_code']][0]->administration ==$record->id ){
                                            $sect ='selected';
                                        }?>
                                        <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                                <?php  endforeach; endif;    endif;?>
                        </select>
                    <?php endif;?>
                </div>

                <div class="form-group col-sm-4" id="optionearea5">
                    <label class="label label-green  half">الموظف</label>
                    <?php if($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 2  ):?>
                    <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id" data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                    </select>
                    <?php elseif($_SESSION['role_id_fk'] == 3):?>
                    <?php if (!empty($employ_name[$_SESSION['emp_code']])): ?>
                    <input type="hidden" name="emp_id" value="<? echo $employ_name[$_SESSION['emp_code']][0]->id?>">
                    <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id" disabled data-show-subtext="true" data-live-search="true">
                        <option value="<?php  echo $employ_name[$_SESSION['emp_code']][0]->id;?>"><?php echo $employ_name[$_SESSION['emp_code']][0]->employee; ?></option>
                    </select>
                        <?php endif;?>
                    <?php endif?>

                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع الأجازة</label>
                    <select class="choose-date selectpicker form-control half" name="vacation_id" id="vacation_id"   required data-show-subtext="true" data-live-search="true">
                        <?php $vacation=array('إختر','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                        for($a=0;$a<sizeof($vacation);$a++):   ?>
                            <option value="<? echo $a; ?>"><? echo $vacation[$a]; ?></option>
                        <? endfor ?>

                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">من</label>
                    <input type="text"  name="from_date" class=" some_class_2 form-control half input-style"  placeholder="يوم / شهر / سنة"  id="some_class_1">
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> إلي</label>
                    <input type="text"  name="to_date" class=" some_class_2 form-control half input-style"  placeholder="يوم / شهر / سنة"  id="some_class_2">
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half">التأشيره المطلوبة</label>
                    <textarea class="form-control" required name="visa"></textarea>
                </div>

                <div class="form-group col-sm-8" id="optionearea55">
                    <?php
                    if($_SESSION['role_id_fk'] == 3):
                    if (!empty($employ_name[$_SESSION['emp_code']])): ?>
                    <?php
                    $query2 =$this->db->query('SELECT * FROM `vacations` WHERE `deleted`=1 AND `emp_id`='.$employ_name[$_SESSION['emp_code']][0]->id);
                    $arr=array();
                    foreach ($query2->result() as  $row2) {
                        $arr[] =$row2;
                    }
                    ?>
                        <?php if (sizeof($arr)>0) {   ?>
                            <div class="form-group col-sm-6">
                            <table class="table table-bordered table-striped "  style=""  >
                            <thead>
                            <tr>
                                <th style="text-align: center">م</th>
                                <th style="text-align: center">اليوم</th>
                                <th style="text-align: center">نوع الأجازة</th>
                                <th style="text-align: center">المدة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?    $vacation=array('','أجازة سنوية','أجازة مرضية','أجازة بدون أجر');
                            $counter=0;
                            foreach ($arr as  $row):
                                $counter++;
                                $day_from=$row->from_date;
                                $day_to= $row->to_date;
                                $date1 = new DateTime($day_from);
                                $date2 = new DateTime($day_to);
                                $diff = $date2->diff($date1)->format("%a");
                               echo'<tr>
                              <td>'.$counter.'</td>
                              <td>'.$day_from.'</td>
                              <td>'.$vacation[$row->vacation_id].'</td>
                              <td>'.$diff.'</td>
                            </tr>';
                            endforeach;  }  ?>
                        </tbody>
                        </table>
                        </div>
                        <?php
                        $idea_emp_id=  $employ_name[$_SESSION['emp_code']][0]->id;
                        $depart=  $employ_name[$_SESSION['emp_code']][0]->administration;

                        $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$depart.' And `id` !='.$idea_emp_id);
                        $arr=array();
                        foreach ($query2->result() as  $row2) {
                            $arr[] =$row2;
                        }?>
                    <?php if (!empty($employ_name[$_SESSION['emp_code']])): ?>
                        <div class="form-group col-sm-6">
                            <label class="label label-green  half">الموظف القائم بالعمل</label>
                            <select class="choose-date selectpicker form-control half" name="emp_assigned_id" id="emp_assigned_id"   required data-show-subtext="true" data-live-search="true">

                                <option value="">إختر </option>
                                <?php    foreach($arr as $record): ?>
                                    <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
                                <? endforeach;?>
                            </select>
                        </div>
                    <?php endif;?>
                </div>
            <?php endif;endif;?>



            </div>
        </div>
    </div>
    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="add" value="حفظ" class="btn btn-add  w-md m-b-5">
    </div>
    <?php echo form_close()?>
    <div class="form-group col-sm-5"></div>

    <!----------------------input------------------->

    <?php if(isset($table)&&$table!=null):?>
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
                                <th class="text-center">الموظف القائم بالعمل</th>
                                <th class="text-center">مدة الاجازة</th>
                                <th  class="text-center">حاله الأجازة</th>
                                <th  class="text-center">الإجراء</th>
                                <th  class="text-center">التفاصيل</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1;foreach ($table as $record ):
                                $date1 = new DateTime($record->from_date);
                                $date2 = new DateTime($record->to_date);
                                $diff = $date2->diff($date1)->format("%a");
                                if($record->suspend == 1)
                                {
                                    $class = 'success';
                                    $title = 'نشط';
                                }
                                else
                                {
                                    $class = 'danger';
                                    $title = 'غير نشط';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></td>
                                    <td ><? if(!empty($record->emp_assigned_id)) : echo $employ_name[$record->emp_assigned_id][0]->employee; endif; ?></td>
                                    <td ><? echo $diff; ?></td>
                                    <td>
                                        <a href="<?php echo base_url().'Administrative_affairs/suspend_vacation/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-8"><?php echo $title ?> </a>
                                    </td>

                                    <td> <a href="<?php echo base_url('Administrative_affairs/update_vacation').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a>
                                      </td>
                                    <td><button class="btn btn-info w-md m-b-5 md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $record->id?>">التفاصيل</button>
                                        <?php
                                        $query2 =$this->db->query('SELECT * FROM `vacations` WHERE `emp_id`='.$record->emp_id.' And `deleted`=1  ');
                                        $arr=array();
                                        foreach ($query2->result() as  $row2) {
                                            $arr[] = $row2;
                                        }
                                        ?>

                                        <!------------------------>
                                        <div class="md-modal md-effect-11" id="modal-<?php echo $record->id?>">
                                            <div class="md-content">
                                                <h3>تفاصيل أجازات الموظف</h3>
                                                <div class="n-modal-body">
                                                    <div class="row" style="margin-right:10px">
                                                        <div class="col-sm-3">
                                                            <h5> إسم الموظف:</h5>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h5><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></h5>                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
                                                            <thead>
                                                            <tr>
                                                                <th width="5%" class="text-right">م</th>
                                                                <th  class="text-right">القائم بالعمل</th>
                                                                <th  class="text-right">المدة</th>
                                                                <th  class="text-right">نوع الأجازة</th>
                                                                <th  class="text-right">تاريخ النهاية</th>
                                                                <th class="text-right">اريخ البداية</th>
                                                            </tr>
                                                            </thead>
                                                            <? if (!empty($arr)) :?>
                                                                <tbody>
                                                                <tr>
                                                                    <?
                                                                    $count=0;
                                                                    $sum=0;
                                                                    foreach ($arr as $row):
                                                                    $count++;
                                                                    $date1 = new DateTime($row->from_date);
                                                                    $date2 = new DateTime($row->to_date);
                                                                    $diff = $date2->diff($date1)->format("%a");
                                                                    ?>
                                                                    <td><? echo $count;?></td>
                                                                    <td><? echo $row->emp_assigned_id;?></td>
                                                                    <td><? echo $diff;?></td>
                                                                    <td><? echo $row->vacation_id;?></td>
                                                                    <td><? echo $row->to_date;?></td>
                                                                    <td><? echo $row->from_date;?></td>

                                                                </tr>
                                                                <? endforeach;?>
                                                                </tbody>
                                                            <? endif;?>
                                                        </table>
                                                    </div>

                                                    <div class="row" style="margin-right:10px">
                                                        <div class="col-sm-3">
                                                            <h5>التأشيرة المطلوبة:</h5>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h5><? echo $row->visa;?></h5>
                                                        </div>
                                                    </div>

                                                    <!--                                            -->
                                                    <button class="btn btn-add md-close">إغلاق!</button>
                                                </div>
                                            </div>
                                        </div>



                                        <!------------------------>

                                    </td>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف أجازة</h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('Administrative_affairs/delete_vacation').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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


    function sub(values)
    {
        if(values)
        {
            var dataString = 'values=' + values;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_vacation',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea5').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea5').html('');
            return false;
        }

    }
</script>