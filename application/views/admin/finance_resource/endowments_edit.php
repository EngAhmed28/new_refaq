<!--------------------------------------------------------------------->
<!--------------------------------------------------------------------->

<?php  echo form_open_multipart('finance_resource/edit_endowments/'.$results[0]->id)?>
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title">تعديل وقف</h3>
		</div>
		<div class="panel-body ">
			<div class="form-group col-sm-6">
				<label class="label label-green  half">إسم الوقف</label>
				<input type="text" name="endowment_name" class="form-control half input-style"  value="<? echo $results[0]->endowment_name;?>" <? echo $readonly;?> placeholder="إسم الوقف" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">نوع الوقف</label>
				<select   name="endowment_type"   <? echo $disabled;?>  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php  $arr=array('إختر','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
                    for ($s=0;$s<sizeof($arr);$s++):
                        $select='';
                        if($results[0]->endowment_type ==$s){
                            $select ='selected';
                        }?>
                        <option value="<?echo $s;?>" <? echo $select;?>><? echo $arr[$s];?></option>
                    <?php endfor;?>
				</select>
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">بداية  إستقبال الوقف</label>
				<input type="text" name="endowment_start"  class=" some_class_2 form-control half input-style <? echo $class;?>"  value="<? echo date('m/d/Y',$results[0]->endowment_start);?>" <? echo $readonly;?> placeholder="شهر / يوم / سنة"  id="some_class_1">
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">إنتهاء تغطية الوقف</label>
				<input type="text" name="endowment_end"  <? echo $readonly;?>  value="<? echo date('m/d/Y',$results[0]->endowment_end);?>" class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة"  id="some_class_1">
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">تكلفة الوقف</label>
				<input type="number" name="endowment_cost" id="endowment_cost" value="<? echo $results[0]->endowment_cost;?>" onkeyup="getprice()" <? echo $readonly;?> class="form-control half input-style" placeholder="تكلفة الوقف" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">عدد الأسهم</label>
				<input type="number" name="stock_num"  <? echo $readonly;?> id="stock_num" onkeyup="getprice()" value="<? echo $results[0]->stock_num;?>" class="form-control half input-style" placeholder="عدد الأسهم" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">قيمة السهم</label>
				<input type="number" name="stock_cost" id="stock_cost" class="form-control half input-style"   value="<? echo $results[0]->stock_cost;?>" <? echo $readonly;?> placeholder="قيمة السهم" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">مساحة الأرض </label>
				<input type="number" name="Land_area"   <? echo $readonly;?> class="form-control half input-style" value="<? echo $results[0]->Land_area;?>" placeholder="مساحة الأرض" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">رقم حساب الوقف</label>
				<input type="number" name="endowment_account_num"  value="<? echo $results[0]->endowment_account_num;?>" <? echo $readonly;?> id="endowment_account_num" class="form-control half input-style"  placeholder="رقم حساب الوقف" >
			</div>
			<div class="form-group col-sm-6">
                <?php $banks=array('- اختر - ','البنك العربي مكرر ','الرياض',
                    'مصرف راجحي ','مصرف الانماء',' بنك الجزيرة',
                    'بنك البلاد','السعودي الفرنسي','الاهلي التجاري','ساب','سامبا',
                    ' السعودي البريطاني','السعودي الهولندي',
                    "السعودي الاستثمار",'العربي الوطني','الجزيرة مكرر');?>
				<label class="label label-green  half">إسم البنك</label>
				<select   name="bank_id"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php for($x=0;$x<sizeof($banks);$x++):
                        $selected=''; if($x==$results[0]->bank_id){$selected="selected";} ?>
                        <option value="<?php echo $x?>" <?php echo $selected?> > <?php echo $banks[$x];?> </option>
                    <?php  endfor?>
				</select>
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">عدد الشقق</label>
				<input type="number" name="houses_num" id="houses_num" class="form-control half input-style" value="<? echo $results[0]->houses_num;?>" <? echo $readonly;?>  placeholder="عدد الشقق" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">عدد المحلات التجارية</label>
				<input type="number"  <? echo $readonly;?> value="<? echo $results[0]->shops_num;?>" name="shops_num"  class="form-control half input-style" placeholder="عدد المحلات التجارية" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">الصالات التجارية</label>
				<input type="number" name="commercial_Lounges" id="commercial_Lounges" value="<? echo $results[0]->commercial_Lounges;?>" <? echo $readonly;?>  class="form-control half input-style" placeholder="الصالات التجارية" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">مرافق أخري</label>
				<input type="number" name="other_facilities" id="other_facilities" value="<? echo $results[0]->other_facilities;?>" <? echo $readonly;?> class="form-control half input-style" placeholder="مرافق أخري" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">عدد الطوابق</label>
				<input type="number" name="floor_num" id="floor_num"   value="<? echo $results[0]->floor_num;?>" <? echo $readonly;?> class="form-control half input-style" placeholder="عدد الطوابق" >
			</div>
			<div class="form-group col-sm-6" >
				<label class="label label-green  half">المسئول عن الوقف</label>
				<input type="text" name="responsible_for_endowment" value="<? echo $results[0]->responsible_for_endowment;?>" <? echo $readonly;?> class="form-control half input-style" placeholder="المسئول عن الوقف" >
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half">الموظف المسئول</label>
				<select   name="employee_in_charge"  <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php if(!empty($employee_in_charge)):
                        foreach ($employee_in_charge as $record):
                            $select='';
                            if($results[0]->employee_in_charge ==$record->id){
                                $select ='selected';
                            }?>
                            <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->name;?></option>
                        <?php endforeach; endif;?>
				</select>
			</div>
			<div class="form-group col-sm-6">
				<label class="label label-green  half"> إسم المدينة</label>
				<select   name="city"   <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php	foreach($main_depart as $record){
                        $select='';
                        if($results[0]->city ==$record->id){
                            $select ='selected';
                        }
                        echo '<option value="'.$record->id.'" '.$select.' >'.$record->main_dep_name.'</option>';
                    } ?>
				</select>
			</div>

			<div class="form-group col-sm-6" >
				<label class="label label-green  half">ملاحظات</label>
				<textarea class="form-control" name="notes" <? echo $readonly;?>><? echo $results[0]->notes;?></textarea>
			</div>

			<div class="form-group col-sm-6" >
				<label class="label label-green  half">العنوان</label>
				<textarea class="form-control" name="address" <? echo $readonly;?>><? echo $results[0]->address;?></textarea>
			</div>
			<div class="form-group col-sm-6" >
				<label class="label label-green  half">جوال المسئول</label>
				<input type="number" name="employee_mobile" id="employee_mobile" value="<? echo $results[0]->employee_mobile;?>" <? echo $readonly;?> class="form-control half input-style" placeholder="جوال المسئول" >
			</div>

		</div>
	</div>
</div>

<!----------------------input------------------->
<div class="form-group col-sm-5"></div>
<div class="form-group col-sm-4">
	<a href="<?php echo base_url()."Finance_resource/all_endowments"?>">  <button type="button" class="btn btn-add  m-b-5"> عودة</button></a>
    <?php if($this->uri->segment(4) !='view'):?>
	<input type="submit" role="button" name="save" value="تعديل" class="btn btn-add  m-b-5">
    <? endif;?>
</div>
<div class="form-group col-sm-5"></div>
<?php echo form_close()?>
<!----------------------input------------------->

<script>
	function getprice() {
		$('#stock_cost').val(0);
		if($("#guaranty_amount").val() !='') {
			var sum = (parseFloat($("#endowment_cost").val())) / parseFloat($("#stock_num").val());
			$('#stock_cost').val(sum);
		}
	}
</script>








<script>
	function getprice() {
		$('#stock_cost').val(0);
		if($("#guaranty_amount").val() !='') {
			var sum = (parseFloat($("#endowment_cost").val())) / parseFloat($("#stock_num").val());
			$('#stock_cost').val(sum);
		}
	}
</script>









