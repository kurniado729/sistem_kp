<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> BKD</h1>

	<div class="row">
		<div class="col">
			<div class="col-xl-12 col-lg-5">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Data Surat BKD</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_bkd"></canvas>
						</div>
						<hr>
						Data Surat BKD
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sudah Di SPT</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_sudah_spt_bkd; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Di SPT</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_belum_spt_bkd; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="col-xl-12 col-lg-5">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Data Surat SPT</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_spt_ajukan_bkd"></canvas>
						</div>
						<hr>
						Data Surat SPT
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sudah Diajukan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_sudah_diajukan_spt_bkd; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Diajukan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_belum_diajukan_spt_bkd; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
