


<!------------------------------------------------>
<?php if(isset($results)):?>
    <?php echo form_open_multipart('dashboard/update_driver/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل سائق</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">كود السائق</label>
                    <input type="text" class="form-control half input-style" name="driver_code"  value="<?php echo $results['driver_code'] ?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">اسم السائق</label>
                    <input type="text" class="form-control half input-style" name="driver_name"  value="<?php echo $results['driver_name'] ?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم البطاقة</label>
                    <input type="text" class="form-control half input-style" name="driver_card"  value="<?php echo $results['driver_card'] ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">العنوان</label>
                    <input type="text" class="form-control half input-style" name="driver_address"  value="<?php echo $results['driver_address'] ?>" required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الرخصة</label>
                    <input type="text" class="form-control half input-style" name="driver_license_code"  value="<?php echo $results['driver_license_code'] ?>" required>
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
                <h3 class="panel-title"> السائقين</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('dashboard/add_driver',array('class'=>"",'role'=>"form" ))?>

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> كود السائق</label>
                    <input type="text" name="driver_code"   class="form-control half input-style" placeholder=" كود السائق"value="<?php
                    if($last ==null) {
                        echo   $last=1;
                    }else{

                        $a= $last[0]->id;
                        echo $a+1;
                    }

                    ?>" readonly >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> اسم السائق</label>
                    <input type="text" name="driver_name"   class="form-control half input-style" placeholder=" اسم السائق" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم البطاقة</label>
                    <input type="text" name="driver_card"   class="form-control half input-style" placeholder="رقم البطاقة" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">العنوان</label>
                    <input type="text" name="driver_address"   class="form-control half input-style" placeholder=" العنوان" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الرخصة</label>
                    <input type="text" name="driver_license_code"   class="form-control half input-style" placeholder="رقم الرخصة" >
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
                                <th class="text-center"> كود السائق  </th>
                                <th class="text-center"> اسم السائق  </th>
                                <th class="text-center"> رقم البطاقة  </th>
                                <th class="text-center"> العنوان  </th>
                                <th class="text-center"> رقم الرخصة </th>
                                <th class="text-center"> الاجراء </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?> </td>
                                    <td>  <?php echo $record->driver_code; ?> </td>
                                    <td>  <?php echo $record->driver_name; ?> </td>
                                    <td>  <?php echo $record->driver_card; ?> </td>
                                    <td>  <?php echo $record->driver_address; ?> </td>
                                    <td>  <?php echo $record->driver_license_code; ?> </td>
                                    <td> <a href="<?php echo base_url('dashboard/update_driver').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف سائق </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('dashboard/delete_driver').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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





