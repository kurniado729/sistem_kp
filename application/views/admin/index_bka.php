<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> BKA</h1>

	<div class="row">
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Surat BKA</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('bka'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sudah Di SPT</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_sudah_spt_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('bka'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum DI SPT</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_belum_spt_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('bka'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT Sudah Diajukan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_sudah_diajukan_spt_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('bka/spt'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT Belum Diajukan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_belum_diajukan_spt_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('bka/spt'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
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
