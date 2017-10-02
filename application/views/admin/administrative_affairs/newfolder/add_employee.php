
<!------------------------------------------------>
<?php if(isset($result)):?>
<?php  echo form_open_multipart('Administrative_affairs/edit_employee/'.$result[0]->id)?>
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">كود الموظف</label>
                <?php if(!empty($count)){$value=($count[0]->id)+1;}else{$value =1;}?>
                <input type="text" name="emp_code"  readonly class="form-control half input-style" placeholder="كود الموظف" value="<? echo $result[0]->id;?>">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">الإدارة</label>
                <select class="choose-date selectpicker form-control half" name="administration" id="administration"   onchange="return lood($('#administration').val());" data-show-subtext="true" data-live-search="true">
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
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع التعيين</label>
                <select class="choose-date selectpicker form-control half" name="contract" id="contract"   onchange=" return go($('#contract').val())"  data-show-subtext="true" data-live-search="true">
                    <?if($result[0]->contract ==0){?>
                        <option value="0">مكلف</option>
                        <option value="1">مكافأة</option>
                    <?}elseif($result[0]->contract ==1){?>
                        <option value="1">مكافأة</option>
                        <option value="0">مكلف</option>
                    <?}?>
                </select>
            </div>

            <div class="form-group col-sm-4">
                <label class="label label-green  half"> تاريخ الميلاد</label>
                <input type="text"  name="birth_date" class=" some_class form-control half input-style" value="<? echo date('m-d-Y',$result[0]->birth_date); ?>" placeholder="يوم / شهر / سنة"  id="some_class_1">
            </div>


            <div class="form-group col-sm-4">
                <label class="label label-green  half"> رقم الهاتف</label>
                <input type="number" name="phone_num"  class="form-control half input-style" value="<?echo $result[0]->phone_num;?>" placeholder=" رقم الهاتف"  >
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.4s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">الدرجة</label>
                <select class="choose-date selectpicker form-control half" name="degree_id" id="degree_id"    required data-show-subtext="true" data-live-search="true">
                    <?php  $degree=array('إختر','1','2','3','4','5','6');
                    for($a=0;$a<sizeof($degree);$a++):
                        $select='';
                        if($a == $result[0]->degree_id){
                            $select='selected';
                        }
                        ?>
                        <option value="<? echo $a; ?>" <? echo $select;?>><? echo $degree[$a]; ?></option>
                    <? endfor ?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">إسم الموظف</label>
                <input type="text" name="employee"  class="form-control half input-style" placeholder="إسم الموظف"  value="<?echo $result[0]->employee;?>" >

            </div>
            <div class="form-group col-sm-4" id="optionearea1">
                <label class="label label-green  half">القسم</label>
                <select class="choose-date selectpicker form-control half" name="department" id="department"    data-show-subtext="true" data-live-search="true">
                    <?php if(!empty($admin)):
                        foreach ($departs[$result[0]->administration] as $record):
                            $select='';
                            if($record->id == $result[0]->department ){
                                $select='selected';
                            }
                            ?>
                            <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->name;?></option>
                        <?php  endforeach; endif;?>
                </select>
            </div>
            <? if($result[0]->contract ==0){?>
            <div class="form-group col-sm-4" id="contract_id" >
                <label class="label label-green  half"> قرار التكليف</label>
                <input type="text" name="employee"  class="form-control half input-style erfa2 file_input_replacement" placeholder="ارفاق"  >
                <input type="file" name="img" class="file_input_with_replacement">
            </div>
            <? }?>
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> رقم الهوية</label>
                <input type="number" name="id_num"  class="form-control half input-style" placeholder="رقم الهوية"  value="<?echo $result[0]->id_num;?>" >
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> العنوان</label>
                <input type="text" name="address"  class="form-control half input-style" placeholder="العنوان" value="<?echo $result[0]->address;?>">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">البريد الإلكتروني</label>
                <input type="email" name="email"  class="form-control half input-style" placeholder="البريد الإلكتروني" value="<?echo $result[0]->email;?>" >
            </div>
        </div>
    </div>
