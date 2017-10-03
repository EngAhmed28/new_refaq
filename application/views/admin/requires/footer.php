
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong> جميع الحقوق &copy; محفوظة لدى شركة <a href="#">الأثير تك لتكنولوجيا المعلومات</a>.</strong> .
</footer>
</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
    =====================================================================-->
<!-- jQuery -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap.min.js" type="text/javascript"></script>
<!-- lobipanel -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<!-- Pace js -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
<!-- FastClick -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- CRMadmin frame -->
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.datetimepicker.full.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-select.min.js"></script>


<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js" type="text/javascript"></script>
<!-- End Core Plugins
    =====================================================================-->
<!-- Start Page Lavel Plugins
    =====================================================================-->
<!-- ChartJs JavaScript -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- Counter js -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/counterup/waypoints.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<!-- Monthly js -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/monthly/monthly.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
    =====================================================================-->
<!-- Start Theme label Script
    =====================================================================-->
<!-- Dashboard js -->
  <!-- iCheck js -->
      <script src="<?php echo base_url()?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
      <!-- Bootstrap toggle -->
<!-- Modal js -->
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/modals/classie.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/plugins/modals/modalEffects.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
   =====================================================================-->
<!-- Start Theme label Script
   =====================================================================-->
<!-- Dashboard js -->



<script src="<?php echo base_url()?>asisst/admin_asset/js/dashboard.js" type="text/javascript"></script>
<!-- End Theme label Script
    =====================================================================-->

<script src="<?php echo base_url()?>asisst/admin_asset/js/wow.min.js" type="text/javascript"></script>


<script>
	function dash() {
		// single bar chart
		var ctx = document.getElementById("singelBarChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
				datasets: [
					{
						label: "My First dataset",
						data: [40, 55, 75, 81, 56, 55, 40],
						borderColor: "rgba(0, 150, 136, 0.8)",
						width: "1",
						borderWidth: "0",
						backgroundColor: "rgba(0, 150, 136, 0.8)"
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
		//monthly calender
		$('#m_calendar').monthly({
			mode: 'event',
			//jsonUrl: 'events.json',
			//dataType: 'json'
			xmlUrl: 'events.xml'
		});

		//bar chart
		var ctx = document.getElementById("barChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
				datasets: [
					{
						label: "My First dataset",
						data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
						borderColor: "rgba(0, 150, 136, 0.8)",
						width: "1",
						borderWidth: "0",
						backgroundColor: "rgba(0, 150, 136, 0.8)"
					},
					{
						label: "My Second dataset",
						data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
						borderColor: "rgba(51, 51, 51, 0.55)",
						width: "1",
						borderWidth: "0",
						backgroundColor: "rgba(51, 51, 51, 0.55)"
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
		//counter
		$('.count-number').counterUp({
			delay: 10,
			time: 5000
		});
	}
	dash();
</script>
<script>
	new WOW().init();
	$('.some_class').datetimepicker();
	$('.some_class_2').datepicker();
</script>
      <script>
         $('.skin-minimal .i-check input').iCheck({
             checkboxClass: 'icheckbox_minimal',
             radioClass: 'iradio_minimal',
             increaseArea: '20%'
         });
         
         $('.skin-square .i-check input').iCheck({
             checkboxClass: 'icheckbox_square-green',
             radioClass: 'iradio_square-green'
         });
         
         
         $('.skin-flat .i-check input').iCheck({
             checkboxClass: 'icheckbox_flat-red',
             radioClass: 'iradio_flat-red'
         });
         
         $('.skin-line .i-check input').each(function () {
             var self = $(this),
                     label = self.next(),
                     label_text = label.text();
         
             label.remove();
             self.iCheck({
                 checkboxClass: 'icheckbox_line-blue',
                 radioClass: 'iradio_line-blue',
                 insert: '<div class="icheck_line-icon"></div>' + label_text
             });
         });
         
      </script>
</body>

<!-- Mirrored from crm.thememinister.com/crmAdmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jun 2017 08:04:45 GMT -->
</html>

