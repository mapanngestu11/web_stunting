<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/ruang-admin.min.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/demo/chart-area-demo.js"></script>  


<!-- Page level plugins -->
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- <script src="<?php echo base_url() . "assets/Admin/"; ?>js/demo/chart-bar-demo.js"></script> -->
<!-- <script src="<?php echo base_url() . "assets/Admin/"; ?>js/demo/chart-pie-demo.js"></script> -->
<!-- Page level custom scripts -->
<script>
	$(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>

<script type="text/javascript">
	// Set new default font family and font color to mimic Bootstrap's default styling
	Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = '#858796';

	function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
  	var k = Math.pow(10, prec);
  	return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
  	s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
  	s[1] = s[1] || '';
  	s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ["January", "February", "March", "April", "May", "June","Juli","Agustus","September","Oktober","November","Desember"],
		datasets: [{
			label: "Jumlah Data Balita",
			backgroundColor: "#4e73df",
			hoverBackgroundColor: "#2e59d9",
			borderColor: "#4e73df",
			data: [
			<?php echo $jumlah_data_januari[0]->jumlah ;?>,
			<?php echo $jumlah_data_februari[0]->jumlah ;?>,
			<?php echo $jumlah_data_maret[0]->jumlah ;?>,
			<?php echo $jumlah_data_april[0]->jumlah ;?>,
			<?php echo $jumlah_data_mei[0]->jumlah ;?>,
			<?php echo $jumlah_data_juni[0]->jumlah ;?>,
			<?php echo $jumlah_data_juli[0]->jumlah ;?>,
			<?php echo $jumlah_data_agustus[0]->jumlah ;?>,
			<?php echo $jumlah_data_september[0]->jumlah ;?>,
			<?php echo $jumlah_data_oktober[0]->jumlah ;?>,
			<?php echo $jumlah_data_november[0]->jumlah ;?>,
			<?php echo $jumlah_data_desember[0]->jumlah ;?>],
		}],
	},
	options: {
		maintainAspectRatio: false,
		layout: {
			padding: {
				left: 5,
				right: 5,
				top: 5,
				bottom: 0
			}
		},
		scales: {
			xAxes: [{
				time: {
					unit: 'month'
				},
				gridLines: {
					display: false,
					drawBorder: false
				},
				ticks: {
					maxTicksLimit: 12
				},
				maxBarThickness: 25,
			}],
			yAxes: [{
				ticks: {
					min: 0,
					max: 10,
					maxTicksLimit: 5,
					padding: 10,
          // Include a dollar sign in the ticks
          // callback: function(value, index, values) {
          // 	return '' + number_format(value);
          // }
      },
      gridLines: {
      	color: "rgb(234, 236, 244)",
      	zeroLineColor: "rgb(234, 236, 244)",
      	drawBorder: false,
      	borderDash: [2],
      	zeroLineBorderDash: [2]
      }
  }],
},
legend: {
	display: false
},
tooltips: {
	titleMarginBottom: 10,
	titleFontColor: '#6e707e',
	titleFontSize: 14,
	backgroundColor: "rgb(255,255,255)",
	bodyFontColor: "#858796",
	borderColor: '#dddfeb',
	borderWidth: 1,
	xPadding: 15,
	yPadding: 15,
	displayColors: false,
	caretPadding: 10,
	callbacks: {
		label: function(tooltipItem, chart) {
			var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
			return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
		}
	}
},
}
});

</script>

<script type="text/javascript">
	// Set new default font family and font color to mimic Bootstrap's default styling
	Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: ["Jumlah Balita Normal", "Balita Stunting"],
		datasets: [{
			data: [
			<?php echo $jumlah_data_normal[0]->jumlah ;?>,
			<?php echo $jumlah_data_stunting[0]->jumlah ;?>],
			backgroundColor: ['#4e73df', '#fc544b'],
			hoverBackgroundColor: ['#2e59d9', '#fc544b'],
			hoverBorderColor: "rgba(234, 236, 244, 1)",
		}],
	},
	options: {
		maintainAspectRatio: false,
		tooltips: {
			backgroundColor: "rgb(255,255,255)",
			bodyFontColor: "#858796",
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
		},
		legend: {
			display: false
		},
		cutoutPercentage: 80,
	},
});

</script>


<script src="<?php echo base_url() . "assets/admin/"; ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() . "assets/admin/"; ?>plugins/toastr/toastr.min.js"></script>


<?php if ($this->session->flashData('msg') == 'success_update') :  ?>
	<script type="text/javascript">
		$(function() {
			var Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 6000
			});

			Toast.fire({
				icon: 'success',
				title: 'Data Berhasil Di Update !'
			})

		});
	</script>
	<?php elseif ($this->session->flashData('msg') == 'success') : ?>
		<script type="text/javascript">
			$(function() {
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 6000
				});

				Toast.fire({
					icon: 'success',
					title: 'Data Berhasil Di Tambahkan !'
				})

			});
		</script>

		<?php elseif ($this->session->flashData('msg') == 'success_hapus') : ?>
			<script type="text/javascript">
				$(function() {
					var Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 6000
					});

					Toast.fire({
						icon: 'success',
						title: 'Data Berhasil Di Hapus !'
					})

				});
			</script>

			<?php elseif ($this->session->flashData('msg') == 'warning') : ?>
				<script type="text/javascript">
					$(function() {
						var Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 6000
						});

						Toast.fire({
							icon: 'danger',
							title: 'Gagal, Periksa Format File atau input ulang !'
						})

					});
				</script>

				<?php else : ?>

				<?php endif; ?>

