<?php
$val = $_POST['band_num'];

if($val>10){

    echo '<div class="alert alert-danger" >
              أقصى عدد 10
              </div>';

}
elseif($val<=10)
{
    for($i=1;$i<=$val;$i++){
        $num =$num_item;?>




<div class="form-group col-sm-6">
    <label class="label label-green  half">رقم البند<?php echo $i;?></label>
    <input type="text" name="item_num<?php echo $i;?>" class="form-control half input-style" readonly   value="<?php echo ($num+$i);?>" />
</div>

<div class="form-group col-sm-6">
    <label class="label label-green  half">البند<?php echo $i;?></label>
    <textarea class="form-control"  style="margin: 0px; width: 506px; height: 60px;"  name="item_title<?php echo $i;?>" id="item_title" ></textarea>
</div>
<?php if(isset($_POST['val'])):?>
<div class="form-group col-sm-6">
    <label class="label label-green  half">القرار عليه<?php echo $i;?></label>
    <textarea class="form-control"  style="margin: 0px; width: 506px; height: 60px;"  name="decision_title<?php echo $i;?>" id="decision_title" ></textarea>
</div>
<?php endif;

  }

}


?>
