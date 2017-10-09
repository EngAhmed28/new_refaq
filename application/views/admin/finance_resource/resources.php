

<!------------------------------------------------>
<?php  echo form_open_multipart('finance_resource/donors')?>
	<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
		<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
			<div class="panel-heading">
				<h3 class="panel-title"></h3>
			</div>
			<div class="panel-body">
				<div class="form-group col-sm-4">
					<label class="label label-green  half">نوع المتبرع</label>
					<select  id="r-moasasa"  name="donor_type" onchange="as($('#r-moasasa').val());" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option>إختر </option>
						<option value="1">فردي</option>
						<option value="2"> مؤسسة</option>
                  </select>
				</div>
			</div>
			<div class="panel-body r-farde">
				<div class="form-group col-sm-6">
					<label class="label label-green  half">اسم المستخدم</label>
					<input type="text" name="person_name" class="form-control half input-style" placeholder="اسم المستخدم" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">تاريخ الكفالة</label>
					<input type="text"  name="guaranty_date"class=" some_class_2 form-control half input-style" placeholder="شهر / يوم / سنة"  id="some_class_1">
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">كلمة المرور</label>
					<input type="password" name="person_n" class="form-control half input-style" placeholder="كلمة المرور" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> تأكيد  كلمة المرور</label>
					<input type="password" name="person_n" class="form-control half input-style" placeholder="كلمة المرور" onkeyup="return valid_chik_one();" >
					<span  id="validate_one" class="help-block"></span>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">صفه الفرد</label>
					<input type="text" name="character_person" class="form-control half input-style" placeholder="صفه الفرد" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">حالة الكافل</label>
					<select    name="guaranty_status"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="" > - اختر - </option>
						<option value="1">علي قيد الحياه</option>
						<option value="0"> متوفي </option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">وسيط الكفالة</label>
					<div class="panel panel-default">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							<div class="panel-heading">
								<h4 class="panel-title">
									<i class="indicator glyphicon glyphicon-chevron-down"></i>
								</h4>
							</div>
						</a>
						<div id="collapseOne" class="panel-collapse collapse ">
							<div class="panel-body">
								<div class="form-group col-sm-6">
									<label class="label label-green  half">اسم الكافل</label>
									<input type="text"  name="donor_mediator_name" class="form-control half input-style" placeholder="اسم الكافل" required="">
								</div>
								<div class="form-group col-sm-6">
									<label class="label label-green  half">العلاقة</label>
									<input type="text" name="donor_mediator_status" class="form-control half input-style" placeholder="العلاقة" required="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">اسم العائلة</label>
					<input type="text" name="family_name" class="form-control half input-style" placeholder="اسم العائلة" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">اسم الجد</label>
					<input type="text" name="grand_father_name" class="form-control half input-style" placeholder="اسم الجد" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">الجنس</label>
					<select    name="gender_id_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<option value="1"> ذكر</option>
						<option value="2"> انثي </option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">الجنسية</label>
					<select    name="nationality_id_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<?php  foreach ($nationality as $record):?>
							<option value="<?php  echo $record->id;?>"><?php  echo $record->title;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">نوع الهوية</label>
					<select    name="national_type_id_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<?php
						$national_id_array =array('- اختر -','الهوية الوطنية','إقامة','وثيقة','جواز سفر');
						foreach ($national_id_array as $k=>$v):
							?>
							<option value="<?php  echo $k;?>"><?php  echo $v;?></option>
						<?php  endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">رقم الهوية</label>
					<input type="number" name="national_id_fk" class="form-control half input-style" placeholder="اسم العائلة" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> جهه العمل</label>
					<input type="text" name="guaranty_job_place" class="form-control half input-style" placeholder="اسم العائلة" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">المهنة</label>
					<select    name="guaranty_job"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<option value="1">موظف حكومي</option>
						<option value="2"> موظف قطاع خاص</option>
						<option value="3"> اعمال حرة </option>
						<option value="4"> لا يعمل</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">طريقه السداد</label>
					<select   id="r-style-resours" name="person_pay_method_id_fk" onchange="rania($('#r-style-resours').val());"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<?  $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
						for($a=0;$a<sizeof($pay);$a++):?>
							<option value="<?echo $a;?>"><?echo $pay[$a];?></option>
						<?endfor?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">المدينة</label>
					<select    name="person_guaranty_city"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<?php foreach($main_depart as $record): ?>
							<option value="<? echo $record->id; ?>"><? echo $record->main_dep_name ;?></option>
						<? endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> رقم جوال اضافي</label>
					<input type="number" name="person_guaranty_another_mob" class="form-control half input-style" placeholder="رقم جوال اضافي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> رقم الجوال</label>
					<input type="number" name="person_guaranty_mob" class="form-control half input-style" placeholder="رقم الجوال" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">  تاكيد البريد الاكتروني</label>
					<input type="email" id="user_email_validate" name="guaranty_email" onkeyup="return validate_e();" class="form-control half input-style">
					<span  id="validate_E" class="help-block"></span>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> البريد الالكتروني </label>
					<input type="email" id="user_email" name="guaranty_email"  class="form-control half input-style" placeholder="رقم الجوال" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">رقم حساب البنكي</label>
					<input type="number" name="bank_account_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> اسم البنك</label>
					<select    name="bank_code_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<option>البنك العربي مكرر </option>
						<option> الرياض </option>
						<option> مصرف راجحي </option>
						<option> مصرف الانماء </option>
						<option> بنك الجزيرة </option>
						<option> بنك البلاد </option>
						<option> السعودي الفرنسي </option>
						<option> الاهلي التجاري</option>
						<option> ساب </option>
						<option> سامبا </option>
						<option> السعودي البريطاني </option>
						<option> السعودي الهولندي </option>
						<option> السعودي الاستثمار </option>
						<option> العربي الوطني</option>
						<option> الجزيرة مكرر</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> اسم البنك</label>
					<select    name="bank_code_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<option>البنك العربي مكرر </option>
						<option> الرياض </option>
						<option> مصرف راجحي </option>
						<option> مصرف الانماء </option>
						<option> بنك الجزيرة </option>
						<option> بنك البلاد </option>
						<option> السعودي الفرنسي </option>
						<option> الاهلي التجاري</option>
						<option> ساب </option>
						<option> سامبا </option>
						<option> السعودي البريطاني </option>
						<option> السعودي الهولندي </option>
						<option> السعودي الاستثمار </option>
						<option> العربي الوطني</option>
						<option> الجزيرة مكرر</option>
					</select>
				</div>





			</div>
			<div class="panel-body r-moasasa">
				<div class="form-group col-sm-6">
					<label class="label label-green  half">اسم المستخدم</label>
					<input type="text" name="corporation_name" class="form-control half input-style" placeholder="اسم المستخدم" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> تأكيد  كلمة المرور</label>
					<input type="password" id="corporation_password_validate" onkeyup="return valid_chik_org();" class="form-control half input-style"  >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">كلمة المرور</label>
					<input type="password" id="corporation_password" name="corporation_password" class="form-control half input-style" placeholder="كلمة المرور" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">طريقه السداد</label>
					<select   id="r-style-resours1" name="corporation_pay_method_id_fk" onchange="rania2($('#r-style-resours1').val());" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<?  $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
						for($a=0;$a<sizeof($pay);$a++):?>
							<option value="<?echo $a;?>"><?echo $pay[$a];?></option>
						<?endfor?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">اسم المؤسسة </label>
					<input type="text" name="corporation_guaranty_name" class="form-control half input-style" placeholder="اسم المؤسسة" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> الهاتف</label>
					<input type="number" name="corporation_guaranty_another_mob" class="form-control half input-style" placeholder="رقم جوال اضافي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">المدينة</label>
					<select    name="corporation_guaranty_city"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<?php foreach($main_depart as $record): ?>
							<option value="<? echo $record->id; ?>"><? echo $record->main_dep_name ;?></option>
						<? endforeach;?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> تأكيد البريد   الالكتروني</label>
					<input type="email" id="user_email_validate" onkeyup="return validate_e();" class="form-control half input-style"  >
					<span  id="validate_E" class="help-block"></span>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> رقم الجوال</label>
					<input type="number" name="corporation_guaranty_mob" class="form-control half input-style" placeholder="رقم الجوال" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">رقم حساب البنكي</label>
					<input type="number" name="bank_account_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> البريد الالكتروني</label>
					<input type="email"  id="user_email" name="corporation_guaranty_email" class="form-control half input-style" placeholder="البريد الالكتروني" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> اسم البنك</label>
					<select    name="bank_code_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<option>البنك العربي مكرر </option>
						<option> الرياض </option>
						<option> مصرف راجحي </option>
						<option> مصرف الانماء </option>
						<option> بنك الجزيرة </option>
						<option> بنك البلاد </option>
						<option> السعودي الفرنسي </option>
						<option> الاهلي التجاري</option>
						<option> ساب </option>
						<option> سامبا </option>
						<option> السعودي البريطاني </option>
						<option> السعودي الهولندي </option>
						<option> السعودي الاستثمار </option>
						<option> العربي الوطني</option>
						<option> الجزيرة مكرر</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> اسم البنك</label>
					<select    name="bank_code_fk"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
						<option value="0"> - اختر - </option>
						<option>البنك العربي مكرر </option>
						<option> الرياض </option>
						<option> مصرف راجحي </option>
						<option> مصرف الانماء </option>
						<option> بنك الجزيرة </option>
						<option> بنك البلاد </option>
						<option> السعودي الفرنسي </option>
						<option> الاهلي التجاري</option>
						<option> ساب </option>
						<option> سامبا </option>
						<option> السعودي البريطاني </option>
						<option> السعودي الهولندي </option>
						<option> السعودي الاستثمار </option>
						<option> العربي الوطني</option>
						<option> الجزيرة مكرر</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">رقم حساب اضافي  </label>
					<input type="number" name="bank_account_another_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">رقم الصندوق   </label>
					<input type="number" name="box_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">اسم صاحب الحساب  </label>
					<input type="text" name="bank_account_person_name" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">فاكس  </label>
					<input type="text" name="fax_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> رقم العضوية  </label>
					<input type="number" name="membership_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">  شروط الدعم  </label>
					<textarea class="form-control" name="condition_support"></textarea>
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> رقم التصريح   </label>
					<input type="number" name="permit_number" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half"> العنوان   </label>
					<input type="text" name="address" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">  الرمز البريدي   </label>
					<input type="number" name="postal_code" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">  التحويلة  </label>
					<input type="text" name="transformation" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">   موقع المؤسسة  </label>
					<input type="text" name="organization_web_site" class="form-control half input-style" placeholder="رقم حساب البنكي" >
				</div>
				<div class="form-group col-sm-6">
					<label class="label label-green  half">  المشاريع </label>
					<textarea class="form-control" name="projects"></textarea>
				</div>
			</div>
		</div>
	</div>

	<!----------------------input------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title"> إرفاق الملفات</h3>
		</div>
		<div class="panel-body">
			<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
			<tr class="info">
					<th class=" text-center">م </th>
					<th class=" text-center">اسم الملف </th>
					<th class=" text-center"> ارفاق</th>
					<th class=" text-center">فتح الملف</th>
				</tr>
				<tr class="text-center">
					<td>1</td>
					<td>صور الهوية الوطنية </td>
					<td style="width: 35%;">
						<div class="field">
							<input type="file" name="national_id_img" class="file_input_with_replacement">
						</div>
					</td>
					<td></td>
				</tr>
				<tr class="text-center">
					<td>2</td>
					<td>بطاقة المصرف</td>
					<td style="width: 35%;">
						<div class="field">
							<input type="file" name="bank_card_img" class="file_input_with_replacement">
						</div>
					</td>
					<td></td>
				</tr>
				<tr class="text-center">
					<td>3</td>
					<td>وصل إستقطاع البنك </td>
					<td style="width: 35%;">
						<div class="field">
							<input type="file" name="bank_deduction_voucher_img" class="file_input_with_replacement">
						</div>
					</td>
					<td></td>
				</tr>
				<tr class="text-center">
					<td>4</td>
					<td>أخري</td>
					<td style="width: 35%;">
						<div class="field">
							<input type="file" name="other_img" class="file_input_with_replacement">
						</div>
					</td>

					<td></td>
				</tr>
			</table>
		</div>
	</div>
