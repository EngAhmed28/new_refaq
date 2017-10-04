


<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تقرير الأذونات خلال فترة</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">منذ فترة</label>
                <input type="text" name="date_from"id="date_from" class=" some_class_2 form-control half input-style" placeholder="شهر/يوم/سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">إلي فترة</label>
                <input type="text" name="date_to"id="date_to" class=" some_class_2 form-control half input-style" placeholder="شهر/يوم/سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">نوع الأجازة</label>
                <select class="choose-date selectpicker form-control half" name="type" id="type"  required data-show-subtext="true" data-live-search="true" >
                    <option value="">إختر  </option>
                    <option value="1">أجازة سنوية </option>
                    <option value="2"> أجازة مرضية </option>
                    <option value="3"> أجازة بدون أجر </option>
                    <option value="4"> الكل </option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-5"></div>
<div class="form-group col-sm-4">
    <input type="submit" role="button" name="add" value="بحث" onclick="return lood();" class="btn btn-add btn-rounded w-md m-b-5">
</div>
<div class="form-group col-sm-5"></div>
<div class="col-sm-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <div class="btn-group" id="buttonexport">
                <a href="#">
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="btn-group">
                <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                <ul class="dropdown-menu exp-drop" role="menu">
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});">
                            <img src="img/json.png" width="24" alt="logo"> JSON</a>
                    </li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                            <img src="img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                    </li>
                    <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                            <img src="img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                            <img src="img/xml.png" width="24" alt="logo"> XML</a>
                    </li>
                    <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});">
                            <img src="img/sql.png" width="24" alt="logo"> SQL</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});">
                            <img src="img/csv.png" width="24" alt="logo"> CSV</a>
                    </li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});">
                            <img src="img/txt.png" width="24" alt="logo"> TXT</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});">
                            <img src="img/xls.png" width="24" alt="logo"> XLS</a>
                    </li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                            <img src="img/word.png" width="24" alt="logo"> Word</a>
                    </li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});">
                            <img src="img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});">
                            <img src="img/png.png" width="24" alt="logo"> PNG</a>
                    </li>
                    <li>
                        <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                            <img src="img/pdf.png" width="24" alt="logo"> PDF</a>
                    </li>
                </ul>
            </div>
            <div class="table-responsive" id="optionearea1">
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------->

<script>
    function lood(){
        var num1=   $('#date_from').val();
        var num2=   $('#date_to').val();
        var type=   $('#type').val();
        if( num1 != '' && num2 != '' && type != ''){
            var dataString = 'form_date=' + num1 + '&to_date=' + num2 + '&type=' + type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/all_vacations_period',
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

