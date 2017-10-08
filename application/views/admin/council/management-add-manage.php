

<!------------------------------------------------>
<?php if(isset($results)):?>
    <?php echo form_open_multipart('admin/Directors/update_council/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل مجلس الإدارة</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">كود المجلس</label>
                    <input type="text" class="form-control half input-style" name=""   value="<?php echo $this->uri->segment(4); ?>"  readonly>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم قرار التعيين</label>
                    <input type="number" name="appointment_decison_number" class="form-control half input-style" value="<?php echo $results['appointment_decison_number'] ?>">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ التعيين</label>
                    <input type="text"  name="appointment_date" class=" some_class_2 form-control half input-style"  value="<?php echo date('m/d/Y',$results['appointment_date']) ?>" placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ الانتهاء</label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="expiration_date"  value="<?php echo date('m/d/Y',$results['expiration_date']) ?>" placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">صورة القرار</label>
                    <input type="file" name="decison_img" class="form-control half input-style" />
                </div>
                <div class="form-group col-sm-4">
                    <img src="<?php echo base_url('uploads/images').'/'.$results['decison_img'] ?>" width="100px" height="100px" />
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
                <h3 class="panel-title"> إضافة  مجلس الإدارة</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('admin/Directors/add_council',array('class'=>"",'role'=>"form" ))?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">كود المجلس</label>
                    <input type="text" class="form-control half input-style" name=""   value="<?php echo (++$last) ?>"  readonly>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم قرار التعيين</label>
                    <input type="number" name="appointment_decison_number" class="form-control half input-style" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ التعيين</label>
                    <input type="text"  name="appointment_date" class=" some_class_2 form-control half input-style"   placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ الانتهاء</label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="expiration_date"  placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">صورة القرار</label>
                    <input type="file" name="decison_img" class="form-control half input-style" />
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
                                <th class="text-center">رقم قرار التعيين </th>
                                <th class="text-center">تاريخ التعيين </th>
                                <th class="text-center">تاريخ الانتهاء </th>
                                <th class="text-center">الاجراء</th>
                                <th class="text-center">التفاصيل</th>
                                <th class="text-center">حالة </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $a=1;foreach ($records as $record ):
                                if($record->status == 1) {
                                    $class = 'manage-run';
                                    $title = 'نشط';
                                    $bt_class='success';
                                    $set=0;
                                }elseif($record->status == 0){
                                    $class = 'manage-work';
                                    $title = 'غير نشط';
                                    $bt_class='danger';
                                    $set=1;
                                }?>
                                <tr>
                                    <td><?php echo $a ?> </td>
                                    <td><?php echo $record->appointment_decison_number ?></td>
                                    <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
                                    <td><?php echo  date('d-m-Y',$record->expiration_date) ?></td>
                                    <td> <a href="<?php echo base_url('admin/Directors/update_council').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                    <td>
                                        <button type="button" class="btn btn-info w-md m-b-5 btn-xs"  data-toggle="modal" data-target="#details<?php echo $record->id  ?>" > التفاصيل </button>
                                    </td>
                                    <td>  <a href="<?php echo base_url().'admin/Directors/suspend_council/'.$record->id.'/'.$set?>">
                                            <button type="button" class="btn btn-<?php echo $bt_class?> btn-xs" style="width: 85px;"><?php echo $title ?></button>      </a></td>
                                </tr>
                                <!------------------------>


                                <div class="modal fade" id="details<?php echo $record->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog"  >
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-plus m-r-5"></i> التفاصيل</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-horizontal col-md-12">
                                                        <div class="panel panel-info">
                                                            <div class="panel-body">
                                                                <h4 class="pop-manage-h4"> جميع التفاصيل المتعلقة بالمجلس رقم <span class="pop-manage-span"> <?php echo $record->appointment_decison_number ?> </span></h4>
                                                                <h4 class="pop-manage-h4"> تاريخ أنشاء المجلس : <span class="pop-manage-span"> <?php echo  date('Y-m-d',$record->appointment_date) ?> </span></h4>
                                                                <h4 class="pop-manage-h4">تاريخ إنتهاء المجلس :<span class="pop-manage-span"><?php echo  date('Y-m-d',$record->expiration_date) ?> </span></h4>
                                                                <h4 class="pop-manage-h4">حالة المجلس الأن :<span class="pop-manage-span"><?php echo $title ?></span></h4>
                                                                <?php if(isset($get_members[$record->id]) && $get_members[$record->id]!=null){?>
                                                                <button type="button" style="margin-right: 60%;" class="btn btn-add w-md m-b-5 "  data-toggle="modal" data-target="#detailb<?php echo $record->id  ?>" > تفاصيل الأعضاء </button>

                                                            </div>
                                                                    </div>
                                                        <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                            </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                  <!---------------------------------------------- ------->
                            <?php if(isset($get_members[$record->id]) && $get_members[$record->id]!=null){?>
                                <div class="modal fade" id="detailb<?php echo $record->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog"  >
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-primary">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3><i class="fa fa-plus m-r-5"></i> الأعضاء</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-horizontal col-md-12">
                                                        <div class="panel panel-info">
                                                            <div class="panel-body">
                                                                <h4 class="pop-next-manage-h4">الاعضاء المقيدون بالمجلس</h4>
                                                                <?php $a=1; foreach($get_members[$record->id] as $row):?>
                                                                    <h4 class="pop-next-manage-h4"> <?php echo $a++?>- <?php echo $jobs[$row->job_title_id_fk]->name?> :
                                                                        <span class="pop-manage-span"><?php echo $row->member_name?></span>
                                                                    </h4>
                                                                <?php endforeach;?>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                            </div>
                                                </div>
                                            </div>

                                        </div>
                               <?php }?>
                                <!------------------------>

                                <!------------------------>
                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h1 class="modal-title">حذف مجلس الإدارة </h1>
                                            </div>
                                            <div class="modal-body">
                                                <p>هل تريد حذف العنصر !
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                <a href="<?php echo base_url('admin/Directors/delete_council').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
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









