
<div class="col-sm-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <div class="btn-group" id="buttonexport">
                <h6>مسير المرتبات</h6>
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
            <div class="table-responsive" >
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">اسم الموظف </th>
                        <th class="text-center"> الدرجة </th>
                        <th class="text-center">الراتب الأساسي</th>
                        <th class="text-center"> بدل نقل  </th>
                        <th class="text-center">بدل منصب اشرافي </th>
                        <th class="text-center">بدل طبيعة عمل   </th>
                        <th class="text-center">بدل اتصالات  </th>
                        <th class="text-center">خصم تأمينات  </th>
                        <th class="text-center">إجمالي الراتب  </th>
                        <th class="text-center">مكافأة  </th>
                        <th class="text-center">خصم  </th>
                        <th class="text-center">صافي الراتب  </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a=1;
                    foreach ($datas as $record ):
                        $query = $this->db->query("SELECT * FROM mon_rewards WHERE emp_id =" .$record['emp_code']);
                        $rewards = 0;
                        foreach ($query->result() as $row)
                        {
                            $rewards+=  $row->value;
                        }
                        $query_kasm = $this->db->query("SELECT * FROM penalty WHERE emp_id =" .$record['emp_code'] .' and  penalty_type = 1');
                        $kasm = 0;
                        foreach ($query_kasm->result() as $row)
                        {
                            $kasm+=  $row->value;
                        }
                        $total_salary = $record['salary'] + $record['b_naql'] + $record['b_eshraf'] + $record['b_amal'] + $record['b_etislat'] - $record['k_tamen'];
                        $safi_salary = $total_salary + $rewards - $kasm;
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><? echo $record['employee'];?></td>
                            <td><? echo $record['degree_id'];?></td>
                            <td><? echo $record['salary'];?></td>
                            <td><? echo $record['b_naql'];?></td>
                            <td><? echo $record['b_eshraf'];?></td>
                            <td><? echo $record['b_amal'];?></td>
                            <td><? echo $record['b_etislat'];?></td>
                            <td><? echo ( $record['k_tamen'] ) ?></td>
                            <td><? echo $total_salary; ?></td>
                            <td><?php echo $rewards; ?></td>
                            <td><?php echo $kasm; ?></td>
                            <td><?php echo $safi_salary; ?></td>
                        </tr>
                        <?php
                        $a++;
                    endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------>
