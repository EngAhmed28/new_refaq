<?php if(isset($table)&& $table!=null):?>
<table id="example" class=" display table table-bordered table-striped table-hover">
    <thead>
        <tr class="info">
            <th class="text-center">م</th>
            <th class="text-center">التاريخ</th>
            <th class="text-center">رقم إيصال المخالفة</th>
            <th class="text-center">إسم السائق</th>
            <th class="text-center">الملاحظة</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for($x = 0 ; $x < count($table) ; $x++){ 
        echo '<tr>
              <td>'.($x+1).'</td>
              <td>'.date('Y-m-d',$table[$x]->date).'</td>
              <td>'.$table[$x]->receipt_code.'</td>
              <td>'.$drivers[$table[$x]->driver_id_fk]->driver_name.'</td>
              <td>'.$table[$x]->note.'</td>
              </tr>';
    }
    ?>
    </tbody>
</table>
<?php 
else:?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>لا توجد مخالفات</strong>
    </div>
<?php endif;?>