<!--------------------------------------------------------------------->

<!--------------------------------------------------------------------->
<!--------------------------------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> الأوقاف</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع الوقف</label>
                <select class="choose-date selectpicker form-control half" name="endowment_type" id="endowment_type" onchange="return change_endowment()"  data-show-subtext="true" data-live-search="true" >
                    <?php  $arr=array('الكل','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
                    for ($s=0;$s<sizeof($arr);$s++):?>
                        <option value="<?echo $s;?>"><? echo $arr[$s];?></option>
                    <?php endfor;?>
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
                <a href="<?php echo base_url()?>finance_resource/add_endowments/"><div class="r-add ">
                        <img  style="width: 34px;margin-bottom: 10px" src="<?php echo base_url()?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
                    </div> </a></div>
            <?php if(isset($all_records) && $all_records!=null):?>
                <div class="table-responsive"  id="optionearead">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">إسم الوقف</th>
                            <th class="text-center">نوع الوقف</th>
                            <th class="text-center">مبلغ الوقف</th>
                            <th class="text-center">المبلغ المتبقي</th>
                            <th class="text-center">النسبة</th>
                            <th class="text-center">المدينة</th>
                            <th class="text-center">عرض</th>
                            <th class="text-center last-th">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a=0;
                        foreach ($all_records as $record):
                            $arr=array('إختر','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
                            $a++;?>
                            <tr>
                                <td><?php echo $a;?></td>
                                <td><?php echo $record->endowment_name;?></td>
                                <td><?php echo $arr[$record->endowment_type];?></td>
                                <td><? echo $record->endowment_cost;?></td>
                                <td>المبلغ المتبقي</td>
                                <td>100%</td>
                                <td><?  if($main_depart[$record->city])echo $main_depart[$record->city]->main_dep_name;?></td>
                                <td><a  class="btn btn-primary btn-circle m-b-5" href="<?php echo base_url().'Finance_resource/edit_endowments/'.$record->id.'/view'?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a></td>
                                <td> <a href="<?php echo base_url('Finance_resource/edit_endowments').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a></td>
                            </tr>
                        <?php endforeach;?>

                        <!--------------------------------------------------------------------->

                        </tbody>
                    </table>
                </div>
            <?php  endif;?>
        </div>
    </div>
</div>




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

        <!--------------------------------------->
        <script>
            function change_endowment()
            {
                if($('#endowment_type').val() !=0 ){
                    var endowment = $('#endowment_type').val();
                }
                var dataString = 'endowment='+ endowment;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>/Finance_resource/all_endowments',
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

