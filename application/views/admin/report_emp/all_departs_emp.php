
<style>
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        text-align: center;
        vertical-align: middle;
    }
    table.table-depart{
        width: 100%;
    }
    table .thead-details th{
        background-color: #ece8e8;
        padding: 5px 0px;
        color: #000;
    }
    table .thead-depart th{
        background-color: #ece8e8;
        padding: 5px 0px;
        color: #840000;
    }
    table .thead-depart-middle th{
        background-color: #fff;
        padding: 5px 0px;
        color: #000;
    }
    table.table-depart tbody tr td{
        padding: 5px 0px;
    }
</style>



<?php if(isset($records)&&$records!=null):?>
    <div class="col-sm-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">  تقرير الموظفين</h3>
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
                    <table class="table-bordered table-striped table-depart">
                        <?php
                        foreach ($records as $row):?>
                        <thead class="thead-depart">
                        <th colspan="5"><?php echo $row->name;?></th>
                        </thead>
                        <?php
                        $query2 = $this->db->query('SELECT * FROM `department_jobs` WHERE `from_id_fk`=' . $row->id);
                        $arr = array();
                        foreach ($query2->result() as $row2) {
                            $arr[] = $row2;
                        }
                        ?>
                        <?php foreach ($arr as $record):
                        ?>
                        <thead class="thead-depart-middle">
                        <th colspan="5"><?php echo $record->name;?></th>
                        </thead>
                        <?php
                        $query3 = $this->db->query('SELECT * FROM `employees` WHERE `department`=' . $record->id);
                        $arr2 = array();
                        foreach ($query3->result() as $row3) {
                            $arr2[] = $row3;
                        }
                        if(!empty($arr2)):?>
                        <thead class="thead-details">
                        <th>م</th>
                        <th>إسم الموظف</th>
                        <th>رقم الهوية </th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        </thead>
                        <tbody>
                        <?php $count=0;foreach ($arr2  as $emp):$count++;?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $emp->employee;?></td>
                                <td><?php echo $emp->id_num;?></td>
                                <td><?php echo $emp->phone_num;?></td>
                                <td><?php echo $emp->address;?></td>
                            </tr>
                        <?php endforeach; endif;?>
                        <?php endforeach;?>
                        <?php endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php  endif;  ?>


<!--------------------------------------------------------------------->
