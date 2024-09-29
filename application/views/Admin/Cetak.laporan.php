<html>
<head>
	<title>Data_Laporan_Stunting</title>
</head>
<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<style type="text/css">
		.logo{
			height: 120px;
			padding-left: 500px;
			text-align: center;
			justify-content: center; /* Horizontally centers the image */
			align-items: center; /* Vertically centers the image */
		}	
		.judul{
			padding-left: 320px;
		}
		.tabel_cetak_laporan{
			font-size: 10px !important;
		}
	</style>
	<div class="container">
		<div class="row">
			<center>
				<img src="<?php echo base_url() . "assets/Admin/"; ?>img/logo/logo_posyandu.png" class="logo">
			</center>
			
			<h3 class="judul">Laporan Stunting - Posyandu Mekarsari</h3>
			
		</div>
	</div>


	<hr>
	<style type="text/css">
		.tanggal{
			text-align: right;
			margin-right: 30px;
		}
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

	</style>
	<?php
	function format_tanggal_indo($tanggal) {
		$bulan = [
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];
		$tanggal_split = explode('-', $tanggal);
		return $tanggal_split[2] . ' ' . $bulan[(int)$tanggal_split[1]] . ' ' . $tanggal_split[0];
	}
	?>
	<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
	<center>
		<h3> Data Laporan Stunting </h3>
	</center>
	<table class="tabel_cetak_laporan">
		<thead>
			<tr>
				<th>No.</th>
				<th>Tanggal</th>
				<th>No Pendataan</th>
				<th>Balita</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Nama Ayah</th>
				<th>Nama Ibu</th>
				<th>Alamat</th>
				<th>Keterangan Stunting</th>
				<th>Nama Posyandu</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($laporan->result_array() as $data): ?>
				<tr>
					<td><?php echo $no++?></td>
					<td>
						<?php
						$date = $data['waktu'];
						$formattedDate = date('d F Y', strtotime($date)); 
						?>
						<?php echo $formattedDate; ?></td>
						<td><?php echo $data['no_pendataan']; ?></td>
						<td><?php echo $data['nama_balita']; ?></td>
						<td><?php echo $data['jenis_kelamin']; ?></td>
						<td><?php echo $data['tgl_lahir']; ?></td>
						<td><?php echo $data['nama_ayah']; ?></td>
						<td><?php echo $data['nama_ibu']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td>
							<?php 
							$status = $data['status_stunting'];
							if ($status == '1') { ?>
								Stunting Parah
							<?php }elseif($status == '2'){ ?>
								Stunting
							<?php }else{?>
								Normal
							<?php }?>
						</td>
						<td><?php echo $data['kader'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<script type="text/javascript">
			window.print();
		</script>
		


</body>
</html>