</div>





<!----------------------input------------------->
	<div class="form-group col-sm-5"></div>
	<div class="form-group col-sm-4">
		<a href="<?php echo base_url()."Finance_resource/all_donors"?>">  <button type="button" class="btn btn-add  m-b-5"> عودة</button></a>
		<input type="submit" role="button" name="save" value="حفظ" class="btn btn-add  m-b-5">
	</div>
	<div class="form-group col-sm-5"></div>
	<?php echo form_close()?>
	<!----------------------input------------------->











<script>
	function valid_chik_one()
	{
		if($("#person_password").val() == $("#user_pass_validate").val()){
			document.getElementById('validate_one').style.color = '#00FF00';
			document.getElementById('validate_one').innerHTML = 'كلمة المرور متطابقة';
		}else{
			document.getElementById('validate_one').style.color = '#F00';
			document.getElementById('validate_one').innerHTML = 'كلمة المرور غير متطابقة';
		}
	}

	function valid_chik_org()
	{
		if($("#corporation_password").val() == $("#corporation_password_validate").val()){
			document.getElementById('validate_org').style.color = '#00FF00';
			document.getElementById('validate_org').innerHTML = 'كلمة المرور متطابقة';
		}else{
			document.getElementById('validate_org').style.color = '#F00';
			document.getElementById('validate_org').innerHTML = 'كلمة المرور غير متطابقة';
		}
	}


	function validate_e()
	{  //alert($("#user_email_validate").val());
		if($("#user_email").val() == $("#user_email_validate").val()){
			document.getElementById('validate_E').style.color = '#00FF00';
			document.getElementById('validate_E').innerHTML = 'الايميل متطابق';
		}else{
			document.getElementById('validate_E').style.color = '#F00';
			document.getElementById('validate_E').innerHTML = 'الايميل غير متطابق';
		}
	}



	function as(selc){

		if (selc == 1) {
			$(".r-farde").show();
			$(".r-moasasa").hide();

		} else if (selc == 2) {
			$(".r-farde").hide();
			$(".r-moasasa").show();
		} else {
			$(".r-farde").show();
			$(".r-moasasa").hide();
		}
	}


</script>








