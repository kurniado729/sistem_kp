<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<?php if ($this->uri->segment(1) == 'surat_masuk'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_surat_masuk_belum_disposisi == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span class="badge badge-danger badge-counter"><?= $hitung_surat_masuk_belum_disposisi; ?></span>
							<?php endif; ?>
						</a>
						<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat Masuk
								</h6>
								<?php if ($surat_masuk_belum_disposisi): ?>
								<?php foreach ($surat_masuk_belum_disposisi as $smbd) : ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="text-truncate"><?= $smbd['pengirim'] ?>.</div>
											<div class="small text-gray-500"><?= $smbd['ringkasan'] ?>.</div>
										</div>
									</a>
								<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="text-truncate">tidak ada data</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
					</li>
				<?php elseif($this->uri->segment(1) == 'surat_disposisi'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_surat_disposisi_belum_ditujukan == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_ditujukan; ?></span>
							<?php endif; ?>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
							 aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">
								Surat Disposisi
							</h6>
							<?php if ($surat_disposisi_belum_ditujukan): ?>
							<?php foreach ($surat_disposisi_belum_ditujukan as $sdbd) : ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate"><?= $sdbd['pengirim'] ?>.</div>
										<div class="small text-gray-500"><?= $sdbd['ringkasan'] ?>.</div>
									</div>
								</a>
							<?php endforeach; ?>
							<?php else: ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate">tidak ada data</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php elseif($this->uri->segment(1) == 'bkd'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_surat_disposisi_belum_spt == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_spt; ?></span>
							<?php endif; ?>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
							 aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">
								Surat BKD
							</h6>
							<?php if ($surat_disposisi_belum_spt): ?>
							<?php foreach ($surat_disposisi_belum_spt as $sdbs) : ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate"><?= $sdbs['pengirim'] ?>.</div>
										<div class="small text-gray-500"><?= $sdbs['ringkasan'] ?>.</div>
									</div>
								</a>
							<?php endforeach; ?>
							<?php else: ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate">tidak ada data</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php elseif($this->uri->segment(1) == 'bka'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_surat_disposisi_belum_spt == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_spt; ?></span>
							<?php endif; ?>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
							 aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">
								Surat BKA
							</h6>
							<?php if ($surat_disposisi_belum_spt): ?>
							<?php foreach ($surat_disposisi_belum_spt as $sdbs) : ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate"><?= $sdbs['pengirim'] ?>.</div>
										<div class="small text-gray-500"><?= $sdbs['ringkasan'] ?>.</div>
									</div>
								</a>
							<?php endforeach; ?>
							<?php else: ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate">tidak ada data</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php elseif($this->uri->segment(1) == 'surat_perintah_tugas'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_spt_belum_disetujui == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span class="badge badge-danger badge-counter"><?= $hitung_spt_belum_disetujui; ?></span>
							<?php endif; ?>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
							 aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">
								Surat Perintah Tugas
							</h6>
							<?php if ($spt_belum_disetujui): ?>
							<?php foreach ($spt_belum_disetujui as $sbd) : ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate"><?= $sbd['pengirim'] ?>.</div>
										<div class="small text-gray-500"><?= $sbd['ringkasan'] ?>.</div>
									</div>
								</a>
							<?php endforeach; ?>
							<?php else: ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate">tidak ada data</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php elseif($this->uri->segment(1) == 'kontrol_spt'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_spt_lengkap_belum_diupload == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span class="badge badge-danger badge-counter"><?= $hitung_spt_lengkap_belum_diupload; ?></span>
							<?php endif; ?>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
							 aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">
								Kontrol SPT
							</h6>
							<?php if ($spt_lengkap_belum_diupload): ?>
							<?php foreach ($spt_lengkap_belum_diupload as $slbd) : ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate"><?= $slbd['pengirim'] ?>.</div>
										<div class="small text-gray-500"><?= $slbd['ringkasan'] ?>.</div>
									</div>
								</a>
							<?php endforeach; ?>
							<?php else: ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="text-truncate">tidak ada data</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php else: ?>

				<?php endif; ?>

				<div class="topbar-divider d-none d-sm-block"></div>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
					   aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'] ?></span>
						<img class="img-profile rounded-circle"
							 src="<?= base_url('assets/img/profile/') . $user['image'] ?>">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
						 aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							My Profile
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal"
						   data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->
