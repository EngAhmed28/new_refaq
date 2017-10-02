<input type="hidden" name="try" id="try" value="<? echo $id; ?>" />




<?php
$this->db->select('*');
$this->db->from('employees');
$this->db->where('administration',$id);
$query = $this->db->get();
$query->row_array();
foreach ($query->result() as $row) {
    $data[] = $row;
}   ?>
<label class="label label-green  half">الموظف</label>
<select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id" onchange="return back($('#emp_id').val(),document.getElementById('try').value  );"  required  data-show-subtext="true" data-live-search="true">
    <option value="">إختر</option>
    <?php if(!empty($data)):
        foreach ($data as $record):?>
            <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
        <?php  endforeach; endif;?>
</select>

<script>
    function back(valuesx)
    {
        if(valuesx)
        {
            var depart = document.getElementById('try').value;
            var dataString = 'valuesx=' + valuesx + '&depart='+ depart ;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_vacation',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea55').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea55').html('');
            return false;
        }

    }
</script>