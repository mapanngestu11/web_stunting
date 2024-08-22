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
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/demo/chart-bar-demo.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/demo/chart-pie-demo.js"></script>
<!-- Page level custom scripts -->
<script>
	$(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
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

