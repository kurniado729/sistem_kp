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
								<span
									class="badge badge-danger badge-counter"><?= $hitung_surat_masuk_belum_disposisi; ?></span>
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
									<a href="http://localhost/sistem_kp/surat_masuk"
									   class="dropdown-item d-flex align-items-center">
										<div class="font-weight-bold">
											<div class="text-truncate"><?= $smbd['pengirim'] ?>.</div>
											<div class="small text-gray-500"><?= $smbd['ringkasan'] ?>.</div>
										</div>
									</a>
								<?php endforeach; ?>
							<?php else: ?>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="font-weight-bold">
										<div class="">Belum ada surat untuk didisposisi</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php elseif ($this->uri->segment(1) == 'surat_disposisi'): ?>
				<?php if ($this->uri->segment(2) == NULL OR $this->uri->segment(2) == 'searchdisposisi' OR $this->uri->segment(2) == 'index'): ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_surat_disposisi_belum_ditujukan == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_ditujukan; ?></span>
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
										<a class="dropdown-item d-flex align-items-center"
										   href="http://localhost/sistem_kp/surat_disposisi">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sdbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sdbd['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada surat untuk didisposisi</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
				<?php elseif ($this->uri->segment(2) == 'disposisibkd' OR $this->uri->segment(2) == 'uploaddisposisibkd' OR $this->uri->segment(2) == 'searchdisposisibkd'): ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_surat_disposisi_bkd_belum_disetujui == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_bkd_belum_disetujui; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat Disposisi
								</h6>
								<?php if ($surat_disposisi_bkd_belum_disetujui): ?>
									<?php foreach ($surat_disposisi_bkd_belum_disetujui as $sdbbd) : ?>
										<a class="dropdown-item d-flex align-items-center"
										   href="http://localhost/sistem_kp/surat_disposisi">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sdbbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sdbbd['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada surat disposisi untuk disetujui</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
				<?php else: ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_surat_disposisi_bka_belum_disetujui == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_bka_belum_disetujui; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat Disposisi
								</h6>
								<?php if ($surat_disposisi_bka_belum_disetujui): ?>
									<?php foreach ($surat_disposisi_bka_belum_disetujui as $sdbbd) : ?>
										<a class="dropdown-item d-flex align-items-center"
										   href="http://localhost/sistem_kp/surat_disposisi">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sdbbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sdbbd['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada surat disposisi untuk disetujui</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
				<?php endif; ?>

				<?php elseif ($this->uri->segment(1) == 'bkd'): ?>
				<?php if ($this->uri->segment(2) == NULL OR $this->uri->segment(2) == 'addsuratperintahjalan' OR $this->uri->segment(2) == 'index' OR $this->uri->segment(2) == 'searchbkd'): ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_surat_disposisi_belum_spt == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_spt; ?></span>
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
										<a class="dropdown-item d-flex align-items-center"
										   href="http://localhost/sistem_kp/bkd">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sdbs['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sdbs['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada spt yang harus dibuat</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
				<?php else: ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_surat_disposisi_belum_ajukan_spt == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_ajukan_spt; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat BKD
								</h6>
								<?php if ($surat_disposisi_belum_ajukan_spt): ?>
									<?php foreach ($surat_disposisi_belum_ajukan_spt as $sdbas) : ?>
										<a class="dropdown-item d-flex align-items-center"
										   href="http://localhost/sistem_kp/bkd">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sdbas['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sdbas['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada spt yang harus diajukan</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
				<?php endif; ?>
				<?php elseif ($this->uri->segment(1) == 'bka'): ?>
				<?php if ($this->uri->segment(2) == NULL OR $this->uri->segment(2) == 'addsuratperintahjalan'  OR $this->uri->segment(2) == 'index' OR $this->uri->segment(2) == 'searchbka'): ?>
					<!-- Nav Item - Messages -->
					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<!-- Counter - Messages -->
							<?php if ($hitung_surat_disposisi_belum_spt == '0'): ?>
								<span class="badge badge-danger badge-counter"></span>
							<?php else: ?>
								<span
									class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_spt; ?></span>
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
										<div class="">Belum ada spt yang harus dibuat</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</li>
					<?php else: ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_surat_disposisi_belum_ajukan_spt == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_surat_disposisi_belum_ajukan_spt; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat BKD
								</h6>
								<?php if ($surat_disposisi_belum_ajukan_spt): ?>
									<?php foreach ($surat_disposisi_belum_ajukan_spt as $sdbas) : ?>
										<a class="dropdown-item d-flex align-items-center"
										   href="http://localhost/sistem_kp/bkd">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sdbas['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sdbas['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada spt yang harus diajukan</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
					<?php endif; ?>
				<?php elseif ($this->uri->segment(1) == 'surat_perintah_tugas'): ?>
					<?php if ($this->uri->segment(2) == NULL OR $this->uri->segment(2) == 'formuploadsptbkd' OR $this->uri->segment(2) == 'index' OR $this->uri->segment(2) == 'searchpersetujuansptbkd'): ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_spt_bkd_belum_disetujui == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_spt_bkd_belum_disetujui; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat Perintah Tugas
								</h6>
								<?php if ($spt_bkd_belum_disetujui): ?>
									<?php foreach ($spt_bkd_belum_disetujui as $sbbd) : ?>
										<a class="dropdown-item d-flex align-items-center" href="#">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sbbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sbbd['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada SPT yang harus disetujui</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
					<?php else: ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_spt_bka_belum_disetujui == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_spt_bka_belum_disetujui; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Surat Perintah Tugas
								</h6>
								<?php if ($spt_bka_belum_disetujui): ?>
									<?php foreach ($spt_bka_belum_disetujui as $sbbd) : ?>
										<a class="dropdown-item d-flex align-items-center" href="#">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $sbbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $sbbd['ringkasan'] ?>.</div>
											</div>
										</a>
									<?php endforeach; ?>
								<?php else: ?>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="font-weight-bold">
											<div class="">Belum ada SPT yang harus disetujui</div>
										</div>
									</a>
								<?php endif; ?>
							</div>
						</li>
					<?php endif; ?>

				<?php elseif ($this->uri->segment(1) == 'kontrol_spt'): ?>
					<?php if ($this->uri->segment(2) == NULL OR $this->uri->segment(2) == 'uploadsptbkdlengkap' OR $this->uri->segment(2) == 'searchkontrolsptbkd' OR $this->uri->segment(2) == 'index'): ?>
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_spt_lengkap_bkd_belum_diupload == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_spt_lengkap_bkd_belum_diupload; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Kontrol SPT
								</h6>
								<?php if ($spt_lengkap_bkd_belum_diupload): ?>
									<?php foreach ($spt_lengkap_bkd_belum_diupload as $slbbd) : ?>
										<a class="dropdown-item d-flex align-items-center" href="#">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $slbbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $slbbd['ringkasan'] ?>.</div>
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
						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<?php if ($hitung_spt_lengkap_bka_belum_diupload == '0'): ?>
									<span class="badge badge-danger badge-counter"></span>
								<?php else: ?>
									<span
										class="badge badge-danger badge-counter"><?= $hitung_spt_lengkap_bka_belum_diupload; ?></span>
								<?php endif; ?>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
								 aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Kontrol SPT
								</h6>
								<?php if ($spt_lengkap_bka_belum_diupload): ?>
									<?php foreach ($spt_lengkap_bka_belum_diupload as $slbbd) : ?>
										<a class="dropdown-item d-flex align-items-center" href="#">
											<div class="font-weight-bold">
												<div class="text-truncate"><?= $slbbd['pengirim'] ?>.</div>
												<div class="small text-gray-500"><?= $slbbd['ringkasan'] ?>.</div>
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
					<?php endif; ?>

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
