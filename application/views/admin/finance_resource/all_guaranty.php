<!--------------------------------------------------------------------->
<!--------------------------------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> الكفالات</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع الكفالة</label>
                <select class="choose-date selectpicker form-control half"name="guaranty_type" id="guaranty_type" onchange="return change_guaranty()"  data-show-subtext="true" data-live-search="true" >
                    <option value="all">الكل</option>
                    <?php if(!empty($guaranty_types)):
                        foreach ($guaranty_types as $record):?>
                            <option value="<? echo $record->id;?>"><? echo $record->title;?></option>
                        <?php  endforeach;endif;?>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">النوع</label>
                <select class="choose-date selectpicker form-control half"name="gender_type" id="gender_type" onchange="return change_guaranty();" data-show-subtext="true" data-live-search="true">
                    <option value="all">الكل</option>
                    <option value="1">ذكر</option>
                    <option value="2">أنثي</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">طريقة الدفع</label>
                <select class="choose-date selectpicker form-control half" name="payment_method" id="payment_method" onchange="return change_guaranty();" data-show-subtext="true" data-live-search="true">
                    <?php $arr =array('الكل','شهري','ثلاثة شهور','ستة شهور','سنوي','خمس سنوات','كامل المبلغ');
                    for ($d=0;$d <sizeof($arr);$d++):?>
                        <option value="<? echo $d;?>"><? echo $arr[$d];?></option>
                    <?php  endfor;?>
                </select>
            </div>
        </div>
    </div>
</div>



<!--------------------------------------------------------------------->
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
            <div class="pull-right">
                <a href="<?php echo base_url()?>finance_resource/guaranty/"><div class="r-add ">
                        <img  style="width: 34px;margin-bottom: 10px" src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                    </div> </a></div>
            <?php if(isset($all_records) && $all_records!=null):?>
                <div class="table-responsive"  id="optionearead">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th class="text-center"> م </th>
                            <th class="text-center">رقم الطلب </th>
                            <th class="text-center">إسم الكافل</th>
                            <th class="text-center">نوع الطلب</th>
                            <th class="text-center">عدد الأيتام</th>
                            <th class="text-center">العدد الفعلي</th>
                            <th class="text-center">تاريخ الكفالة</th>
                            <th class="text-center">حالة الطلب</th>
                            <th class="text-center">الموظف المسئول</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">إلغاء</th>
                            <th class="text-center last-th">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $x=0;
                        foreach ($all_records as $record): $x++;?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $record->id;?></td>
                                <td><?php if(!empty($select_donor[$record->guarantee_id])) echo $select_donor[$record->guarantee_id]->user_name;?></td>
                                <td><?php if(!empty($select_type[$record->guaranty_type])) echo $select_type[$record->guaranty_type]->title;?></td>
                                <td><? echo $record->number;?></td>
                                <td>العدد الفعلي</td>

                                <td><? echo date('Y-m-d',$record->guaranty_start);?></td>
                                <td>جديد</td>
                                <td>الموظف المسئول</td>
                                <td><a  class="btn btn-primary btn-circle m-b-5" href="<?php echo base_url().'Finance_resource/edit_guaranty/'.$record->id.'/view'?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a></td>
                                <td>إلغاء</td>
                                <td> <a href="<?php echo base_url('Finance_resource/edit_guaranty').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                    <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                            </tr>
                            <!------------------------>
                            <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h1 class="modal-title">حذف كفالة </h1>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل تريد حذف العنصر !
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                            <a href="<?php echo base_url('Finance_resource/delete_guaranty').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php  endif;?>
        </div>
    </div>
</div>



<!--------------------------------------------------------------------->
    <script>
        function sent(valu)
        {
            if(valu)
            {
                var dataString = 'valu=' + valu;
                $.ajax({

                    type:'post',
                    url: '<?php echo base_url() ?>/family/family_services',
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(html){
                        $('#optionearea2').html(html);
                    }
                });
                return false;
            }
            else
            {
                $('#optionearea2').html('');
                return false;
            }

        }
    </script>

    <!-------------------------------------->
    <script>
        function go(number)
        {
            if(number)
            {
                var dataString = 'number=' + number;
                $.ajax({

                    type:'post',
                    url: '<?php echo base_url() ?>/family/family_services',
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
        function change_guaranty()
        {
            var guarantees='guarantees';
            var guaranty='';
            var gender= '';
            var payment ='';
            if($('#guaranty_type').val() != 0 ){
                var guaranty = $('#guaranty_type').val();
            }
            if($('#gender_type').val() !=0 ){
                var gender = $('#gender_type').val();
            }
            if($('#payment_method').val() !=0 ){
                var payment = $('#payment_method').val();
            }
            var dataString = 'guaranty='+ guaranty + '&gender='+ gender +'&payment='+ payment +'&guarantees='+ guarantees;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Finance_resource/all_guaranty',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearead').html(html);
                }
            });
            return false;
        }
    </script
