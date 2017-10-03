
    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">الحضورو الإنصراف</h3>
            </div>
            <div class="panel-body">
                <?php  echo form_open_multipart('Administrative_affairs/emp_attendance')?>
                <div style="    width: 450px !important;">
                    <label class="label label-green  half">البحث عن موظف</label>
                </div>
                <select class="choose-date selectpicker form-control half" name="emp_id" id="emp_id"    data-show-subtext="true" data-live-search="true">
                    <option value="">--قم بإختيار موظف--</option>
                    <?php
                    if(isset($emps) && $emps != null)
                        for($x = 0 ; $x < count($emps) ; $x++)
                            echo '<option value="'.$emps[$x]->id.'">'.$emps[$x]->employee.'</option>';
                    ?>
                </select>
                <input  style="margin-right: 30px" type="submit" role="button" name="save" value="إثبات حضور" class="btn btn-add">
            </div>
        </div>
    </div>
    <?php if(isset($table) && $table != null): ?>
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
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th class="text-center">م</th>
                                <th class="text-center">إسم الموظف</th>
                                <th class="text-center">التاريخ</th>
                                <th class="text-center">الحضور الفعلي</th>
                                <th class="text-center">الإنصراف الفعلي</th>
                                <th class="text-center">عدد ساعات الحضور</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($x = 0 ; $x < count($table) ; $x++){
                                if($table[$x]->dissuasion == '')
                                    $dissuasion = '<a href="'.base_url().'/Administrative_affairs/dissuasion/'.$table[$x]->id.'"><button class="btn btn-sm btn btn-danger">إثبات إنصراف</button></a>';
                                else
                                    $dissuasion = $table[$x]->dissuasion;

                                echo '<tr>
                                            <td>'.($x+1).'</td>
                                            <td>'.$table[$x]->employee.'</td>
                                            <td>'.date("Y-m-d",$table[$x]->date).'</td>
                                            <td>'.$table[$x]->presence.'</td>
                                            <td>'.$dissuasion.'</td>
                                            <td>'.$table[$x]->diff.'</td>
                                          </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php  endif; ?>




