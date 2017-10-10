<!--------------------------------------------------------------------->

<?php  echo form_open_multipart('finance_resource/guaranty')?>
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body ">
            <div class="form-group col-sm-6">
                <label class="label label-green  half">إسم الوقف</label>
                <input type="text" name="endowment_name" class="form-control half input-style" placeholder="إسم الوقف" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">نوع الوقف</label>
                <select   name="endowment_type"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php  $arr=array('إختر','فندق','صالة تجارية','ارض','عمارة','بيت','شقة','محلات تجارية');
                    for ($s=0;$s<sizeof($arr);$s++):?>
                        <option value="<?echo $s;?>"><? echo $arr[$s];?></option>
                    <?php endfor;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">بداية  إستقبال الوقف</label>
                <input type="text" name="endowment_start" class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة"  id="some_class_1">
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">إنتهاء تغطية الوقف</label>
                <input type="text" name="endowment_end" class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة"  id="some_class_1">
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">تكلفة الوقف</label>
                <input type="number" name="endowment_cost" id="endowment_cost" onkeyup="getprice()" class="form-control half input-style" placeholder="تكلفة الوقف" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">عدد الأسهم</label>
                <input type="number" name="stock_num" id="stock_num" onkeyup="getprice()" class="form-control half input-style" placeholder="عدد الأسهم" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">قيمة السهم</label>
                <input type="number" name="stock_cost" id="stock_cost" class="form-control half input-style" placeholder="قيمة السهم" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">مساحة الأرض </label>
                <input type="number" name="Land_area" class="form-control half input-style" placeholder="مساحة الأرض" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">رقم حساب الوقف</label>
                <input type="number" name="endowment_account_num" id="endowment_account_num" class="form-control half input-style" placeholder="رقم حساب الوقف" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">إسم البنك</label>
                <select   name="bank_id"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value=""> - اختر - </option>
                    <option value="1">البنك العربي مكرر </option>
                    <option value="2"> الرياض </option>
                    <option value="3"> مصرف راجحي </option>
                    <option value="4"> مصرف الانماء </option>
                    <option value="5"> بنك الجزيرة </option>
                    <option value="6"> بنك البلاد </option>
                    <option value="7"> السعودي الفرنسي </option>
                    <option value="8"> الاهلي التجاري</option>
                    <option value="9"> ساب </option>
                    <option value="10"> سامبا </option>
                    <option value="11"> السعودي البريطاني </option>
                    <option value="12"> السعودي الهولندي </option>
                    <option value="13"> السعودي الاستثمار </option>
                    <option value="14"> العربي الوطني</option>
                    <option value="15"> الجزيرة مكرر</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">عدد الشقق</label>
                <input type="number" name="houses_num" id="houses_num" class="form-control half input-style" placeholder="عدد الشقق" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">عدد المحلات التجارية</label>
                <input type="number" name="shops_num"  class="form-control half input-style" placeholder="عدد المحلات التجارية" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">الصالات التجارية</label>
                <input type="number" name="commercial_Lounges" id="commercial_Lounges"  class="form-control half input-style" placeholder="الصالات التجارية" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">مرافق أخري</label>
                <input type="number" name="other_facilities" id="other_facilities"  class="form-control half input-style" placeholder="مرافق أخري" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">عدد الطوابق</label>
                <input type="number" name="floor_num" id="floor_num"  class="form-control half input-style" placeholder="عدد الطوابق" >
            </div>
            <div class="form-group col-sm-6" >
                <label class="label label-green  half">المسئول عن الوقف</label>
                <input type="text" name="responsible_for_endowment" class="form-control half input-style" placeholder="المسئول عن الوقف" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">الموظف المسئول</label>
                <select   name="employee_in_charge"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php if(!empty($employee_in_charge)):
                        foreach ($employee_in_charge as $record):?>
                            <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                        <?php endforeach; endif;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> إسم المدينة</label>
                <select   name="city"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php	foreach($main_depart as $record){
                        echo '<option value="'.$record->id.'" >'.$record->main_dep_name.'</option>';
                    } ?>
                </select>
            </div>

            <div class="form-group col-sm-6" >
                <label class="label label-green  half">ملاحظات</label>
                <textarea class="form-control" name="notes"></textarea>
            </div>

            <div class="form-group col-sm-6" >
                <label class="label label-green  half">العنوان</label>
                <textarea class="form-control" name="address"></textarea>
            </div>
            <div class="form-group col-sm-6" >
                <label class="label label-green  half">جوال المسئول</label>
                <input type="number" name="employee_mobile" id="employee_mobile" class="form-control half input-style" placeholder="جوال المسئول" >
            </div>

        </div>
    </div>
</div>

<!----------------------input------------------->
<div class="form-group col-sm-5"></div>
<div class="form-group col-sm-4">
    <a href="<?php echo base_url()."Finance_resource/all_endowments"?>">  <button type="button" class="btn btn-add  m-b-5"> عودة</button></a>
    <input type="submit" role="button" name="save" value="حفظ" class="btn btn-add  m-b-5">
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









