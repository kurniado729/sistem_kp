<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> BKD</h1>

	<div class="row">
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Surat Masuk</div>
<!--							<div class="h5 mb-0 font-weight-bold text-gray-800">--><?//= count($surat_masuk); ?><!--</div>-->
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pegawai TU</div>
<!--							<div class="h5 mb-0 font-weight-bold text-gray-800">--><?//= count($pegawai_tu); ?><!--</div>-->
						</div>
						<div class="col-auto">
							<a href="<?= base_url('pegawai'); ?>"><i class="fas fa-street-view fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pegawai BKD</div>
<!--							<div class="h5 mb-0 font-weight-bold text-gray-800">--><?//= count($pegawai_bkd); ?><!--</div>-->
						</div>
						<div class="col-auto">
							<a href="<?= base_url('pegawai/pegawaibkd'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pegawai BKA</div>
<!--							<div class="h5 mb-0 font-weight-bold text-gray-800">--><?//= count($pegawai_bka); ?><!--</div>-->
						</div>
						<div class="col-auto">
							<a href="<?= base_url('pegawai/pegawaibka'); ?>"><i class="fas fa-child fa-2x text-gray-300"></i></a>
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
