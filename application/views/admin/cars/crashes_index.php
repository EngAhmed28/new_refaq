


<!------------------------------------------------>

<div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">بيان الأعطال</h3>
        </div>
        <div class="panel-body">

            <div class="">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab3" data-toggle="tab">الأعطال التي لم يتم تصليحها </a></li>
                    <li><a href="#tab4" data-toggle="tab">الأعطال الجاري تصليحها</a></li>
                    <li><a href="#tab5" data-toggle="tab">الأعطال التي تم تصليحها</a></li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab3">

                        <?php    if(isset($table)&& $table!=null):?>
                            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr class="info">
                                    <th class="text-center">م</th>
                                    <th class="text-center">رقم السيارة</th>
                                    <th class="text-center">رقم العطل</th>
                                    <th class="text-center">إسم العطل</th>
                                    <th  class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                for($x = 0 ; $x < count($table) ; $x++){
                                    $totalTickets = array_sum(array_map("count", $table[key($table)]));

                                    echo '<tr>
                                                <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                                <td rowspan="'.$totalTickets.'">'.$cars[key($table)]->car_code.'</td>';
                                    for($a = 0 ; $a < count($table[key($table)]) ; $a++){
                                        echo   '<td rowspan="'.count($table[key($table)][key($table[key($table)])]).'">'.$table[key($table)][key($table[key($table)])][0]->crashe_num.'</td>';
                                        for($z = 0 ; $z < count($table[key($table)][key($table[key($table)])]) ; $z++){
                                            echo '  <td>'.$table[key($table)][key($table[key($table)])][$z]->crashe_name.'</td>
                                                        <td>
                                                            <a title="تم التصليح" href="'.base_url().'dashboard/crash_status/2/'.$table[key($table)][key($table[key($table)])][$z]->id.'" class="btn btn-success btn-circle m-b-5 btn-xs"> <i class="fa fa-check"></i> </a>
                
                                                            <a title="جاري التصليح" href="'.base_url().'dashboard/crash_status/1/'.$table[key($table)][key($table[key($table)])][$z]->id.'" class="btn btn-warning btn-circle m-b-5  btn-xs"> <i class="fa fa-cogs"></i> </a>
                                                        </td>
                                                      </tr>';
                                        }
                                        next($table[key($table)]);
                                    }
                                    next($table);
                                }
                                ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong> لا توجد أعطال لم يتم تصليحها</strong>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade" id="tab4">
                        <div class="panel-body">
                            <?php     if(isset($table1)&& $table1!=null):?>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th class="text-center">رقم السيارة</th>
                                        <th class="text-center">رقم العطل</th>
                                        <th class="text-center">إسم العطل</th>
                                        <th class="text-center">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    for($x = 0 ; $x < count($table1) ; $x++){
                                        $totalTickets = array_sum(array_map("count", $table1[key($table1)]));

                                        echo '<tr>
                                                <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                                <td rowspan="'.$totalTickets.'">'.$cars[key($table1)]->car_code.'</td>';
                                        for($a = 0 ; $a < count($table1[key($table1)]) ; $a++){
                                            echo   '<td rowspan="'.count($table1[key($table1)][key($table1[key($table1)])]).'">'.$table1[key($table1)][key($table1[key($table1)])][0]->crashe_num.'</td>';
                                            for($z = 0 ; $z < count($table1[key($table1)][key($table1[key($table1)])]) ; $z++){
                                                echo '  <td>'.$table1[key($table1)][key($table1[key($table1)])][$z]->crashe_name.'</td>
                                                        <td>
                                                            <a title="لم يتم التصليح" href="'.base_url().'dashboard/crash_status/0/'.$table1[key($table1)][key($table1[key($table1)])][$z]->id.'" class="btn btn-danger  btn-circle m-b-5 btn-xs"> <i class="fa fa-times"></i> </a>
                
                                                            <a title="تم التصليح" href="'.base_url().'dashboard/crash_status/2/'.$table1[key($table1)][key($table1[key($table1)])][$z]->id.'" class="btn btn-success btn-circle m-b-5  btn-xs"> <i class="fa fa-check"></i> </a>
                                                        </td>
                                                      </tr>';
                                            }
                                            next($table1[key($table1)]);
                                        }
                                        next($table1);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>لا توجد أعطال جاري تصليحها</strong>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab5">
                        <div class="panel-body">
                            <?php   if(isset($table2)&& $table2!=null):?>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th class="text-center">رقم السيارة</th>
                                        <th class="text-center">رقم العطل</th>
                                        <th class="text-center">إسم العطل</th>
                                        <th  class="text-center">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    for($x = 0 ; $x < count($table2) ; $x++){
                                        $totalTickets = array_sum(array_map("count", $table2[key($table2)]));

                                        echo '<tr>
                                                <td rowspan="'.$totalTickets.'">'.($x+1).'</td>
                                                <td rowspan="'.$totalTickets.'">'.$cars[key($table2)]->car_code.'</td>';
                                        for($a = 0 ; $a < count($table2[key($table2)]) ; $a++){
                                            echo   '<td rowspan="'.count($table2[key($table2)][key($table2[key($table2)])]).'">'.$table2[key($table2)][key($table2[key($table2)])][0]->crashe_num.'</td>';
                                            for($z = 0 ; $z < count($table2[key($table2)][key($table2[key($table2)])]) ; $z++){
                                                echo '  <td>'.$table2[key($table2)][key($table2[key($table2)])][$z]->crashe_name.'</td>
                                                        <td>
                                                            <a title="لم يتم التصليح" href="'.base_url().'dashboard/crash_status/0/'.$table2[key($table2)][key($table2[key($table2)])][$z]->id.'" class="btn btn-danger btn-circle m-b-5 btn-xs"> <i class="fa fa-times"></i> </a>
                
                                                            <a title="جاري التصليح" href="'.base_url().'dashboard/crash_status/1/'.$table2[key($table2)][key($table2[key($table2)])][$z]->id.'" class="btn btn-warning btn-circle m-b-5 btn-xs"> <i class="fa fa-cogs"></i> </a>
                                                        </td>
                                                      </tr>';
                                            }
                                            next($table2[key($table2)]);
                                        }
                                        next($table2);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>لا توجد أعطال تمت تصليحها</strong>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<style>
td { cursor: pointer; cursor: hand; }
</style>