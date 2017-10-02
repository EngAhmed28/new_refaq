<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from crm.thememinister.com/crmAdmin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jun 2017 08:05:32 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title> برنامج اداره </title>

<!-- Favicon and touch icons -->
<!--<link rel="shortcut icon" href="<?php echo base_url()?>asisst/admin_asset/img/ico/favicon.png" type="image/x-icon"> -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>asisst/admin_asset/favicon/favicon-16x16.png">
<!-- Bootstrap -->
<link href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- Bootstrap rtl -->
<!--<link href="bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
<!-- Pe-icon-7-stroke -->
<link href="<?php echo base_url()?>asisst/admin_asset/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
<!-- style css -->
<link href="<?php echo base_url()?>asisst/admin_asset/css/stylecrm.css" rel="stylesheet" type="text/css"/>
<!-- Theme style rtl -->
<!--<link href="css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url()?>asisst/admin_asset/css/animate.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url()?>asisst/admin_asset/css/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<!-- Content Wrapper -->
<section id="login-page">
<div class="login-wrapper">
<div class="back-link">
<div class="back-dash">
<a href="<?php echo base_url().'Web'?>" class="btn btn-add">الرجوع إلى الموقع</a>
</div>
</div>

<div class="container-center " >
<div class="wow bounceInDown" data-wow-delay="0.4s">
<img src="<?php echo base_url()?>asisst/admin_asset/img/arab-happy-saudi-man-displaying-banner-sign-isolated-white-background-44077908.jpg" class="holding-man" width="370">
<div class="login-area  " >
<div class="panel panel-bd panel-custom">
<div class="panel-heading">
<div class="view-header">
    <div class="header-icon">
        <i class="pe-7s-unlock"></i>
    </div>
    <div class="header-title">
        <h3>الدخول</h3>
        <?php if(isset($response) && !empty($response) && $response !=null):?>
            <small><strong><?php echo $response;?></strong></small>
        <?php else:?>
            <small><strong>الرجاء إدخال بيانات الاعتماد لتسجيل الدخول.</strong></small>
        <?php endif?>

    </div>
</div>
</div>
<div class="panel-body">
<?php echo form_open('login/check_login')?>
    <div class="form-group">
        <label class="control-label" for="username">إسم المستخدم</label>
        <input type="text"    name="user_name" id="username" class="form-control"   required="" placeholder="اسم المستخدم" title="اسم المستخدم" />
        <span class="help-block small">اسم المستخدم الفريد إلى التطبيق</span>
    </div>
    <div class="form-group">
        <label class="control-label" for="password"> كلمه المرور </label>
        <input type="password"    name="user_pass" id="password" class="form-control"  required=""  placeholder=" كلمه المرور "  title=" كلمه المرور "/>

    </div>
    <div>
        <button type="submit"  name="login" class="btn btn-add" >الدخول</button>
        <a class="btn btn-warning" href="#" style="float: left;">التسجيل</a>
    </div>
<?php  echo form_close()?>
</div>
</div>
</div>
</div>
<img src="<?php echo base_url()?>asisst/admin_asset/img/arab-man.png" class="bottom-man wow bounceInUp" >
</div>
</div>
<script language="javascript">
function autoResizeDiv()
{
document.getElementById('login-page').style.height = window.innerHeight +'px';
}
window.onresize = autoResizeDiv;
autoResizeDiv();
</script>

</section>

<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/wow.min.js" type="text/javascript"></script>
<script>
new WOW().init();
</script>
</body>

<!-- Mirrored from crm.thememinister.com/crmAdmin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jun 2017 08:05:32 GMT -->
</html>