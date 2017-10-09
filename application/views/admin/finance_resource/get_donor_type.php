<?php

if(isset($_POST['donors'])){
?>
                <?php if(isset($all_select) && $all_select!=null):?>
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
                            foreach ($all_select as $record):
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
                                    <td> <a href="<?php echo base_url('Finance_resource/edit_guaranty').'/'.$record->id?>"><button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button> </a>
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
                                                <a href="<?php echo base_url('Finance_resource/delete_guaranty').'/'.$record->id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------>
                                <?php $x++;endforeach;  ?>
                            </tbody>
                        </table>
                <?php  endif;?>

<? }?>
 <!-- first if-->

