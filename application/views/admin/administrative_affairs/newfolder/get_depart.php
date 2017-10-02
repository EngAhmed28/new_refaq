<?php

if(!empty($_POST['admin_num'])):?>

        <label class="label label-green  half">القسم</label>
        <select class="choose-date selectpicker form-control half" name="department" id="department"    data-show-subtext="true" data-live-search="true">
            <option value="">إختر</option>
            <?php if(!empty($admin)):
                foreach ($departs[$_POST['admin_num']] as $record):?>
                    <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                <?php  endforeach; endif;?>
        </select>

<? endif;?>