</div>






<!--------------------------------------------->

    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.5s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">إعدادات الأجازات والأذونات</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إعدادات الأجازات والأذونات</label>
                    <select class="choose-date selectpicker form-control half" name="group_affairs_id_fk" id="group_affairs_id_fk"    required data-show-subtext="true" data-live-search="true" >
                        <?php if(!empty($affairs_settings_options_FK)):
                            foreach ($affairs_settings_options_FK as $record):
                                $sect='';
                                if( $result[0]->group_affairs_id_fk ==$record->id ){
                                    $sect ='selected';
                                }
                                ?>
                                <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->set_name;?></option>
                            <?php  endforeach; endif;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> رصيد أجازات سابق</label>
                    <input type="text" name="past_days"  class="form-control half input-style" placeholder="رصيد أجازات سابق" value="<?php echo $result[0]->past_days;?>"  >

                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------->
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.6s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">إعدادات مالية</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الراتب الأساسي</label>
                    <input type="number" name="salary"  class="form-control half input-style" placeholder="الراتب الأساسي" value="<?echo $result[0]->salary;?>"  >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> بدل نقل</label>
                    <input type="number" name="b_naql"  class="form-control half input-style" placeholder="بدل نقل"  value="<?echo $result[0]->b_naql;?>">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> بدل منصب إشرافي</label>
                    <input type="number" name="b_eshraf"  class="form-control half input-style" placeholder="بدل منصب إشرافي" value="<?echo $result[0]->b_eshraf;?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">بدل طبيعة عمل</label>
                    <input type="number" name="b_amal"  class="form-control half input-style" placeholder="بدل طبيعة عمل" value="<?echo $result[0]->b_amal;?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> بدل اتصالات</label>
                    <input type="number" name="b_etislat"  class="form-control half input-style" placeholder="بدل اتصالات" value="<?echo $result[0]->b_etislat;?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">خصم تأمينات</label>
                    <input type="number" name="k_tamen"  class="form-control half input-style" placeholder="خصم تأمينات"  value="<?echo $result[0]->k_tamen;?>">
                </div>
            </div>
        </div> </div>


    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="edit" value="حفظ" class="btn btn-success btn-rounded w-md m-b-5">
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
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <?php  echo form_open_multipart('Administrative_affairs/add_employee')?>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">كود الموظف</label>
                            <?php if(!empty($count)){$value=($count[0]->id)+1;}else{$value =1;}?>
                            <input type="text" name="emp_code"  readonly class="form-control half input-style" placeholder="كود الموظف" value="<? echo $value;?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">الإدارة</label>
                            <select class="choose-date selectpicker form-control half" name="administration" id="administration"   onchange="return lood($('#administration').val());" data-show-subtext="true" data-live-search="true">
                                <option value="">إختر</option>
                                <?php if(!empty($admin)):
                                    foreach ($admin as $record):?>
                                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                    <?php  endforeach; endif;?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">نوع التعيين</label>
                            <select class="choose-date selectpicker form-control half" name="contract" id="contract" onchange=" return go($('#contract').val())"    data-show-subtext="true" data-live-search="true">
                                <option value="">إختر</option>
                                <option value="0">مكلف</option>
                                <option value="1">مكافأة</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> تاريخ الميلاد</label>
                            <input type="text"  name="birth_date" class=" some_class form-control half input-style" placeholder="يوم / شهر / سنة" required="" id="some_class_1">
                        </div>


                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> رقم الهاتف</label>
                            <input type="number" name="phone_num"  class="form-control half input-style" placeholder=" رقم الهاتف" required >
                        </div>
                    </div>
                </div>
            </div>

              <!----------------------------------------->
            <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.4s">
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">الدرجة</label>
                            <select class="choose-date selectpicker form-control half" name="degree_id" id="degree_id"    required data-show-subtext="true" data-live-search="true">
                                <?php $degree=array('إختر','1','2','3','4','5','6');
                                for($a=0;$a<sizeof($degree);$a++):   ?>
                                    <option value="<? echo $a; ?>"><? echo $degree[$a]; ?></option>
                                <? endfor ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">إسم الموظف</label>
                            <input type="text" name="employee"  class="form-control half input-style" placeholder="إسم الموظف"  >

                        </div>
                        <div class="form-group col-sm-4" id="optionearea1">
                            <label class="label label-green  half">القسم</label>
                            <select class="choose-date selectpicker form-control half" name="department" id="department"    data-show-subtext="true" data-live-search="true">
                                    <option value="">إختر</option>
                                </select>
                        </div>

                        <div class="form-group col-sm-4" id="contract_id" style="display: none">
                            <label class="label label-green  half"> قرار التكليف</label>
                            <input type="file" name="img"  class="form-control half" placeholder="ارفاق"  >
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> رقم الهوية</label>
                            <input type="number" name="id_num"  class="form-control half input-style" placeholder="رقم الهوية" required >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> العنوان</label>
                            <input type="text" name="address"  class="form-control half input-style" placeholder="العنوان" required >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">البريد الإلكتروني</label>
                            <input type="email" name="email"  class="form-control half input-style" placeholder="البريد الإلكتروني" required >
                        </div>
                    </div>
                </div>
            </div>
                    <!----------------------------------------->
            <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.5s">
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title">إعدادات الأجازات والأذونات</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">إعدادات الأجازات والأذونات</label>
                            <select class="choose-date selectpicker form-control half" name="group_affairs_id_fk" id="group_affairs_id_fk"    required data-show-subtext="true" data-live-search="true" >
                                    <option value="">إختر</option>
                                    <?php if(!empty($affairs_settings_options)):
                                        foreach ($affairs_settings_options as $record):?>
                                            <option value="<? echo $record->id;?>"><? echo $record->set_name;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> رصيد أجازات سابق</label>
                            <input type="text" name="past_days"  class="form-control half input-style" placeholder="رصيد أجازات سابق"  >

                        </div>
                    </div>
                </div>
            </div>
                    <!----------------------------------------->
            <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.6s">
                <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title">إعدادات مالية</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">الراتب الأساسي</label>
                            <input type="number" name="salary"  class="form-control half input-style" placeholder="الراتب الأساسي"  >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> بدل نقل</label>
                            <input type="number" name="b_naql"  class="form-control half input-style" placeholder="بدل نقل"  >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> بدل منصب إشرافي</label>
                            <input type="number" name="b_eshraf"  class="form-control half input-style" placeholder="بدل منصب إشرافي"  >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">بدل طبيعة عمل</label>
                            <input type="number" name="b_amal"  class="form-control half input-style" placeholder="بدل طبيعة عمل"  >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half"> بدل اتصالات</label>
                            <input type="number" name="b_etislat"  class="form-control half input-style" placeholder="بدل اتصالات"  >
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label label-green  half">خصم تأمينات</label>
                            <input type="number" name="k_tamen"  class="form-control half input-style" placeholder="خصم تأمينات"  >
                        </div>
                    </div>
                </div> </div>
                <!----------------------input------------------->
                <div class="form-group col-sm-5"></div>
                <div class="form-group col-sm-4">
                    <input type="submit" role="button" name="add" value="حفظ" class="btn btn-success btn-rounded w-md m-b-5">
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
                                        <th>إسم الموظف</th>
                                        <th>الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                      <?php $a=1;foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><? echo $record->employee;?></td>
                                        <td> <a href="<?php echo base_url('Administrative_affairs/edit_employee').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                     <a href="<?php echo base_url('Administrative_affairs/delete_employee').'/'.$record->id ?>">     <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
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
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_employee',
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

<script>
    $(document).ready(function () {
        $('#contract_id').hide();
    });

    function go(valu) {
        if(valu === '0'){
            $('#contract_id').show();
        }else{
            $('#contract_id').hide();
        }

    }
</script>
