<?php
$val = $_POST['valu'];
if(isset($val)){
    if (!empty($select_all_bydate[$val])):?>
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">تاريخ الجلسة</th>
                            <th class="text-center">بنود الجلسة/القرارات </th>
                            <th class="text-center">الأعضاء</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $a=1;
                            foreach ($select_all_bydate[$val] as $record ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo date('d-m-Y',$record->session_date) ?></td>
                                    <td><button type="button" class="btn btn-info w-md m-b-5 btn-xs"  data-toggle="modal" data-target="#detailsa<?php echo $record->id  ?>" > عرض </button></td>
                                    <td><button type="button" class="btn btn-add w-md m-b-5 btn-xs" data-toggle="modal" data-target="#detailsb<?php echo $record->id  ?>" > عرض</button>   </td>
                                    <td><button type="button" class="btn btn-success w-md m-b-5 btn-xs" data-toggle="modal" data-target="#detailsc<?php echo $record->id  ?>" > عرض</button>   </td>
                                </tr>
                                <?php
                                $a++;
                            endforeach;  ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

<?  }?>




<?php


if (!empty($select_all_bydate[$val])):
$a=1;foreach ($select_all_bydate[$val] as $record ):?>

    <div class="modal fade" id="detailsa<?php echo $record->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3><i class="fa fa-plus m-r-5"></i> بنود الجلسات</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-horizontal col-md-12">
                            <div class="panel panel-info">
                                <?php echo form_open_multipart('admin/Directors/follow_up/')?>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                        <thead>
                                        <tr>
                                            <th style="color:#0c72ca; ">رقم البند</th>
                                            <th style="color:#0c72ca; ">نص البند</th>
                                            <th style="color:#0c72ca; ">القرار</th>
                                            <th style="color:#0c72ca; ">حالة القرار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($decisions[$record->id])):
                                            foreach ($decisions[$record->id] as $row):
                                                $condition='';
                                                if($row->motab3a ==0){
                                                    $condition='جاري';
                                                }elseif ($row->motab3a ==1){
                                                    $condition='تم التنفيذ';
                                                }elseif ($row->motab3a ==2){
                                                    $condition='لم يتم التنفيذ';
                                                }
                                                ?>
                                                <tr>
                                                    <td><?echo$row->item_num;?></td>
                                                    <td><?echo$row->item_title;?></td>
                                                    <td><?echo$row->decision_title;?></td>
                                                    <td><?echo$condition;?></td>
                                                </tr>
                                            <?php  endforeach;endif;?>
                                        <?php echo form_close()?>
                                        </tbody>
                                    </table>
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




    <div class="modal fade" id="detailsb<?php echo $record->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3><i class="fa fa-plus m-r-5"></i> الأعضاء</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-horizontal col-md-12">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                        <thead>
                                        <tr>
                                            <th style="color:#0c72ca; ">م</th>
                                            <th style="color:#0c72ca; ">إسم العضو</th>
                                            <th style="color:#0c72ca; ">المسمي الوظيفي</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(!empty($all_members[$record->id])):
                                            $a=1;
                                            foreach ($all_members[$record->id] as $row):
                                                ?>
                                                <tr>

                                                    <td><?php  echo $a ;?></td>
                                                    <td> <?php echo $get_job_title[$row->members_nums]->member_name?></td>
                                                    <td> <?php echo $job_title[$get_job_title[$row->members_nums]->job_title_id_fk]->name?></td>
                                                </tr>
                                                <?php  $a++;  endforeach; endif;?>
                                        </tbody>
                                    </table>
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


    <div class="modal fade" id="detailsc<?php echo $record->id  ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog"  style="width: 655px;">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3><i class="fa fa-plus m-r-5"></i> الإجراء</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-horizontal col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer">
                                        <thead>
                                        <tr>
                                            <th style="color:#0c72ca; ">رقم البند</th>
                                            <th style="color:#0c72ca; ">نص البند</th>
                                            <th style="color:#0c72ca; ">القرار</th>
                                            <th style="color:#0c72ca; ">حالة القرار</th>
                                            <th style="color:#0c72ca; ">الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($decisions[$record->id])):
                                            foreach ($decisions[$record->id] as $row):
                                                $condition='';
                                                if($row->motab3a ==0){
                                                    $condition='جاري';
                                                }elseif ($row->motab3a ==1){
                                                    $condition='تم التنفيذ';
                                                }elseif ($row->motab3a ==2){
                                                    $condition='لم يتم التنفيذ';
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $row->item_num;?></td>
                                                    <td><?php echo $row->item_title;?></td>
                                                    <td><?php echo $row->decision_title;?></td>
                                                    <td><?php echo $condition;?></td>
                                                    <td>
                                                        <a href="<?php echo base_url()."admin/Directors/update_motab3a_state/".$row->id."/0" ?>">
                                                            <button type="button"   style="" class="btn btn-success  btn-xs">جاري  </button> </a>
                                                        <a href="<?php echo base_url()."admin/Directors/update_motab3a_state/".$row->id."/1" ?>">
                                                            <button type="button" style="" class="btn btn-warning   btn-xs">تم التنفيذ  </button> </a>
                                                        <a href="<?php echo base_url()."admin/Directors/update_motab3a_state/".$row->id."/2" ?>">
                                                            <button type="button" style=""  class="btn btn-danger  btn-xs">لم يتم التنفيذ  </button> </a>
                                                    </td>
                                                </tr>
                                            <?php  endforeach;endif;?>
                                        </tbody>
                                    </table>
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
<?php endforeach; endif;?>

