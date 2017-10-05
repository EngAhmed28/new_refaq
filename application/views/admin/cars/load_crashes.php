<?php
if(isset($_POST['count']) && $_POST['count'] != null){
    for($x = 0 ; $x < $_POST['count'] ; $x++){
        echo '<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
              <h2 class="text-center">العطل رقم '.($x+1).'</h2>  
              </div>
              
               <div class="form-group col-sm-4">
                    <label class="label label-green  half">إسم العطل</label>
                    <input type="number" class="form-control half input-style" name="crashe_name'.$x.'" id="crashe_name'.$x.'"   >
                </div>          
                    
                 <div class="form-group col-sm-4">
                    <label class="label label-green  half">حالة العطل</label>
                   <select class="choose-date selectpicker form-control half" name="crashe_status'.$x.'" id="crashe_status'.$x.'"   data-show-subtext="true" data-live-search="true">
                         <option value="">--قم بإختيار حالة العطل--</option>
                        <option value="0">لم يتم التصليح</option>
                        <option value="1">جاري التصليح</option>
                        <option value="2">تم التصليح</option>
                    </select>
                </div> 
                     
                 <div class="form-group col-sm-4">
                    <label class="label label-green  half">ملاحظات</label>
                    <textarea  class="form-control" style="margin: 0px 0px 0px -5px; height: 61px; width: 354px;" name="notes'.$x.'" id="notes'.$x.'" cols="30" rows="10"></textarea>
                </div>';
    }
} ?>