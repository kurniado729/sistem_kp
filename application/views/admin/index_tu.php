<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> TU</h1>

	<div class="row">
		<div class="col">
			<div class="col-xl-12 col-lg-5">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_masuk"></canvas>
						</div>
						<hr>
						Data Surat Masuk
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
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Surat Masuk</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk; ?></div>
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

	</div>

	<div class="row">
		<div class="col">
			<div class="col-xl-12 col-lg-5">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Data Disposisi Surat Masuk</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_disposisi_tu"></canvas>
						</div>
						<hr>
						Data Disposisi Surat Masuk
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
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Surat Masuk Sudah Disposisi</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk_sudah_disposisi; ?></div>
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
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Surat Masuk Sudah Disposisi</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_masuk_belum_disposisi; ?></div>
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
