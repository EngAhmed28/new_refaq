





<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-15 m-b-20">
                <div class="col-xs-3 p-0">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a  onclick="return go('current')" data-toggle="tab">الأذونات الواردة</a></li>
                        <li><a  onclick="return go(1)" data-toggle="tab">الأذونات الموافق عليها</a></li>
                        <li><a   onclick="return go(2)" data-toggle="tab">الأذونات المرفوضة</a></li>
                    </ul>
                </div>
                <div class="col-xs-9 p-0">
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <div class="tab-pane fade in  active" id="optionareav">

                                <table id="no-more-tables" style="width: 300px;margin-bottom: -22px" class="table table-bordered" role="table" >
                                    <thead>
                                    <tr>
                                        <th   class="text-right">الواردة</th>
                                        <th  class="text-right">الموافق عليها</th>
                                        <th   class="text-right">المرفوضة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td   class="text-center"><a href="#" onClick="return go(3);"><? if(!empty($select_all_by_type)): echo sizeof($select_all_by_type); else: echo 0; endif;?></a></td>
                                        <td   class="text-center"> <a href="#" onClick="return go(1);"><? if(!empty($select_all_by_type_acc)): echo sizeof($select_all_by_type_acc); else: echo 0; endif;?></a></td></th>
                                        <td  class="text-center"><a href="#" onClick="return go(2);"><? if(!empty($select_all_by_type_ref)): echo sizeof($select_all_by_type_ref); else: echo 0; endif;?></a></td>
                                    </tr>
                                    </tbody>
                                </table>


                        <br><br><br>
                            <?php if(isset($records) && $records!=null):?>
                            <div  id="optionearead">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th   class="text-center">رقم الإذن</th>
                                        <th  class="text-center">إسم الموظف</th>
                                        <th   class="text-center">وقت الخروج</th>
                                        <th   class="text-center">وقت العودة</th>
                                        <th   class="text-center">عدد الأذونات خلال الشهر</th>
                                        <th   class="text-center">التفاصيل</th>
                                        <th   class="text-center">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php  if(!empty($records)):
                                        foreach($records as $record):
                                            if(!empty($dates[$record->date])){
                                                if(sizeof($dates[$record->date])>0):
                                                    ?>
                                                    <tr>
                                                        <td colspan="4"  class="text-right">التاريخ</td>
                                                        <td  colspan="4" class="text-right"><? echo date('Y-m-d',$record->date);?></td>
                                                    </tr>
                                                    <?
                                                endif;
                                            }
                                            if(!empty($dates[$record->date])):
                                                foreach ($dates[$record->date] as $date):
                                                    ?>
                                                    <tr>
                                                        <td class="text-right">#</td>
                                                        <td class="text-right"><? echo $date->permit_num ;?></td>
                                                        <td class="text-right" ><? if(!empty($select[$date->emp_code])):echo $select[$date->emp_code][0]->employee ; endif;?></td>
                                                        <td class="text-right"><? echo $date->time_out ;?></td>
                                                        <td class="text-right"><? echo $date->time_return ;?></td>
                                                        <td class="text-center"><? if (!empty($select_all[$date->emp_code])): echo sizeof($select_all[$date->emp_code]); else: echo 0; endif;?></td>
                                                        <td class="text-right">
                                                            <button class="btn btn-info w-md m-b-5 md-trigger m-b-5 m-r-2 btn-xs" data-modal="modal-<?php echo $date->permit_num;?>">التفاصيل</button></td>
                                                        <td class="text-right">

                                                            <button type="button" class="btn btn-success m-r-2 m-b-5 btn-xs" data-toggle="modal" data-target="#modala<?php echo $date->permit_num; ?>">موافق</button>
                                                            <button type="button" class="btn btn-danger m-r-2 m-b-5 btn-xs" data-toggle="modal" data-target="#modalr<?php echo $date->permit_num; ?>">رفض</button>

                                                        </td>
                                                    </tr>
                                                <? endforeach;
                                            endif;?>
                                            <?
                                        endforeach;
                                    endif;?>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <!--------------------------------------popup---->
                                <?php if(isset($records)&&$records!=null):?>
                                    <?     if(!empty($records)):
                                        foreach($records as $record): ?>
                                            <?
                                            if(!empty($dates[$record->date])):
                                                foreach ($dates[$record->date] as $row):
                                                    $accept=0;
                                                    $ref=0;
                                                    if(!empty($select_last[$row->date])) {
                                                        foreach ($select_last[$row->date] as $num) {
                                                            if ($num->permit_status == 1) {
                                                                $accept++;
                                                            } elseif ($num->permit_status == 2) {
                                                                $ref++;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <!--------------------------------------------------------->

                                                    <!-- Modal success -->
                                                    <div class="modal fade modal-success" id="modala<?php echo $date->permit_num; ?>" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h1 class="modal-title">موافقة</h1>
                                                                </div>
                                                                <?php echo form_open_multipart('Administrative_affairs/suspendreports/')?>
                                                                <input type="hidden" name="id" value="<? echo $date->id;?>" >
                                                                <div class="modal-body">
                                                                    <textarea name="reason"  style="margin: 0px; width: 564px; height: 89px;" id="reason" cols="30"
                                                                              rows="10"></textarea>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn " data-dismiss="modal">إغلاق</button>
                                                                    <input  role="button"  type="submit"  name="accept" value="موافقة"  class="btn btn-success" >
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!----------------------->
                                                    <!-- Modal denger -->
                                                    <div class="modal fade modal-danger" id="modalr<?php echo $date->permit_num; ?>" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h1 class="modal-title">رفض</h1>
                                                                </div>
                                                                <?php echo form_open_multipart('Administrative_affairs/suspendreports/')?>
                                                                <input type="hidden" name="id" value="<? echo $date->id;?>" >
                                                                <div class="modal-body">
                                                                  <textarea name="reason"  style="margin: 0px; width: 564px; height: 89px;" id="reason" cols="30"
                                                                  rows="10"></textarea>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn " data-dismiss="modal">إغلاق</button>
                                                                    <input  style="margin-left: 70px;" type="submit"  name="refuse" value="رفض"  class="btn btn-danger" >
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <!------------------------------------------------>
                                                    <div class="md-modal md-effect-1" id="modal-<?php echo $date->permit_num;?>">
                                                        <div class="md-content">
                                                            <h3>تفاصيل الإذن</h3>
                                                            <div class="n-modal-body">
                                                                <table  class="table table-bordered">
                                                                    <tr>
                                                                        <th width="40%" class="text-right">الإسم</th>
                                                                        <th class="text-right"><? echo $select[$row->emp_code][0]->employee ; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40%" class="text-right">الإدارة</th>
                                                                        <th class="text-right"> <? if(!empty($job_title[$select[$date->emp_code][0]->department])): echo$job_title[$select[$date->emp_code][0]->administration][0]->name; endif;?>--<? if(!empty($job_title[$select[$date->emp_code][0]->department])): echo$job_title[$select[$date->emp_code][0]->department][0]->name; endif;?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40%" class="text-right">سبب الإذن</th>
                                                                        <th class="text-right"> <? echo $row->permit_reason;?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="40%" class="text-right">تاريخ أخر إذن</th>
                                                                        <th class="text-right"><? if(!empty($select_last[$row->date][0]->date)):
                                                                                echo date('Y-m-d',$select_last[$row->date][0]->date); else:
                                                                                echo 'لا توجد أذونات سابقة';endif; ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td rowspan="2">عدد الأذونات السابقة<label class="label-info" style="margin-right: 20px"><? if (!empty($select_last[$row->date])): echo sizeof($select_last[$row->date]); else: echo 0; endif;?></label></td>
                                                                        <td>الموافق عليها<span style="margin-right: 20px"><? echo $accept; ?></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> المرفوضة<span style="margin-right: 20px"><? echo $ref; ?></span></td>
                                                                    </tr>
                                                                </table>
                                                                <button class="btn btn-add md-close">Close me!</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!------------------------------------------>
                                                <? endforeach;
                                            endif;?>
                                            <?
                                        endforeach;
                                    endif;?>
                                <? endif;?>
                                <!-------------------------------------------------------->
                                <? endif;?>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<script>
function go(valu){
var dataString = 'type='+ valu;
  $.ajax({
        type:'post',
        url: '<?php echo base_url() ?>/Administrative_affairs/report',
        data:dataString,
        dataType: 'html',
        cache:false,
        success: function(html){
       $('#optionareav').html(html);
       }
       });
       return false;
     }
</script