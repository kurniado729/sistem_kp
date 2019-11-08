<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message') ?>

			<div class="row">
				<div class="col">
					<div class="row mt-2">
						<div class="col-7 ">
							<form action="<?= base_url('surat_disposisi/searchdisposisibkd') ?>" method="post">
								<div class="input-group">
									<div class="input-group-prepend bg-light">
										<label class="input-group-text bg-light font-weight-light small" for="kategori">Cari
											Berdasarkan</label>
									</div>
									<select name="kategori" id="kategori" style="width: 150px;" class="custom-select">
										<option value="pengirim">Pengirim</option>
										<option value="no_surat_masuk">No Surat</option>
										<!--										<option value="cari">Cari</option>-->
									</select>
									<input name="keyword" id="keyword" autocomplete="off" type="text" class="w-50 form-control"
										   placeholder="Kata Kunci">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<table class="table table-hover">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Pengirim</th>
					<th scope="col">No Surat</th>
					<th scope="col">Tanggal Surat</th>
					<th scope="col">Ringkasan</th>
					<th scope="col">Kebutuhan Surat</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php foreach ($surat_disposisi as $sd) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sd['pengirim'] ?></td>
						<td><?= $sd['no_surat_masuk'] ?></td>
						<td><?= $sd['tgl_surat_masuk'] ?></td>
						<td><?= $sd['ringkasan'] ?></td>
						<td>
							<a href="<?= base_url('surat_disposisi/viewdisposisimail/' . $sd['id_surat_disposisi']); ?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat Disposisi">
								<i class="fas fa-envelope-open"></i></a>
							</a>
							<?php if ($sd['file_disposisi_sudah_disetujui'] == NULL): ?>
							<a href="<?= base_url('surat_disposisi/formuploaddisposisibkd/' . $sd['id_surat_disposisi']); ?>" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Upload Persetujuan Disposisi">
								<i class="fas fa-arrow-alt-circle-up"></i></a>
							<?php else: ?>
								<a href="<?= base_url('surat_disposisi/viewpersetujuandisposisi/' . $sd['id_surat_disposisi']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat Persetujuan Disposisi">
									<i class="fas fa-envelope"></i></a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($sd['file_disposisi_sudah_disetujui'] == NULL): ?>
								<p>upload disposisi <br/>agar aksi ini muncul</p>
							<?php else: ?>
								<?php if ($sd['status'] == NULL): ?>
							<a href="<?= base_url('surat_disposisi/acceptbkd/' . $sd['id_surat_disposisi']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Setuju">
								<i class="fas fa-check"></i>
							</a>
								<a href="<?= base_url('surat_disposisi/rejectbkd/' . $sd['id_surat_disposisi']); ?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Tolak">
									<i class="fas fa-times"></i>
								</a>
								<?php elseif($sd['status'] == 0) : ?>
									<i class="fas fa-times"> ditolak</i>
								<?php else: ?>
									<i class="fas fa-check"> disetujui</i>
								<?php endif; ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
