

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">إعتماد طلبات السلف</h3>
        </div>
        <div class="panel-body">

            <div class="">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab3" data-toggle="tab">طلبات السلف الوارده </a></li>
                    <li><a href="#tab4" data-toggle="tab">طلبات السلف المقبوله</a></li>
                    <li><a href="#tab5" data-toggle="tab">طلبات السلف المرفوضه</a></li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab3">
                        <?php if(isset($depts_recived)&& $depts_recived!=null && !empty($depts_recived)):?>
                            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th class="text-center">اسم الموظف</th>
                                    <th  class="text-center">تاريخ السلفة </th>
                                    <th class="text-center">قيمة السلفة</th>
                                    <th  class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a=1;foreach ($depts_recived as $record ):?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td ><?php echo $record->emp_name ?></td>
                                        <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
                                        <td ><?php echo $record->value?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#accept-<?php echo $record->debt_id?>" title="موافق">
                                                <button type="button" class="btn btn-success btn-circle m-b-5"><i class="glyphicon glyphicon-ok"></i></button> </a>
                                            <a href="#" data-toggle="modal" data-target="#refus<?php echo $record->debt_id?>" title="مرفوض">
                                                <button type="button" class="btn btn-danger btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></button> </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $a++;
                                endforeach;  ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-danger" > لايوجد طلبات وارده </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="tab4">
                        <div class="panel-body">
                            <?php if(isset($depts_accept)&& $depts_accept!=null && !empty($depts_accept)):?>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th class="text-center">اسم الموظف</th>
                                        <th  class="text-center">تاريخ السلفة </th>
                                        <th class="text-center">قيمة السلفة</th>
                                        <th  class="text-center">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;
                                    foreach ($depts_accept as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td ><?php echo $record->emp_name ?></td>
                                            <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
                                            <td ><?php echo $record->value?></td>
                                            <td>
                                                <a href="<?php  echo base_url().'Administrative_affairs/DoDebtsApproved/'.$record->debt_id.'/0'?>" title="تحويل">
                                                    <button type="button" class="btn btn-purple btn-circle m-b-5"><i class="glyphicon glyphicon-repeat"></i></button> </a>
                                                <a href="#" data-toggle="modal" data-target="#refus<?php echo $record->debt_id?>" title="مرفوض">
                                                    <button type="button" class="btn btn-danger btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php $a++; endforeach;  ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="alert alert-danger" >لايوجد طلبات وارده</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab5">
                        <div class="panel-body">
                            <?php if(isset($depts_refuse)&& $depts_refuse!=null && !empty($depts_refuse)):?>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>م</th>
                                        <th class="text-center">اسم الموظف</th>
                                        <th  class="text-center">تاريخ السلفة </th>
                                        <th class="text-center">قيمة السلفة</th>
                                        <th  class="text-center">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;
                                    foreach ($depts_refuse as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo $a ?></td>
                                            <td ><?php echo $record->emp_name ?></td>
                                            <td ><?php echo date("Y-m-d",$record->debt_date)  ?></td>
                                            <td ><?php echo $record->value?></td>
                                            <td>
                                                <a href="#"  data-toggle="modal" data-target="#accept<?php echo $record->debt_id?>" title="موافق">
                                                    <button type="button" class="btn btn-success btn-circle m-b-5"><i class="glyphicon glyphicon-ok"></i></button> </a>
                                                <a href="<?php  echo base_url().'Administrative_affairs/DoDebtsApproved/'.$record->debt_id.'/0'?>"title="تحويل">
                                                    <button type="button" class="btn btn-purple btn-circle m-b-5"><i class="glyphicon glyphicon-repeat"></i></button> </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $a++;
                                    endforeach;  ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="alert alert-danger" > لايوجد طلبات وارده  </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-------------->
<?php foreach($all_debts as $row):?>
<div id="accept-<?php echo $row->debt_id?>" class="modal fade modal-success" id="modal-success" tabindex="-1" role="dialog">
    <?php echo form_open_multipart('Administrative_affairs/DoDebtsApproved/'.$row->debt_id.'/1')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="modal-title">قبول الطلب</h1>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-xs-3">
                            <label > الاسباب  </label>
                        </div>
                        <div class="col-xs-9">
                            <textarea name="reason" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    <input  role="button" class="btn btn-success" name="operation" type="submit" value=" قبول الطلب" />
                </div>
            </div>
        </div>
    </div>

</div>
<?php  echo form_close()?>
</div>

<div id="refus<?php echo $row->debt_id?>" class="modal fade modal-danger" id="modal-danger" tabindex="-1" role="dialog">
    <?php echo form_open_multipart('Administrative_affairs/DoDebtsApproved/'.$row->debt_id.'/2')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="modal-title">رفض الطلب</h1>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-xs-3">
                            <label > الاسباب  </label>
                        </div>
                        <div class="col-xs-9">
                            <textarea name="reason" class="form-control"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    <input  role="button" class="btn btn-danger" name="operation" type="submit" value=" رفض الطلب" />
                </div>
            </div>
        </div>
    </div>

    <?php  echo form_close()?>
</div>
<?php  endforeach?>




