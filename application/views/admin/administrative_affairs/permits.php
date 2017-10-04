

<!------------------------------------------------>
<?php if(isset($result)):?>
    <?php  echo form_open_multipart('Administrative_affairs/edit_permits/'.$result[0]->id)?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">تعديل إذن</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الطلب</label>
                    <?php if(!empty($count)){$value=($count[0]->id)+1;}else{$value =1;}?>
                    <input type="text" name="permit_num" id="permit_num"  readonly class="form-control half input-style" placeholder="رقم الطلب" value="<?php echo $result[0]->permit_num; ?>">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">التاريخ</label>
                    <input type="text"  name="date" class=" some_class form-control half input-style" value="<? echo date('m-d-Y',$result[0]->date); ?>" placeholder="يوم / شهر / سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الإسم</label>
                    <input type="text" name="emp_code"  class="form-control half input-style" value="<?if(!empty($select[$result[0]->emp_code][0]->employee)): echo  $select[$result[0]->emp_code][0]->employee ; endif;?>"  readonly placeholder=" رقم الهاتف"  >
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المسمي الوظيفي</label>
                    <input type="text" name="emp_code"  class="form-control half input-style" readonly value="<? if(!empty($select[$result[0]->emp_code][0]->department)): echo $job_title[$select[$result[0]->emp_code][0]->department][0]->name; endif;?>" placeholder=" رقم الهاتف"  >
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> نوع الإذن</label>
                    <select class="choose-date selectpicker form-control half" name="permit_type" id="permit_type"    required data-show-subtext="true" data-live-search="true">
                            <?php if($result[0]->permit_type ==1){?>
                                <option value="1">صباحى</option>
                                <option value="2">مسائي</option>
                            <?}elseif($result[0]->permit_type ==2){?>
                                <option value="2">مسائي</option>
                                <option value="1">صباحى</option>
                            <?}?>
                        </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> وقت الخروج</label>
                    <input type="time" name="time_out"  id="time_out" class="form-control half input-style" readonly value="<? echo $result[0]->time_out;?>" placeholder="وقت الخروج"  >
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> وقت العودة</label>
                    <input type="time" name="time_return"  id="time_return" class="form-control half input-style" readonly value="<? echo $result[0]->time_return;?>" placeholder="وقت العودة"  >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">سبب الإذن</label>
                    <textarea class="form-control" style="" name="permit_reason"> <? echo $result[0]->permit_reason;?></textarea>
                </div>

            </div>
        </div>
    </div>

    <!--------------------------------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="edit" value="حفظ" class="btn btn-add  w-md m-b-5">
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
                <h3 class="panel-title">إضافة إذن</h3>
            </div>
            <div class="panel-body">
                <?php  echo form_open_multipart('Administrative_affairs/add_permits')?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الطلب</label>
                    <input type="text" name="permit_num" id="permit_num" readonly class="form-control half input-style" value="<?php echo ($last+1); ?>"placeholder="رقم الطلب "  >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">التاريخ</label>
                    <input type="text"  name="date" class=" some_class form-control half input-style" placeholder="يوم / شهر / سنة" required="" id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الإسم</label>
                    <input type="text" name="emp_code"  class="form-control half input-style" placeholder=" الإسم" value="<?if(!empty($select[$_SESSION['emp_code']][0]->employee)): echo  $select[$_SESSION['emp_code']][0]->employee ; endif;?>" readonly >
                </div>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المسمي الوظيفي</label>
                    <input type="text" name="emp_code"  class="form-control half input-style" placeholder=" المسمي الوظيفي" value="<? if(!empty($select[$_SESSION['emp_code']][0]->department)): echo $job_title[$select[$_SESSION['emp_code']][0]->department][0]->name; endif;?>" readonly >
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع الإذن</label>
                    <select class="choose-date selectpicker form-control half" name="permit_type" id="permit_type"    data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <option value="1">صباحى</option>
                        <option value="2">مسائي</option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">وقت الخروج</label>
                    <input type="time" name="time_out"  id="time_out" class="form-control half input-style" placeholder="وقت الخروج"  >

                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">وقت العودة</label>
                    <input type="time" name="time_return"  id="time_return" class="form-control half input-style" placeholder="وقت العودة"  >

                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">سبب الإذن</label>
                    <textarea class="form-control" style="" name="permit_reason"></textarea>
                </div>


            </div>
        </div>
    </div>

    <!----------------------------------------->
    <?php
    if(!empty($permits)){
        $perm_num=sizeof($permits);
        $ozon_num_max=$affairs_setting[0]->ozon_num;
        if( $perm_num < $ozon_num_max ){
            $html_tag=' <button name="add" value="حفظ" type="submit" class="btn btn-primary">حفظ</button>';
            $html_tag=' ';
        }elseif($perm_num == $ozon_num_max ){
            $html_tag='';
        }

    }else{

        $html_tag='  <input type="submit" role="button" name="add" value="حفظ" class="btn btn-add  w-md m-b-5">';

    }

    ?>
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <?php   echo $html_tag;?>
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
                                <th>نوع الإذن</th>
                                <th>وقت الخروج</th>
                                <th>وقت العودة</th>
                                <th>التفاصيل</th>
                                <th>الاجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?echo date('Y-m-d',$record->date); ?></td>
                                    <?php
                                    if ($record->permit_type ==1){
                                        echo'  <td >صباحى</td>';
                                    }else{
                                        echo'  <td >مسائي</td>';
                                    }
                                    ?>
                                    <td> <?php echo $record->time_out ?></td>
                                    <td> <?php echo $record->time_return ?></td>
                                    <td><button class="btn btn-info w-md m-b-5 md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $record->id?>">التفاصيل</button></td>
                                    <td> <a href="<?php echo base_url('Administrative_affairs/edit_permits').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a>
                                                                 
                                    </td>
                                </tr>
                     <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف الإذن</h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a href="<?php echo base_url('Administrative_affairs/delete_permits').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   <!------------------------>
                                <div class="md-modal md-effect-11" id="modal-<?php echo $record->id?>">
                                    <div class="md-content">
                                        <h3>تفاصيل الإذن</h3>
                                        <div class="n-modal-body">
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> إسم الموظف:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><?if(!empty($select[$record->emp_code][0]->emp_name)): echo  $select[$record->emp_code][0]->emp_name ; endif;?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> تاريخ الطلب:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><? echo date('Y-m-d',$record->date); ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> وقت الخروج:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><? echo $record->time_out; ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> وقت العوده:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><? echo $record->time_return; ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> سبب الأذن:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><? echo $record->permit_reason; ?></h5>
                                                </div>
                                            </div>
<!--                                            -->
                                            <button class="btn btn-add md-close">إغلاق!</button>
                                        </div>
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



