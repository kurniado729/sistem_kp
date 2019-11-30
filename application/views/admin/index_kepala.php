<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?> KEPALA</h1>


	<div class="row">
		<div class="col">
			<div class="col-xl-12 col-lg-5">
				<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Data Surat Disposisi</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_disposisi"></canvas>
						</div>
						<hr>
						Data Surat Disposisi
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BKD</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
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
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BKA</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
						<h6 class="m-0 font-weight-bold text-primary">Data Surat Disposisi</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_disposisi_bkd"></canvas>
						</div>
						<hr>
						Data Surat Disposisi BKD
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD
									Sudah Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_sudah_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD
									Belum Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_belum_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD
									Sudah Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_sudah_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKD
									Belum Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bkd_belum_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
						<h6 class="m-0 font-weight-bold text-primary">Data Surat Disposisi</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_disposisi_bka"></canvas>
						</div>
						<hr>
						Data Surat Disposisi BKA
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA
									Sudah Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_sudah_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA
									Belum Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_belum_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA
									Sudah Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_sudah_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Disposisi BKA
									Belum Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_disposisi_bka_belum_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
							<canvas id="surat_spt"></canvas>
						</div>
						<hr>
						Data Surat SPT
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-6 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BKD</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
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
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">BKA</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
						<h6 class="m-0 font-weight-bold text-primary">Data Surat SPT BKD</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_spt_bkd"></canvas>
						</div>
						<hr>
						Data Surat SPT BKD
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Sudah
									Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_sudah_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Belum
									Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_belum_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Sudah
									Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_sudah_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKD Belum
									Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bkd_belum_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
						<h6 class="m-0 font-weight-bold text-primary">Data Surat SPT BKD</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-pie pt-4">
							<canvas id="surat_spt_bka"></canvas>
						</div>
						<hr>
						Data Surat SPT BKD
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Sudah
									Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_sudah_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Belum
									Upload
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_belum_upload; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-envelope-open-text fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Sudah
									Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_sudah_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">SPT BKA Belum
									Disetujui
								</div>
								<div
									class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat_spt_bka_belum_disetujui; ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('surat_masuk'); ?>"><i
										class="fas fa-trash-alt fa-2x text-gray-300"></i></a>
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
