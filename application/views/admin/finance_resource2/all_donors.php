<!--------------------------------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> المتبرعون</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع المتبرع</label>
                <select class="choose-date selectpicker form-control half" name="donor_type" id="donor_type"  data-show-subtext="true" data-live-search="true" onchange="return change_donor()">
                    <option value="all">الكل</option>
                    <option value="1">فرد</option>
                    <option value="2">مؤسسة</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">النوع</label>
                <select class="choose-date selectpicker form-control half" name="gender_type" id="gender_type" onchange="return change_donor();" data-show-subtext="true" data-live-search="true">
                    <option value="all">الكل</option>
                    <option value="1">ذكر</option>
                    <option value="2">أنثي</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">طريقة الدفع</label>
                <select class="choose-date selectpicker form-control half" name="df3_type" id="df3_type" onchange="return change_donor();" data-show-subtext="true" data-live-search="true">
                    <?  $pay = array('الكل','نقدي','شيك','تحويل','استقطاع','شبكه');
                    for($a=0;$a<sizeof($pay);$a++):?>
                        <option value="<?echo $a;?>"><?echo $pay[$a];?></option>
                    <?endfor?>
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
                <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add ">
                        <img  style="width: 34px;margin-bottom: 10px" src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                    </div> </a></div>
                <?php if(isset($all_records) && $all_records!=null):?>
                <div class="table-responsive"  id="optionearead">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th class="text-center"> م </th>
                            <th class="text-center">رقم الكافل </th>
                            <th class="text-center">إسم الكافل</th>
                            <th class="text-center">نوع الكافل</th>
                            <th class="text-center">طريقة الدفع</th>
                            <th class="text-center">رقم الجوال</th>
                            <th class="text-center">صفة المتبرع</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $x=0;
                        foreach ($all_records as $record):
                            $donor_type =array('','فردي','مؤسسة');
                            $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                            $x++;?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $record->id;?></td>
                                <td><?php echo $record->user_name;?></td>
                                <td><?php echo $donor_type[$record->donor_type];?></td>
                                <td><?php echo $pay[$record->pay_method_id_fk];?></td>
                                <td><?php echo $record->guaranty_mob;?></td>
                                <td><?php echo $record->character_person;?></td>
                                <td>
                                    <a  class="btn btn-primary btn-circle m-b-5" href="<?php echo base_url().'Finance_resource/edit_donors/'.$record->id.'/view'?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a></td>
                                <td> <a href="<?php echo base_url('Finance_resource/edit_donors').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                    <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                            </tr>
                            <!------------------------>
                            <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h1 class="modal-title">حذف متبرع </h1>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل تريد حذف العنصر !
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                            <a href="<?php echo base_url('Finance_resource/delete_donors').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------>
                            <?php $x++;endforeach;  ?>

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
    <!-------------------------------------->
    <script>
        function change_donor()
        {    var donors ='donors';
            var donor='';
            var gender= '';
            var df3 ='';
            if($('#donor_type').val() !=0 ){
                var donor = $('#donor_type').val();
            }
            if($('#gender_type').val() !=0 ){
                var gender = $('#gender_type').val();
            }
            if($('#df3_type').val() !=0 ){
                var df3 = $('#df3_type').val();
            }
            var dataString = 'donor='+ donor + '&gender='+ gender +'&df3='+ df3  +'&donors='+ donors;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>/Finance_resource/all_donors',
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
