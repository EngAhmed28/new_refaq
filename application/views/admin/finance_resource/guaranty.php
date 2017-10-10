<!------------------------------------------------------>
<?php  echo form_open_multipart('finance_resource/guaranty')?>
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">كافل</label>
                <select    name="guarantee_id" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php if (!empty($donors)):
                        foreach ($donors as $record):?>
                            <option value="<? echo $record->id; ?>"><? echo $record->user_name; ?></option>
                        <?php  endforeach; endif;?>
                </select>
            </div>
        </div>
        <div class="panel-body ">
            <div class="form-group col-sm-6">
                <label class="label label-green  half">نوع الكفالة</label>
                <select   name="guaranty_type" id="guaranty_type" onchange="search($('#guaranty_type').val());" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option  n value=""> إختر</option>
                    <?php if(!empty($guaranty_types)):
                        foreach ($guaranty_types as $record):?>
                            <option value="<? echo $record->id;?>"><? echo $record->title;?></option>
                        <?php  endforeach;endif;?>
                </select>
            </div>
            
            <div class="form-group col-sm-6">
                <label class="label label-green  half">العدد</label>
                <select   name="number"  id="number"  onclick="getprice()" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <? for($a=1;$a<=50;$a++):?>
                        <option value="<? echo $a;?>"><? echo $a;?></option>
                    <? endfor;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">طريقة السداد</label>
                <select    name="payment_method"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php $arr =array('إختر','شهري','ثلاثة شهور','ستة شهور','سنوي','خمس سنوات','كامل المبلغ');
                    for ($d=0;$d <sizeof($arr);$d++):?>
                        <option value="<? echo $d;?>"><? echo $arr[$d];?></option>
                    <?php  endfor;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">المدة</label>
                <select    name="duration" id="duration" onclick="checkduration()" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <option value="1">محددة</option>
                    <option value="2">مستمرة</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">بداية الكفالة</label>
                <input type="text"  name="guaranty_start" class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة" required="" id="some_class_1">
            </div>

            <div class="form-group col-sm-6">
                <label class="label label-green  half"> نهاية الكفالة</label>
                <input type="text"  name="guaranty_end" class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">المبلغ الشهري</label>
                <input type="number" name="guaranty_amount" id="guaranty_amount" class="form-control half input-style" placeholder="المبلغ الشهري" >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">المبلغ الإجمالي</label>
                <input type="number" name="guaranty_amount_all" id="guaranty_amount_all" class="form-control half input-style" placeholder="المبلغ الإجمالي" >
            </div>

            <div class="form-group col-sm-6">
                <label class="label label-green  half">تحديد الجنس</label>
                <select    id="sex_determination" onchange="checkgender()" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="2">لا</option>
                    <option value="1">نعم</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">ملاحظات</label>
                <textarea class="form-control" name="guaranty_note" id="guaranty_note" ></textarea>
            </div>
            <div class="form-group col-sm-6" id="gender" style="display:none">
                <label class="label label-green  half">الجنس</label>
                <select    name="gender"   class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="1">ذكر</option>
                    <option value="2">أنثي</option>
                </select>
            </div>
            <div id="optionearea3"></div>

        </div>
    </div>
</div>

<!----------------------input------------------->
<div class="form-group col-sm-5"></div>
<div class="form-group col-sm-4">
    <a href="<?php echo base_url()."Finance_resource/all_guaranty"?>">  <button type="button" class="btn btn-add  m-b-5"> عودة</button></a>
    <input type="submit" role="button" name="save" value="حفظ" class="btn btn-add  m-b-5">
</div>
<div class="form-group col-sm-5"></div>
<?php echo form_close()?>
<!----------------------input------------------->

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
		}if(gender ==2){
		  $('#gender').hide();
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











