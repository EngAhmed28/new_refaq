
<?php if(isset($records) && $records != null ){?>
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
        <div class="table-responsive" >
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center">م</th>
            <th class="text-center">تاريخ اليوم</th>
            <th class="text-center">نوع التبرع</th>
            <th class="text-center">الإسم</th>
            <th class="text-center">رقم الهاتف</th>
            <th class="text-center">رقم البطاقة</th>
            <th class="text-center">القيمة</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php $a=1;foreach ($records as $record ):?>
            <tr>
                <td><?php echo $a ?></td>
                <td> <?php echo  date('Y-m-d',$record->date); ?></td>
                <?php
                $type='';
                $name='';
                $phone='';
                $card_id='';
                if ($record->donate_type_id_fk ==1){
                    $type='متبرع';
                    $name=$get_name[$record->person_id]->user_name;
                    $phone=$get_name[$record->person_id]->guaranty_mob;
                    $card_id=$get_name[$record->person_id]->national_id_fk;
                }elseif($record->donate_type_id_fk ==2){
                    $type='غيرذلك';
                    $name=$record->name;
                    $phone=$record->mob;
                    $card_id=$record->card_id;
                }elseif($record->donate_type_id_fk ==3){
                    $type='كفيل';
                    $name=$get_name[$record->person_id]->user_name;
                    $phone=$get_name[$record->person_id]->guaranty_mob;
                    $card_id=$get_name[$record->person_id]->national_id_fk;
                }
                if(empty($card_id)){
                    $card_id ='لا يوجد';
                }
                if(empty($phone)){
                    $phone ='لا يوجد';
                }
                ?>
                <td> <?php echo $type; ?></td>
                <td> <?php echo $name; ?></td>
                <td> <?php echo $phone; ?></td>
                <td> <?php echo $card_id; ?></td>
                <td> <?php echo $record->value ?></td>
            </tr>
            <?php $a++;endforeach;  ?>
        </tbody>
    </table>
    </div>
  </div>
 </div>
<?php
}else{
echo '<div class="alert alert-danger alert-dismissible" role="alert" style="width: 100%;margin-top: 60px">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا يوجد تبرع يومي
</div>';
 }?>
 