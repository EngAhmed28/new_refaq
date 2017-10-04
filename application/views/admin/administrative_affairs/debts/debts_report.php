
<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تقرير طلبات السلف</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-4">
                <label class="label label-green  half">الفترة من</label>
                <input type="text" name="debt_date_from"id="debt_date_from" class=" some_class_2 form-control half input-style" placeholder="/ يوم / شهر / سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">الفترة الى</label>
                <input type="text" name="debt_date_to"id="debt_date_to" class=" some_class_2 form-control half input-style" placeholder="/ يوم / شهر / سنة" required="" id="some_class_1">
            </div>
            <div class="form-group col-sm-4">
                <label class="label label-green  half">الحالة</label>
                <select class="choose-date selectpicker form-control half" name="type" id="type"    required data-show-subtext="true" data-live-search="true" >
                    <option value="">إختر</option>
                    <option value="3">الكل</option>
                    <option value="1">الموافق</option>
                    <option value="2">المرفوض</option>
                    <option value="0">لم يتم الاجراء</option>
                </select>
            </div>
        </div>
    </div>
</div>
                    <div class="form-group col-sm-5"></div>
                    <div class="form-group col-sm-4">
                        <input type="submit" role="button" name="report" value="بحث" onclick="return lood();" class="btn btn-add btn-rounded w-md m-b-5">
                    </div>
                    <div class="form-group col-sm-5"></div>


<!--------------------------------------------------------------------->

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
                <div class="table-responsive" id="optionearea2">
                </div>
            </div>
        </div>
    </div>



<script>
    function lood(){
        var date_t=$("#debt_date_to").val();
        var date_f=$("#debt_date_from").val();
        var type=$("#type").val();
        if(date_f !='' && type != '' && date_t!='')
        {
            var dataString = 'debt_date_to=' + date_t +"&debt_date_from="+date_f+"&type="+type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Administrative_affairs/EmployeesDebtsReport',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
            return false;
        }
    }
</script>