<!--------------------------------------------------------------------->

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> تقرير بالتبرع اليومي خلال فترة</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-3">
                <label class="label label-green  half">منذ فترة</label>
                <input type="text" name="date_from" id="date_from" class=" some_class_2 form-control half input-style" placeholder="شهر/يوم/سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-3">
                <label class="label label-green  half">إلي فترة</label>
                <input type="text" name="date_to" id="date_to" class=" some_class_2 form-control half input-style" placeholder="شهر/يوم/سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-3">
                <label class="label label-green  half">نوع التبرع</label>
                <select class="choose-date selectpicker form-control half"  name="type" id="type"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <option value="1">متبرع</option>
                    <option value="2">أخري</option>
                    <option value="3">كفيل</option>
                    <option value="4">الكل</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <input type="button" role="button" name="report" onclick="return lood();" value="بحث" class="btn btn-add  w-md m-b-5">
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12" id="optionearea1"></div>
<!------------------------------------------------------------------------------->

<script>
    function lood(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        var type=   $('#type').val();
        if( num1 != '' && num2 != '' && type != ''){
            var dataString = 'date_from=' + num1 + '&date_to=' + num2 + '&type=' + type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Finance_resource/today_donations_period',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
    }
</script>

<!--------------------------------------------------------------------->
<!--------------------------------------------------------------------->

