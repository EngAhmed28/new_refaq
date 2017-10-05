


<?php   if((isset($table)&& $table!=null) || (isset($order)&& $order!=null)):?>
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
                            <th class="text-center"> م </th>
                            <th class="text-center">إسم السائق</th>
                            <th class="text-center">سيارة رقم</th>
                            <th class="text-center">الحالة</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        if(isset($table)&& $table!=null){
                            for($x = 0 ; $x < count($table) ; $x++){
                                if(isset($table[$x]->driver_order) && $table[$x]->driver_order != null){
                                    if($table[$x]->driver_order[key($table[$x]->driver_order)]->return == 1){
                                        $status = 'متاح';
                                        $car = '-';
                                    }
                                    if($table[$x]->driver_order[key($table[$x]->driver_order)]->return == 0){
                                        $status = 'غير متاح';
                                        $car = $cars[$table[$x]->driver_order[key($table[$x]->driver_order)]->car_id_fk]->car_code;
                                    }
                                }
                                else{
                                    $status = 'متاح';
                                    $car = '-';
                                }
                                echo '<tr>
                                          <td>'.($x+1).'</td>
                                          <td>'.$table[$x]->driver_name.'</td>
                                          <td>'.$car.'</td>
                                          <td>'.$status.'</td>
                                          </tr>';
                            }
                        }
                        if(isset($order)&& $order!=null){
                            for($z = 0 ; $z < count($order) ; $z++){
                                echo '<tr>
                                          <td>'.($x+1).'</td>
                                          <td>-</td>
                                          <td>'.$order[$z]->car_code.'</td>
                                          <td>متاح</td>
                                          </tr>';
                                $x++;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php  else: ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> لا يوجد سائقين أو سيارات مسجلين</strong>
    </div>

<?php endif; ?>


