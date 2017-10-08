




<!------------------------------------------------>
<?php if(isset($results)):?>
    <?php echo form_open_multipart('admin/Directors/update_magls/'.$results['id'],array('class'=>"",'role'=>"form" )); ?>
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> تعديل عضو</h3>
            </div>
            <div class="panel-body">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">اختر كود المجلس</label>
                    <select class="choose-date selectpicker form-control half"  name="council_id_fk" data-show-subtext="true" data-live-search="true">
                        <?php foreach ($magls as $mag): ?>
                            <?php
                            $selected='';
                            if($results['council_id_fk']== $mag->id){
                                $selected='selected';
                            }?>
                            <option value="<?php echo $mag->id ?>" <?php echo $selected ?> ><?php echo $mag->id ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم العضو </label>
                    <input type="text" class="form-control half input-style" name="member_name" value="<?php echo $results['member_name'] ?>"  readonly/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم العضو </label>
                    <input type="text" class="form-control half input-style" name="member_code" value="<?php echo $results['member_code'] ?>"  readonly/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> اختر وظيفة العضو</label>
                    <select class="choose-date selectpicker form-control half"  name="job_title_id_fk" data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($job_title as $job): ?>
                            <?php
                            $selected='';
                            if($results['job_title_id_fk']== $job->id){
                                $selected='selected';
                            }?>
                            <option value="<?php echo $job->id ?>" <?php echo $selected ?> ><?php echo $job->name ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ التعيين</label>
                    <input type="text"  name="appointment_date" class=" some_class_2 form-control half input-style"  value="<?php echo date('m/d/Y',$results['appointment_date']) ?>" placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> اختر نوع العضوية</label>
                    <select class="choose-date selectpicker form-control half"  name="member_type_id_fk" data-show-subtext="true" data-live-search="true">
            <?php if($results['member_type_id_fk']==1): ?>
                                            <option value="1" selected> دائم </option>
                                            <option value="2"> غير دائم </option>
                                            <option value="3"> رجل اعمال </option>
                                            <option value="4"> عضوية نسائية </option>
                                            <?php elseif($results['member_type_id_fk']==2): ?>
                                                <option value="1"> دائم </option>
                                                <option value="2"selected> غير دائم </option>
                                                <option value="3"> رجل اعمال </option>
                                                <option value="4"> عضوية نسائية </option>
                                            <?php elseif($results['member_type_id_fk']==3): ?>
                                                <option value="1"> دائم </option>
                                                <option value="2"> غير دائم </option>
                                                <option value="3"selected> رجل اعمال </option>
                                                <option value="4"> عضوية نسائية </option>
                                            <?php else: ?>
                                                <option value="1"> دائم </option>
                                                <option value="2"> غير دائم </option>
                                                <option value="3"> رجل اعمال </option>
                                                <option value="4"selected> عضوية نسائية </option>
                                <?php endif; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ الانتهاء</label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="expiration_date"  value="<?php echo date('m/d/Y',$results['expiration_date']) ?>" placeholder="/ شهر/يوم /سنة"  id="some_class_1">
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
                <h3 class="panel-title">إضافة عضو</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('admin/Directors/add_magls',array('class'=>"",'role'=>"form" ))?>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">اختر كود المجلس</label>
                    <select class="choose-date selectpicker form-control half"  name="council_id_fk" data-show-subtext="true" data-live-search="true">
                        <option>-اختر-</option>
                        <?php foreach ($magls as $mag): ?>
                            <option value="<?php echo $mag->id ?>" ><?php echo $mag->id ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم العضو </label>
                    <input type="text" class="form-control half input-style" name="member_name" />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم العضو </label>
                    <input type="text" class="form-control half input-style" name="member_code" value="<?php echo ($last_member+1)?>"  readonly/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> اختر وظيفة العضو</label>
                    <select class="choose-date selectpicker form-control half"  name="job_title_id_fk" data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <?php foreach ($job_title as $job): ?>
                            <option value="<?php echo $job->id ?>" ><?php echo $job->name ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ التعيين</label>
                    <input type="text"  name="appointment_date" class=" some_class_2 form-control half input-style"  placeholder="/ شهر/يوم /سنة"  id="some_class_1">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> اختر نوع العضوية</label>
                    <select class="choose-date selectpicker form-control half"  name="member_type_id_fk" data-show-subtext="true" data-live-search="true">
                        <option> - اختر - </option>
                        <option value="1"> دائم </option>
                        <option value="2"> غير دائم </option>
                        <option value="3"> رجل اعمال </option>
                        <option value="4"> عضوية نسائية </option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ الانتهاء</label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="expiration_date"   placeholder="/ شهر/يوم /سنة"  id="some_class_1">
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

    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">

                <div class="">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab3" data-toggle="tab">المجلس الحالي </a></li>
                        <li><a href="#tab4" data-toggle="tab">المجالس الأخري</a></li>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab3">
                            <?php if(isset($on_magls)&&$on_magls!=null):?>
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th class="text-center">كود العضوية</th>
                                        <th class="text-center">أسم العضو </th>
                                        <th class="text-center">تاريخ التعيين</th>
                                        <th class="text-center">تاريخ الانتهاء </th>
                                        <th class="text-center">الاجراء</th>
                                        <th class="text-center">الحالة</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php $a=1; foreach ($on_magls as $key=>$value):
                                        foreach ($value as $record):
                                            if($record->expired_date < time()){
                                                $state='danger';
                                                $title='عضوية منتهية';
                                            }elseif($record->expired_date > time()){
                                                $state='primary';
                                                $title='عضوية سارية';
                                            }?>

                                            <tr>
                                                <td><?php echo $a ?></td>
                                                <td><?php echo $record->member_code ?></td>
                                                <td><?php echo $record->member_name ?></td>
                                                <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
                                                <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
                                                <td> <a href="<?php echo base_url('admin/Directors/update_magls').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                                    <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                                <td>
                                                <td>
                                                    <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
                                                </td>
                                            </tr>
                                            <!------------------------>
                                            <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h1 class="modal-title">حذف مجلس حالي </h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>هل تريد حذف العنصر !
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                            <a href="<?php echo base_url('admin/Directors/delete_magls').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!------------------------>

                                            <?php $a++;  endforeach; endforeach; ?>

                                    </tbody>
                                </table>                            <?php else: ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>  لم يتم اضافة اعضاء للمجاس الحالى</strong>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="tab4">
                            <div class="panel-body">
                                <?php if(isset($off_magls)&&$off_magls!=null):?>
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                        <tbody class="text-center">
                                        <?php $a=1; foreach ($off_magls as $key=>$value):?>
                                            <tr> <td colspan="2">كود المجلس :</td>
                                                <td colspan="1"><?php echo $all_magls[$key]->id?></td>
                                                <td colspan="2">رقم قرار التعين : </td>
                                                <td colspan="2"><?php echo $all_magls[$key]->appointment_decison_number?></td>
                                            </tr>

                                            <tr class="info">
                                                <th class="text-center">م</th>
                                                <th class="text-center">كود العضوية</th>
                                                <th class="text-center">أسم العضو </th>
                                                <th class="text-center">تاريخ التعيين</th>
                                                <th class="text-center">تاريخ الانتهاء </th>
                                                <th class="text-center">الاجراء</th>
                                                <th class="text-center">الحالة</th>
                                            </tr>

                                            <?php foreach ($value as $record): if($record->expired_date < time()){
                                                $state='danger';
                                                $title='عضوية منتهية';
                                            }elseif($record->expired_date > time()){
                                                $state='primary';
                                                $title='عضوية سارية';
                                            }?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td><?php echo $record->member_code ?></td>
                                                    <td><?php echo $record->member_name ?></td>
                                                    <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
                                                    <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
                                                    <td> <a href="<?php echo base_url('admin/Directors/update_magls').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
                                                        <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modald<?php echo$record->id;?>"><i class="fa fa-trash-o"></i></button></a></td>
                                                    <td>
                                                        <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
                                                    </td>
                                                </tr>
                                                <!------------------------>
                                                <div class="modal fade modal-danger" id="modald<?php echo$record->id;?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h1 class="modal-title">حذف مجلس  </h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>هل تريد حذف العنصر !
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                                <a href="<?php echo base_url('admin/Directors/delete_magls').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!------------------------>
                                                <?php $a++;  endforeach; endforeach; ?>

                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong> لا يوجد اعضاء</strong>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <!----------------------input------------------->



    <?php endif; ?>


