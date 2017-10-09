<!--------------------------------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title"> </h3>
		</div>
		<div class="panel-body">
            <?php  echo form_open_multipart('finance_resource/edit_guaranty/'.$results[0]->id)?>
			<div class="form-group col-sm-6">
				<label class="label label-green  half"> كافل</label>
                <select  name="guarantee_id"  <?php echo $disabled; ?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php if (!empty($donors)):
                        foreach ($donors as $record):
                            $select='';
                            if($results[0]->guarantee_id == $record->id){
                                $select ='selected';
                            }

                            ?>
                            <option value="<? echo $record->id; ?>" <? echo $select;?>><? echo $record->user_name; ?></option>
                        <?php  endforeach; endif;?>
                </select>
			</div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> كافل</label>
                <select  name="guarantee_id"  <?php echo $disabled; ?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php if (!empty($donors)):
                        foreach ($donors as $record):
                            $select='';
                            if($results[0]->guarantee_id == $record->id){
                                $select ='selected';
                            }

                            ?>
                            <option value="<? echo $record->id; ?>" <? echo $select;?>><? echo $record->user_name; ?></option>
                        <?php  endforeach; endif;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> العدد</label>
                <select  name="number"  id="number" <? echo $disabled;?>  onclick="getprice()" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <? for($a=1;$a<=50;$a++):
                        $select='';
                        if($results[0]->number == $a){
                            $select='selected';
                        }
                        ?>
                        <option value="<? echo $a;?>" <? echo $select;?>><? echo $a;?></option>
                    <? endfor;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">  نوع الكفالة</label>
                <select  name="guaranty_type"   <? echo $disabled;?>  id="guaranty_type" onchange="search($('#guaranty_type').val());" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option  n value=""> إختر</option>
                    <?php if(!empty($guaranty_types)):
                        foreach ($guaranty_types as $record):
                            $select='';
                            if($results[0]->guaranty_type == $record->id){
                                $select='selected';
                            }?>
                            <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->title;?></option>
                        <?php  endforeach;endif;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> المدة</label>
                <select name="duration" id="duration" <? echo $disabled;?> onclick="checkduration()" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <? if($results[0]->duration ==2){?>
                        <option  selected value="2">مستمرة</option>
                        <option  value="1">محددة</option>
                    <?}elseif($results[0]->duration ==1){?>
                        <option  selected value="1">محددة</option>
                        <option value="2">مستمرة</option>
                    <?}?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> طريقة السداد</label>
                <select name="payment_method" <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php $arr =array('إختر','شهري','ثلاثة شهور','ستة شهور','سنوي','خمس سنوات','كامل المبلغ');
                    for ($d=0;$d <sizeof($arr);$d++):

                        $select='';
                        if($results[0]->payment_method == $d){
                            $select='selected';
                        }?>
                        <option value="<? echo $d;?>" <? echo $select;?>><? echo $arr[$d];?></option>
                    <?php  endfor;?>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label class="label label-green  half"> نهاية الكفالة</label>
                <input type="text" class=" some_class_2 form-control half input-style <? echo $class;?>" placeholder="شهر / يوم / سنة" name="guaranty_end"  value="<? echo date('m/d/Y',$results[0]->guaranty_end);?>"  <?echo $readonly;?> id="some_class_1">
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> بداية الكفالة</label>
                <input type="text" class=" some_class_2 form-control half input-style <? echo $class;?>" placeholder="شهر / يوم / سنة" name="guaranty_start"  value="<? echo date('m/d/Y',$results[0]->guaranty_start);?>"  <?echo $readonly;?> id="some_class_1">
            </div>

            <div class="form-group col-sm-6">
                <label class="label label-green  half">المبلغ الإجمالي</label>
                <input type="number" name="guaranty_amount_all" class="form-control half input-style" id="guaranty_amount_all" value="<? echo $results[0]->guaranty_amount_all;?>" readonly>
            </div>

            <div class="form-group col-sm-6">
                <label class="label label-green  half">المبلغ الشهري</label>
                <input type="number"  class="form-control half input-style" name="guaranty_amount" id="guaranty_amount" value="<? echo $get_data[0]->amount;?>" readonly>
            </div>

            <?php  if ($results[0]->sex_determination ==1):?>
                <div class="form-group col-sm-6"  id="gender">
                    <label class="label label-green  half"> الجنس</label>
                    <select name="gender" <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                        <?php if($results[0]->duration ==2){?>
                            <option   value="2" selected="">أنثي</option>
                            <option   value="1">ذكر</option>
                        <?php }elseif($results[0]->sex_determination ==1){?>
                            <option   value="1" selected="">ذكر</option>
                            <option value="2">أنثي</option>
                        <?php }?>
                    </select>
                </div>
            <?php endif;?>

            <div class="form-group col-sm-6"  >
                <label class="label label-green  half">  تحديد الجنس</label>
                <select name="sex_determination" id="sex_determination" <? echo $disabled;?>  onchange="checkgender()"class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php  if($results[0]->sex_determination ==2){?>
                        <option  selected value="2">لا</option>
                        <option value="1">نعم</option>
                    <?php }elseif($results[0]->sex_determination ==1){?>
                        <option  selected value="1">نعم</option>
                        <option value="2">لا</option>
                    <?php }?>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label class="label label-green  half">ملاحظات</label>
                <textarea class="form-control" name="guaranty_note" id="guaranty_note" readonly ><? echo $get_data[0]->description;?></textarea>
            </div>


            <div id="optionearea3"></div>

		</div>
	</div>
