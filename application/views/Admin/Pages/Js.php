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
<!-- Page level custom scripts -->
<script>
	$(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>