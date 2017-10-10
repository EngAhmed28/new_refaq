<!--------------------------------------------------------------------->


<!------------------------------------------------>
<?php  echo form_open_multipart('General_assembly/add_member')?>

    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">أعضاء الجمعية العمومية</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم العضو</label>
                    <input type="text" class="form-control half input-style" name="name" id="name"  required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الهاتف</label>
                    <input class="form-control half input-style" type="number" id="mobile" name="mobile"  required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">العنوان</label>
                    <input class="form-control half input-style" type="text" id="address" name="address"   required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الإيميل</label>
                    <input class="form-control half input-style" type="email"  name="email" id="email"  required>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> تاريخ التعيين</label>
                    <input type="text" name="date_of_hiring"  class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة"  id="some_class_1">
                </div>

            </div>

        </div>
    </div>

    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <input type="submit" role="button" name="save" value="حفظ" class="btn btn-add  w-md m-b-5">
    </div>
    <div class="form-group col-sm-5"></div>
    <?php echo form_close()?>
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
                                <th class="text-center">إسم العضو</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">التفاصيل</th>
                                <th class="text-center">الإجراء</th>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?> </td>
                                    <td><?php echo $record->name;?></td>
                                    <td><?php echo $record->address;?></td>
                                    <td><button class="btn btn-info w-md m-b-5 md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $record->id?>">التفاصيل</button></td>
                                    <td><a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                </tr>
                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف عضو </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('General_assembly/delete_member').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------>
                                <div class="md-modal md-effect-11" id="modal-<?php echo $record->id?>">
                                    <div class="md-content">
                                        <h3>تفاصيل العضو</h3>
                                        <div class="n-modal-body">
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> إسم العضو:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5>  <?php echo $record->name?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> العنوان:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><?php echo$record->address;?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> رقم الهاتف:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5> <?php echo$record->mobile;?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> تاريخ التعيين:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5><? echo $record->date_of_hiring; ?></h5>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-right:10px">
                                                <div class="col-sm-3">
                                                    <h5> الإيميل:</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <h5> <?php echo$record->email;?></h5>
                                                </div>
                                            </div>
                                            <!--                                            -->
                                            <button class="btn btn-add md-close">إغلاق!</button>
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

    <?php  endif; ?>






