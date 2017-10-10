
<style>
	#myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	#myImg:hover {opacity: 0.7;}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-content {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
	}

	/* Caption of Modal Image */
	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}

	/* Add Animation */
	.modal-content, #caption {
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)}
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)}
		to {transform:scale(1)}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
		.modal-content {
			width: 100%;
		}
	}
</style>

<!--------------------------------------------------------------------->

<?php  echo form_open_multipart('finance_resource/edit_donors/'.$results[0]->id)?>
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع المتبرع</label>
                <select  id="r-moasasa"  name="donor_type"onchange="change($('#r-moasasa').val());" <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <? $arr=array('إختر','فردي','مؤسسة');
                    for($s=0;$s<sizeof($arr);$s++):
                    $select='';
                    if($results[0]->donor_type ==$s){
                        $select='selected';
                    }
                    ?>
                    <option value="<? echo $s; ?>" <? echo $select;?>><? echo$arr[$s]; ?></option>
                    <?php endfor;?>
                </select>
                <input type="hidden" name="types"  id="types" value="<? echo $results[0]->donor_type ;?>"/>
            </div>
        </div>
        <?if($results[0]->donor_type ==1){
            $stylez= 'display: none;';
            $style= '';
        }elseif($results[0]->donor_type ==2){
            $style= 'display: none;';
            $stylez= '';
        }?>
        <div class="panel-body mo_types" style="<? echo $style;?>">
            <div class="form-group col-sm-6">
                <label class="label label-green  half">اسم المستخدم</label>
                <input type="text" name="person_name" class="form-control half input-style" placeholder="اسم المستخدم" value="<? echo $results[0]->user_name; ?>" <? echo $readonly;?> <? echo $readonly;?> >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">تاريخ الكفالة</label>
                <input type="text"  name="guaranty_date" class=" some_class_2 form-control half input-style  <? echo $class;?>" placeholder="شهر / يوم / سنة"  id="some_class_1" value="<?  if(!empty($results[0]->guaranty_date)): echo date('m-d-Y',$results[0]->guaranty_date); endif;?>"  <? echo $readonly;?>>
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
                <input type="text" name="character_person" class="form-control half input-style" placeholder="صفه الفرد"  value="<? echo $results[0]->character_person;?>" <? echo $readonly;?> >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">حالة الكافل</label>
                <select    name="guaranty_status" <? echo $disabled;?>  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <? $arrays =array('إختر','علي قيد الحياه','متوفي');
                    for($f=0;$f<sizeof($arrays);$f++):
                    $select='';
                    if($f == $results[0]->guaranty_status){
                        $select='selected';
                    }
                    ?>
                    <option value="<? echo $f; ?>" <? echo $select;?> ><? echo $arrays[$f]; ?> </option>
                    <?php endfor;?>
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
                                <input type="text"  name="donor_mediator_name" class="form-control half input-style" placeholder="اسم الكافل" value="<? echo $results[0]->donor_mediator_name;?>" <? echo $readonly;?>>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">العلاقة</label>
                                <input type="text" name="donor_mediator_status" class="form-control half input-style" placeholder="العلاقة" value="<? echo $results[0]->donor_mediator_status;?>" <? echo $readonly;?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">اسم العائلة</label>
                <input type="text" name="family_name" class="form-control half input-style" placeholder="اسم العائلة"  value="<? echo $results[0]->family_name;?>"  <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">اسم الجد</label>
                <input type="text" name="grand_father_name" class="form-control half input-style" placeholder="اسم الجد"  value="<? echo $results[0]->grand_father_name;?>"  <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">الجنس</label>
                <select    name="gender_id_fk"   <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?  $gender_arr= array('إختر','ذكر','أنثي');
                    for ($n=0;$n<sizeof($gender_arr);$n++):
                        $sec='';
                        if($n == $results[0]->gender_id_fk){
                            $sec='selected';
                        }?>
                        <option value="<? echo $n;?>" <? echo $sec;?> > <? echo $gender_arr[$n]?></option>
                    <? endfor;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">الجنسية</label>
                <select    name="nationality_id_fk" <? echo $disabled;?>  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="0"> - اختر - </option>
                    <?php  foreach ($nationality as $record):
                        $select='';
                        if($results[0]->nationality_id_fk==$record->id){
                            $select='selected';
                        }?>
                        <option value="<?php  echo $record->id;?>" <? echo $select;?>><?php  echo $record->title;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">نوع الهوية</label>
                <select    name="national_type_id_fk"   <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?php
                    $national_id_array =array('- اختر -','الهوية الوطنية','إقامة','وثيقة','جواز سفر');
                    foreach ($national_id_array as $k=>$v):

                        $sec='';
                        if($k == $results[0]->national_type_id_fk){
                            $sec='selected';
                        }?>
                        <option value="<?php  echo $k;?>" <? echo $sec;?>><?php  echo $v;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">رقم الهوية</label>
                <input type="number" name="national_id_fk" class="form-control half input-style" placeholder="رقم الهوية"  value="<? echo $results[0]->national_id_fk;?>"  <? echo $readonly;?> >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> جهه العمل</label>
                <input type="text" name="guaranty_job_place" class="form-control half input-style" placeholder="جهه العمل"  value="<? echo $results[0]->guaranty_job_place;?>"  <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">المهنة</label>
                <select    name="guaranty_job"  <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <? $job_arr =array('إختر','موظف حكومي','موظف قطاع خاص','اعمال حرة','لا يعمل');
                    for($d=0;$d<sizeof($job_arr);$d++):
                        $sec='';
                        if($results[0]->guaranty_job == $d){
                            $sec='selected';
                        }
                        ?>
                        <option value="<? echo $d;?>" <? echo $sec;?>><? echo $job_arr[$d];?></option>
                    <? endfor;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">طريقه السداد</label>
                <select   id="r-style-resours"   <? echo $disabled;?> name="person_pay_method_id_fk" onchange="go($('#r-style-resours').val());"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?  $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                    for($a=0;$a<sizeof($pay);$a++):
                        $sec='';
                        if($a == $results[0]->pay_method_id_fk){
                            $sec='selected';
                        }?>
                        <option value="<?echo $a;?>" <? echo $sec;?>><?echo $pay[$a];?></option>
                    <?endfor?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">المدينة</label>
                <select    name="person_guaranty_city" <? echo $disabled;?> class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="0"> - اختر - </option>
                    <?php
                    foreach($main_depart as $record):
                        $sec='';
                        if($results[0]->guaranty_city == $record->id){
                            $sec='selected';
                        }?>
                        <option value="<? echo $record->id; ?>" <? echo $sec;?>><? echo $record->main_dep_name ;?></option>
                    <? endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> رقم جوال اضافي</label>
                <input type="number" name="person_guaranty_another_mob" class="form-control half input-style" placeholder="رقم جوال اضافي" value="<? echo$results[0]->guaranty_another_mob;?>"  <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> رقم الجوال</label>
                <input type="number" name="person_guaranty_mob" class="form-control half input-style" placeholder="رقم الجوال" value="<? echo$results[0]->guaranty_mob;?>"  <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">  تاكيد البريد الاكتروني</label>
                <input type="email" id="user_email_validate" name="guaranty_email" onkeyup="return validate_e();" value="<? echo $results[0]->guaranty_email;?>" class="form-control half input-style">
                <span  id="validate_E" class="help-block"></span>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> البريد الالكتروني </label>
                <input type="email" id="user_email" name="guaranty_email"  class="form-control half input-style" placeholder="رقم الجوال"  value="<? echo $results[0]->guaranty_email;?>" <? echo $readonly;?>>
            </div>
            <input type="hidden" name="id"  id="id" value="<? echo $results[0]->pay_method_id_fk;?>"/>
            <? if($results[0]->pay_method_id_fk >1):?>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">رقم حساب البنكي</label>
                <input type="number" name="bank_account_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->bank_account_number ;?>"  <? echo $readonly;?>>
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
                    <label class="label label-green  half">رقم حساب اضافي </label>
                    <input type="number" name="bank_account_another_number" class="form-control half input-style" placeholder="رقم حساب اضافي" value="<? echo $results[0]->bank_account_another_number ;?>"  <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">اسم صاحب الحساب</label>
                    <input type="text" name="bank_account_person_name" class="form-control half input-style" placeholder="اسم صاحب الحساب" value="<? echo $results[0]->bank_account_person_name ;?>"  <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم العضوية </label>
                    <input type="number" name="membership_number" class="form-control half input-style" placeholder="رقم العضوية" value="<? echo $results[0]->membership_number ;?>"  <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">ملاحظات </label>
                    <textarea class="form-control" name="guaranty_note"  <? echo $readonly;?>><? echo $results[0]->guaranty_note ;?></textarea>
                </div>
            <? endif;?>

        </div>
        <div class="panel-body mo_type" style="<? echo $stylez;?>">
            <div class="form-group col-sm-6">
                <label class="label label-green  half">اسم المستخدم</label>
                <input type="text" name="corporation_name" class="form-control half input-style" placeholder="اسم المستخدم"  value="<? echo $results[0]->user_name;?>" <? echo $readonly;?>>
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
                <select   id="r-style-resours1" name="corporation_pay_method_id_fk"  <? echo $disabled;?> onchange="go_($('#r-style-resours1').val());" class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <?  $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                    for($a=0;$a<sizeof($pay);$a++):
                        $sec='';
                        if($a == $results[0]->pay_method_id_fk){
                            $sec='selected';
                        }?>
                        <option value="<?echo $a;?>" <? echo $sec;?>><?echo $pay[$a];?></option>
                    <?endfor?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">اسم المؤسسة </label>
                <input type="text" name="corporation_guaranty_name" class="form-control half input-style" placeholder="اسم المؤسسة" value="<? echo $results[0]->guaranty_name;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> الهاتف</label>
                <input type="number" name="corporation_guaranty_another_mob" class="form-control half input-style" placeholder="رقم جوال اضافي"  value="<? echo $results[0]->guaranty_another_mob;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">المدينة</label>
                <select     <? echo $disabled;?> name="corporation_guaranty_city"  class="choose-date selectpicker form-control half"  data-show-subtext="true" data-live-search="true">
                    <option value="0"> - اختر - </option>
                    <?php foreach($main_depart as $record):
                        $sec='';
                        if($results[0]->guaranty_city == $record->id){
                            $sec='selected';
                        }?>
                        <option value="<? echo $record->id; ?>" <? echo $sec;?>><? echo $record->main_dep_name ;?></option>
                    <? endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> رقم الجوال</label>
                <input type="number" name="corporation_guaranty_mob" class="form-control half input-style" placeholder="رقم الجوال" value="<? echo $results[0]->guaranty_mob;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> تأكيد البريد   الالكتروني</label>
                <input type="email" id="user_email_validate" onkeyup="return validate_e();" class="form-control half input-style" value="<? echo $results[0]->guaranty_email;?>" <? echo $readonly;?> >
                <span  id="validate_E" class="help-block"></span>
            </div>
            <div class="form-group col-sm-6 r-resoursezm">
                <label class="label label-green  half">رقم حساب البنكي</label>
                <input type="number" name="bank_account_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->bank_account_number;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> البريد الالكتروني</label>
                <input type="email"  id="user_email" name="corporation_guaranty_email" class="form-control half input-style" placeholder="البريد الالكتروني"  value="<? echo $results[0]->guaranty_email;?>" <? echo $readonly;?>>
            </div>
            <input type="hidden" name="ids"  id="ids" value="<? echo $results[0]->pay_method_id_fk;?>"/>
            <? if($results[0]->pay_method_id_fk >1):?>
                <div class="form-group col-sm-6 r-resoursezm">
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
                <div class="form-group col-sm-6 r-resoursezm">
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
                <div class="form-group col-sm-6 r-resoursezm">
                    <label class="label label-green  half">رقم حساب اضافي  </label>
                    <input type="number" name="bank_account_another_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->bank_account_another_number;?>" <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half ">رقم الصندوق   </label>
                    <input type="number" name="box_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->box_number;?>" <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6 r-resoursezm">
                    <label class="label label-green  half ">اسم صاحب الحساب  </label>
                    <input type="text" name="bank_account_person_name" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->bank_account_person_name;?>" <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">فاكس  </label>
                    <input type="text" name="fax_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->fax_number;?>" <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6 r-resoursezm1">
                    <label class="label label-green  half"> رقم العضوية  </label>
                    <input type="number" name="membership_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->membership_number;?>" <? echo $readonly;?>>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">  شروط الدعم  </label>
                    <textarea class="form-control"  <? echo $readonly;?>  name="condition_support"><? echo $results[0]->condition_support;?></textarea>
                </div>
            <? endif;?>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> رقم التصريح   </label>
                <input type="number" name="permit_number" class="form-control half input-style" placeholder="رقم حساب البنكي" value="<? echo $results[0]->permit_number;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half"> العنوان   </label>
                <input type="text" name="address" class="form-control half input-style" placeholder="العنوان" value="<? echo $results[0]->address;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">  الرمز البريدي   </label>
                <input type="number" name="postal_code" class="form-control half input-style" placeholder="الرمز البريدي " value="<? echo $results[0]->postal_code;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">  التحويلة  </label>
                <input type="text" name="transformation" class="form-control half input-style" placeholder="التحويلة" value="<? echo $results[0]->transformation;?>" <? echo $readonly;?>>
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">   موقع المؤسسة  </label>
                <input type="text" name="organization_web_site" class="form-control half input-style" placeholder="موقع المؤسسة" value="<? echo $results[0]->organization_web_site;?>" <? echo $readonly;?> >
            </div>
            <div class="form-group col-sm-6">
                <label class="label label-green  half">  المشاريع </label>
                <textarea class="form-control"  <? echo $readonly;?>  name="projects"><? echo $results[0]->projects;?></textarea>
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
    <a href="<?php echo base_url()."Finance_resource/all_guaranty"?>">  <button type="button" class="btn btn-add  m-b-5"> عودة</button></a>
    <?php  if($this->uri->segment(4) !='view'):?>
    <input type="submit" role="button" name="save" value="حفظ" class="btn btn-add  m-b-5">
    <? endif;?>
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
	{alert($("#user_email_validate").val());
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


   <script>
	   function go(valu) {
		   var dods = $("#id").val();
		   if (dods == 4) {
			   $(".r-resoursez").show();
			   $(".r-resoursez1").show();
		   } else if (dods != 4) {
			   $(".r-resoursez1").hide();
		   }
		   if (valu == 1) {
			   $(".r-resoursez").hide();
			   $(".r-resoursez1").hide();
		   } else if (valu == 2 || valu == 3 || valu == 5) {
			   $(".r-resoursez").show();
			   $(".r-resoursez1").hide();
		   } else if (valu == 4 ) {
			   $(".r-resoursez").show();
			   $(".r-resoursez1").show();
		   } else {
			   $(".r-resoursez").hide();
			   $(".r-resoursez1").hide();
		   }

	   }
   </script>
<script>
	function go_(valu) {
		var dods = $("#ids").val();
		if (dods == 4) {
			$(".r-resoursezm").show();
			$(".r-resoursezm1").show();
		} else if (dods != 4) {
			$(".r-resoursezm1").hide();
		}
		if (valu == 1) {
			$(".r-resoursezm").hide();
			$(".r-resoursezm1").hide();
		} else if (valu == 2 || valu == 3 || valu == 5) {
			$(".r-resoursezm").show();
			$(".r-resoursezm1").hide();
		} else if (valu == 4 ) {
			$(".r-resoursezm").show();
			$(".r-resoursezm1").show();
		} else {
			$(".r-resoursezm").hide();
			$(".r-resoursezm1").hide();
		}

	}
</script>


<script>

	   function change(datas){
		   var doda = $("#types").val();
		   if (doda ==1) {
			  $(".mo_types").show();
			   $(".mo_type").hide();
		   } else if (doda ==2) {
			   $(".mo_type").show();
			   $(".mo_types").hide();
		   }

		   if (datas == 1) {
			   $(".mo_types").show();
			   $(".mo_type").hide();

		   } else if (datas == 2) {
			   $(".mo_type").show();
			   $(".mo_types").hide();
		   }

	   }


   </script>