</div>
<div class="form-group col-sm-5"></div>
<div class="form-group col-sm-4">
    <a href="<?php echo base_url()?>finance_resource/all_guaranty">
        <button type="button" class="btn btn-add btn-info m-b-5"> عودة</button> </a>

    <?if($this->uri->segment(4) !='view'):?>
    <input type="submit" role="button" name="save" value="حفظ" class="btn btn-add btn-info m-b-5">
        <?php echo form_close()?>
    <?php elseif($this->uri->segment(4) =='view'):?>
        <button type="button" class="btn btn-primary m-r-2 m-b-5" data-toggle="modal" data-target="#modal-primary">تحويل</button>
        <!---------------------------1------------------>
        <?php echo form_open_multipart('finance_resource/operation/3/'.$this->uri->segment(2).'/'.$this->uri->segment(3));?>

        <div class="modal fade modal-primary" id="modal-primary" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 700px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title">تحويل</h1>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                        <div class="form-group col-sm-6">
                            <label class="label label-green  half">تحويل الى</label>
                            <select  name="guaranty_to"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                                <option >اختر</option>
                                <?php if(isset($convent) && $convent!=null):
                                    foreach($convent as $one): ?>
                                        <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                    <?php endforeach; endif?>
                            </select>
                        </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">ملاحظات</label>
                                <textarea class="form-control" name="reason" id="reason"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        <input type="submit" role="button" name="operation" value="تحويل" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close()?>
        <!-----------------------2---------------------->
        <button type="button" class="btn btn-primary m-r-2 m-b-5" data-toggle="modal" data-target="#modal-warning">تحويل أخر</button>
        <?php  echo form_open_multipart('finance_resource/operation/3/'.$this->uri->segment(2).'/'.$this->uri->segment(3))?>
        <div class="modal fade modal-warning" id="modal-warning" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title">تحويل أخر</h1>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">تحويل الى</label>
                                <select  name="guaranty_to"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                                    <option >اختر</option>
                                    <?php if(isset($convent) && $convent!=null):
                                        foreach($convent as $one): ?>
                                            <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                        <?php endforeach; endif?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">ملاحظات</label>
                                <textarea class="form-control" name="reason" id="reason"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        <input type="submit" role="button" name="operation" value="تحويل" class="btn btn-warning">
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------3------------------->
        <button type="button" class="btn btn-primary m-r-2 m-b-5" data-toggle="modal" data-target="#modal-success">قبول</button>
        <?php  echo form_open_multipart('finance_resource/operation/1/'.$this->uri->segment(2).'/'.$this->uri->segment(3))?>
        <div class="modal fade modal-success" id="modal-success" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title">قبول</h1>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">تحويل الى</label>
                                <select  name="guaranty_to"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                                    <option >اختر</option>
                                    <?php if(isset($convent) && $convent!=null):
                                        foreach($convent as $one): ?>
                                            <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                        <?php endforeach; endif?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">الأسباب</label>
                                <textarea class="form-control" name="reason" id="reason"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        <input type="submit" role="button" name="operation" value="قبول" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close()?>
        <!----------------------4----------------------->
        <button type="button" class="btn btn-primary m-r-2 m-b-5" data-toggle="modal" data-target="#modal-danger">رفض</button>
        <div class="modal fade modal-danger" id="modal-danger" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title">رفض</h1>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">تحويل الى</label>
                                <select  name="guaranty_to"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                                    <option >اختر</option>
                                    <?php if(isset($convent) && $convent!=null):
                                        foreach($convent as $one): ?>
                                            <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                        <?php endforeach; endif?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">الأسباب</label>
                                <textarea class="form-control" name="reason" id="reason"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        <input type="submit" role="button" name="operation" value="رفض" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------->
    <?php endif;?>
