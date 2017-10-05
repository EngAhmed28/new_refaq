


<!------------------------------------------------>
<?php    $crashe_status = array('لم يتم التصليح','جاري التصليح','تم التصليح');?>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/car_crash/'.$result['id'],array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل عطل سيارة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم العطل</label>
                    <input type="number" class="form-control half input-style" name="crashe_num"  value="<?php echo $result['crashe_num'] ?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إختر السيارة</label>
                    <select class="choose-date selectpicker form-control half" name="car_id_fk" id="car_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option value="">--قم بإختيار السيارة--</option>
                        <?php
                        if(isset($cars) && $cars != null)
                            foreach($cars as $record){
                                if(isset($result['car_id_fk']) && $result['car_id_fk'] == $record->id)
                                    $select = 'selected';
                                else
                                    $select = '';
                                echo '<option value="'.$record->id.'" '.$select.'>'.$record->car_code.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">عدد الأعطال</label>
                    <input type="text" class="form-control half input-style" name="count"  onkeyup="return lood($('#count').val(),<?php echo $result['id'] ?>);" onkeypress="return isNumberKey(event)"  required>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------------------------->
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم العطل</label>
                    <input type="text" class="form-control half input-style" name="crashe_name"  value="<?php echo $result['crashe_name'] ?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">حالة العطل</label>
                    <select class="choose-date selectpicker form-control half" name="crashe_status_old" id="crashe_status_old"    data-show-subtext="true" data-live-search="true">
                        <option value="">--قم بإختيار السيارة--</option>
                        <?php
                             for($z = 0 ; $z < count($crashe_status) ; $z++){
                                 $select = '';
                                if($z == $result['crashe_status']){
                                    $select = 'selected';
                                }?>
                       <option value="<?php echo $z;?>" <?php echo $select;?>><?php echo $crashe_status[$z];?></option>
                             <?php  } ?>
                     </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">ملاحظات</label>
                    <textarea name="notes_old" class="form-control" style="margin: 0px 0px 0px -5px; height: 61px; width: 354px;"  id="notes_old" cols="30" rows="10"><?php echo $result['notes'];?></textarea>
                </div>
                <div id="optionalarea1"></div>
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
<?php else:  $id = 0 ?>
    <!--add-->
    <?php echo form_open_multipart('dashboard/car_crash/0',array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">اعطال السيارات</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم العطل</label>
                    <input type="number" class="form-control half input-style" name="crashe_num"   >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إختر السيارة</label>
                    <select class="choose-date selectpicker form-control half" name="car_id_fk" id="car_id_fk"    data-show-subtext="true" data-live-search="true">
                        <option value="">--قم بإختيار السيارة--</option>
                        <?php
                        if(isset($cars) && $cars != null)
                            foreach($cars as $record){
                                echo '<option value="'.$record->id.'" >'.$record->car_code.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">عدد الأعطال</label>
                    <input type="text" class="form-control half input-style" name="count"  id="count" onkeyup="return lood($('#count').val(),<?php echo $id ?>);" onkeypress="return isNumberKey(event)"  required>
                </div>
                <div id="optionalarea1"></div>
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
                                <th class="text-center"> م </th>
                                <th class="text-center">رقم السيارة</th>
                                <th class="text-center">رقم العطل</th>
                                <th class="text-center">إسم العطل</th>
                                <th class="text-center">حالة العطل</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            for($x = 0 ; $x < count($table) ; $x++){
                                $totalTickets = array_sum(array_map("count", $table[key($table)]));

                                echo '<tr>
                                            <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                            <td rowspan="'.$totalTickets.'">'.$cars[key($table)]->car_code.'</td>';
                                for($a = 0 ; $a < count($table[key($table)]) ; $a++){
                                    echo   '<td rowspan="'.count($table[key($table)][key($table[key($table)])]).'">'.$table[key($table)][key($table[key($table)])][0]->crashe_num.'</td>';
                                    for($z = 0 ; $z < count($table[key($table)][key($table[key($table)])]) ; $z++){
                                        $title=''  ;
                                        if(!empty($table[key($table)][key($table[key($table)])][$z]->crashe_name)){
                                            $title=$table[key($table)][key($table[key($table)])][$z]->crashe_name;
                                        }
                                        $status='';
                                        if(!empty($crashe_status[$table[key($table)][key($table[key($table)])][$z]->crashe_status])){
                                          $status =$crashe_status[$table[key($table)][key($table[key($table)])][$z]->crashe_status];
                                        }
                                        echo '  <td>'.$title.'</td>
                                               <td>'.$status.'</td>';?>
                                        <td> <a href="<?php echo base_url('dashboard/car_crash').'/'.$table[key($table)][key($table[key($table)])][$z]->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                            <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                                  </tr>
                                        <!------------------------>
                                        <div class="modal fade modal-danger" id="modald<?php echo$table[key($table)][key($table[key($table)])][$z]->id;?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h1 class="modal-title">حذف عطل سيارة </h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>هل تريد حذف العنصر !
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                        <a  class="deleteItem"  href="" onclick="del(<?php echo $table[key($table)][key($table[key($table)])][$z]->id;?>,0);"><button type="button" class="btn btn-danger">حذف</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------------>

                                   <?php }
                                    next($table[key($table)]);
                                }
                                next($table);
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php  endif; endif; ?>


<script>
    function lood(count,id){
        if(count != 0)
        {
            var dataString = 'count=' + count;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/car_crash/'+id,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionalarea1').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionalarea1').html('');
            $('#count').val('');
            return false;
        }
    }
</script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
    function del(code, id){
        if(code != '')
        {
                var dataString = 'code=' + code;
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>/dashboard/car_crash/'+id,
                    data:dataString,
                    dataType: 'html',
                    cache:false,
                    success: function(dataType){
                        $('a.deleteItem').live('click', function(){
                            var tableRow = $(this).closest('tr');
                            tableRow.find('td').fadeOut('slow',
                                function(){
                                    tableRow.remove();
                                }
                            );
                        });
                    }
                });
                return false;

        }
    }
</script>



