<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> TU</h1>

	<div class="row">
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Surat Masuk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Trash</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $trash; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_masuk/trash'); ?>"><i class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Surat Masuk SUdah Didisposisi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk_sudah_disposisi; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Surat Masuk SUdah Didisposisi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk_belum_disposisi; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_masuk'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
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
