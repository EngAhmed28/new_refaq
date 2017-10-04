
<!------------------------------------------------>

    <div class="col-sm-12 fadeInUp wow" data-wow-delay="0.3s">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">إعتماد الأجازات</h3>
            </div>
            <div class="panel-body">

                <div class="">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab3" data-toggle="tab">الاجازات الوارده </a></li>
                        <li><a href="#tab4" data-toggle="tab">الاجازات المقبوله</a></li>
                        <li><a href="#tab5" data-toggle="tab">الاجازات المرفوضه</a></li>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab3">

                                <?php if(isset($vacation_recived)&& $vacation_recived!=null && !empty($vacation_recived)):?>
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>م</th>
                                            <th class="text-center">اسم الموظف</th>
                                            <th class="text-center">الموظف القائم بالعمل</th>
                                            <th class="text-center">مدة الاجازة</th>
                                            <th  class="text-center">تاريخ البداية </th>
                                            <th  class="text-center">تاريخ النهاية</th>
                                            <th  class="text-center">الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        $a=1;
                                        foreach ($vacation_recived as $record ):
                                            $date1 = new DateTime($record->from_date);
                                            $date2 = new DateTime($record->to_date);
                                            $diff = $date2->diff($date1)->format("%a");
                                            ?>
                                            <tr>
                                                <td><?php echo $a ?></td>
                                                <td ><?php echo $record->emp_name ?></td>
                                                <td ><?php echo $record->emp_assigned_name?></td>
                                                <td ><?php echo $diff; ?></td>
                                                <td ><?php echo $record->from_date ?></td>
                                                <td ><?php echo $record->to_date ?></td>
                                                <td>
                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/1'?>" title="موافق">
                                                        <button type="button" class="btn btn-success btn-circle m-b-5"><i class="glyphicon glyphicon-ok"></i></button> </a>
                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/2'?>"title="مرفوض">
                                                        <button type="button" class="btn btn-danger btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></button> </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;
                                        endforeach;  ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-danger" > لا يوجد اجازات واردة </div>
                                <?php endif; ?>
                            </div>

                        <div class="tab-pane fade" id="tab4">
                            <div class="panel-body">
                                <?php if(isset($vacation_accept)&& $vacation_accept!=null && !empty($vacation_accept)):?>
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>م</th>
                                            <th class="text-center">اسم الموظف</th>
                                            <th class="text-center">الموظف القائم بالعمل</th>
                                            <th class="text-center">مدة الاجازة</th>
                                            <th  class="text-center">تاريخ البداية </th>
                                            <th  class="text-center">تاريخ النهاية</th>
                                            <th  class="text-center">الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        $a=1;
                                        foreach ($vacation_accept as $record ):
                                            $date1 = new DateTime($record->from_date);
                                            $date2 = new DateTime($record->to_date);
                                            $diff = $date2->diff($date1)->format("%a");
                                            ?>
                                            <tr>
                                                <td><?php echo $a ?></td>
                                                <td ><?php echo $record->emp_name ?></td>
                                                <td ><?php echo $record->emp_assigned_name?></td>
                                                <td ><?php echo $diff; ?></td>
                                                <td ><?php echo $record->from_date ?></td>
                                                <td ><?php echo $record->to_date ?></td>
                                                <td>
                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع">
                                                        <button type="button" class="btn btn-purple btn-circle m-b-5"><i class="glyphicon glyphicon-repeat"></i></button></a>
                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/2'?>"title="مرفوض">
                                                        <button type="button" class="btn btn-danger btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></button> </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;
                                        endforeach;  ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-danger" >لا يوجد اجازات مقبولة</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab5">
                            <div class="panel-body">
                                <?php if(isset($vacation_refuse)&& $vacation_refuse!=null && !empty($vacation_refuse)):?>
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>م</th>
                                            <th class="text-center">اسم الموظف</th>
                                            <th class="text-center">الموظف القائم بالعمل</th>
                                            <th class="text-center">مدة الاجازة</th>
                                            <th  class="text-center">تاريخ البداية </th>
                                            <th  class="text-center">تاريخ النهاية</th>
                                            <th  class="text-center">الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        $a=1;
                                        foreach ($vacation_refuse as $record ):
                                            $date1 = new DateTime($record->from_date);
                                            $date2 = new DateTime($record->to_date);
                                            $diff = $date2->diff($date1)->format("%a");
                                            ?>
                                            <tr>
                                                <td><?php echo $a ?></td>
                                                <td ><?php echo $record->emp_name ?></td>
                                                <td ><?php echo $record->emp_assigned_name?></td>
                                                <td ><?php echo $diff; ?></td>
                                                <td ><?php echo $record->from_date ?></td>
                                                <td ><?php echo $record->to_date ?></td>
                                                <td>
                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع">
                                                        <button type="button" class="btn btn-purple btn-circle m-b-5"><i class="glyphicon glyphicon-repeat"></i></button></a>
                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/1'?>"title="موافق">
                                                        <button type="button" class="btn btn-success btn-circle m-b-5"><i class="glyphicon glyphicon-ok"></i></button> </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;
                                        endforeach;  ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-danger" > لا يوجد اجازات مرفوضة </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

