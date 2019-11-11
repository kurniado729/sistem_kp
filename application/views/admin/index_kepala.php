<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> KEPALA</h1>

	<div class="row">
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Surat Disposisi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Disposisi BKD</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibkd'); ?>"><i class="fas fa-street-view fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Disposisi BKD</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibkd'); ?>"><i class="fas fa-street-view fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD Sudah Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_sudah_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibkd'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD Belum Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_belum_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibkd'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD Sudah Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_sudah_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibkd'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD Belum Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_belum_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibkd'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA Sudah Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_sudah_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibka'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA Belum Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_belum_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibka'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA Sudah Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_sudah_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibka'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA Belum Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_belum_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_disposisi/disposisibka'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Surat SPT</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas'); ?>"><i class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Surat SPT BKD</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas'); ?>"><i class="fas fa-street-view fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Surat SPT BKA</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas/sptbka'); ?>"><i class="fas fa-street-view fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Sudah Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_sudah_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Belum Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_sudah_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Sudah Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_sudah_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Belum Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_belum_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Sudah Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_sudah_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas/sptbka'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Belum Upload</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_sudah_upload; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas/sptbka'); ?>"><i class="fas fa-male fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Sudah Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_sudah_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas/sptbka'); ?>"><i class="fas fa-check fa-2x text-gray-300"></i></a>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Belum Disetujui</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_belum_disetujui; ?></div>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('surat_perintah_tugas/sptbka'); ?>"><i class="fas fa-times fa-2x text-gray-300"></i></a>
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