</div>
<?php echo form_close()?>
<div class="form-group col-sm-5"></div>

<!--------------------------------------------------------------------->
<?php if(isset($all_operation)&&$all_operation!=null):?>
    <div class="col-sm-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">

                    <h3 class="panel-title">الاجراءات المتخذة </h3>

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
                            <th class="text-center">من</th>
                            <th class="text-center"> الي</th>
                            <th class="text-center">الحالة </th>
                            <th class="text-center">التاريخ </th>
                            <th class="text-center">الوقت</th>
                            <th class="text-center">الاجراءات </th>
                            <th class="text-center"> ملاحظات </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php $count=1; foreach($all_operation as $row):?>
                            <tr>
                                <td><?php echo $count++?></td>
                                <td><?php echo  $jobs_name[$row->guaranty_from]->name?></td>
                                <td><?php echo  $jobs_name[$row->guaranty_to]->name?></td>
                                <td><?php if($row->process ==1){
                                        echo ' قبول ';
                                    }elseif($row->process ==2){
                                        echo 'رفض ';
                                    }elseif($row->process ==3){
                                        echo 'للإطلاع عند'.$jobs_name[$row->guaranty_to]->name;
                                    }?>
                                </td>
                                <td> <?php echo date("Y-m-d",$row->date);?></td>
                                <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                <td><?php if($row->process ==1){
                                        echo 'قبول';
                                    }elseif($row->process ==2){
                                        echo 'رفض';
                                    }elseif($row->process ==3){
                                        echo 'تحويل';
                                    }?>
                                </td>
                                <td><?php echo $row->reason ?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php  endif; ?>
<!--------------------------------------------------------------------->



<script>

	function getprice() {
		$('#guaranty_amount_all').val(0);
		if($("#guaranty_amount").val() !='') {
			var sum = (parseFloat($("#guaranty_amount").val())) * parseFloat($("#number").val());
			$('#guaranty_amount_all').val(sum);
		}
	}
	function checkduration() {
		var duration =$("#duration").val();
		if(duration ==2){
			$('#guaranty_end').hide();
		}else if(duration ==1){
			$('#guaranty_end').show();
		}
	}
	function checkgender() {

    	var gender =$("#sex_determination").val();
		if(gender ==1){
			$('#gender').show();
		}
	}
</script>

<!-------------------------------------->
<script>
	function search(valu)
	{
		if(valu)
		{
			var dataString = 'valu=' + valu;
			$.ajax({

				type:'post',
				url: '<?php echo base_url() ?>/Finance_resource/guaranty',
				data:dataString,
				dataType: 'html',
				cache:false,
				success: function(html){
					$('#optionearea3').html(html);
				}
			});
			return false;
		}
		else
		{
			$('#optionearea3').html('');
			return false;
		}

	}

</script>











