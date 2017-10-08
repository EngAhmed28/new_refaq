<!--------------------------------------------------------------------->
<?php if(!isset($edit)):?>
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> تاريخ الجلسة</label>
                <input type="text"  name="session_date" value="<? echo  date('Y-m-d',$data['session_date']);?>" class=" some_class_2 form-control half input-style" placeholder="/ شهر/يوم /سنة"  readonly id="some_class_1">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> عدد الحضور</label>
                <input type="number"  readonly   class="form-control half input-style"   value="<?if(!empty($count_members[$data['council_id_fk']])): echo sizeof($count_members[$data['council_id_fk']]); endif;?>">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> عدد البنود</label>
                <input type="number"  readonly    class="form-control half input-style"   value="<?if(!empty($count[$data['council_id_fk']])): echo sizeof($count[$data['council_id_fk']]); endif;?>">
            </div>

            <button type="button" class="btn btn-info btn-rounded w-md m-b-5">الحضور</button>
            <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="width: 50%;margin-right: 160px">
                <thead><tr class="info">
                    <th >م</th>
                    <th >إسم العضو</th>
                    <th >المسمي الوظيفي</th>
                </tr></thead>
                <tbody>
                <?php if(!empty($all_members[$data['id']])):
                    $a=1;
                    foreach ($all_members[$data['id']] as $row):
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
<!--------------------------------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart('admin/Directors/add_decisions/'.$data['council_id_fk'])?>
            <?php if(!empty($details)):   ?>
                <input type="hidden" name="max" value="<?php echo sizeof($details);?>"/>
                <?php  $g=1; foreach($details as $records):
                    $type= $this->uri->segment(5);
                    $value='';
                    $readonly='readonly';
                    if($type =='edit'){
                        $value=$records->decision_title;
                        $readonly='';
                    }

                    if($records->decision_title != "null") {
                        $value=$records->decision_title;
                    }
                    ?>
                    <div class="form-group col-sm-4">
                <label class="label label-green  half"> رقم البند</label>
                <input type="text"  readonly   class="form-control half input-style"  value="<?php echo  $records->item_num;?>"  >
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> البند</label>
                <textarea class="form-control" name="" id="" <?php echo $readonly?> > <?php echo  $records->item_title; ?></textarea>
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half"> القرار عليه</label>
                <textarea class="form-control" name="decision_title_edit<?php echo $records->id;?>" id="decision_title_edit" > <?php echo$value; ?></textarea>
            </div>

            <input type="hidden" name="id<? echo $g; ?>" value="<? echo $records->id;?>"/>
            <?php $g++; endforeach;endif;?>
        </div>
    </div>
</div>
    <!----------------------input------------------->
    <div class="form-group col-sm-5"></div>
    <div class="form-group col-sm-4">
        <?php  if($type =='edit'){?>
        <input type="submit" role="button" name="update" value="تعديل" class="btn btn-add  w-md m-b-5">
        <?php }else{?>
            <input type="submit" role="button" name="add" value="حفظ" class="btn btn-add  w-md m-b-5">
        <?php }?>
    </div>
    <div class="form-group col-sm-5"></div>
    <?php echo form_close()?>
      <?php endif;?>


        <script>
            function lood(num){
                if(num>0 && num != '')
                {
                    var id = num;
                    var val = 'edit' ;
                    var dataString = 'band_num='+ id + '&val='+ val;
                    $.ajax({
                        type:'post',
                        url: '<?php echo base_url() ?>/admin/Directors/add_decisions/<? echo $data['council_id_fk']?>',
                        data:dataString,
                        dataType: 'html',
                        cache:false,
                        success: function(html){
                            $("#optionearea1").html(html);
                        }
                    });
                    return false;
                }
                else
                {
                    $("#vid_num").val('');
                    $("#optionearea1").html('');
                }
            }
        </script>

