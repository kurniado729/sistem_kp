<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message') ?>

			<div class="row">
				<div class="col-3">
					<a href="<?= base_url('surat_masuk/addmail'); ?>" class="btn btn-primary btn-icon-split mb-3">
						<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
						<span class="text">Add New Mail</span>
					</a>
				</div>
				<div class="col-7">
					<div class="row">
						<div class="col">
							<form action="<?= base_url('surat_masuk/searchsuratmasuk') ?>" method="post">
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
<!--					<th scope="col">File Surat</th>-->
					<th scope="col">Kebutuhan Surat</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php foreach ($surat_masuk as $sm) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sm['pengirim'] ?></td>
						<td><?= $sm['no_surat_masuk'] ?></td>
						<td><?= $sm['tgl_surat_masuk'] ?></td>
						<td><?= $sm['ringkasan'] ?></td>
<!--						<td>--><?//= $sm['file_surat_masuk'] ?><!--</td>-->
						<td>
								<a href="<?= base_url('surat_masuk/viewmail/' . $sm['id_surat_masuk']); ?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat Surat Masuk">
									<i class="fas fa-envelope-open"></i>
								</a>
							<?php if ($sm['disposisi'] == '0'): ?>
								<a href="<?= base_url('surat_masuk/disposisimail/' . $sm['id_surat_masuk']); ?>" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Buat Disposisi" onclick="return confirm('Yakin Buat Disposisi?')">
									<i class="fas fa-paper-plane"></i>
								</a>
							<?php else: ?>
								<i class="fas fa-check"> sudah dibuat</i>
							<?php endif; ?>

						</td>
						<td>
<!--							<a href="--><?//= base_url('surat_masuk/downloadmail/' . $sm['id_surat_masuk']); ?><!--"-->
<!--							   class="badge badge-secondary">download</a>-->
							<a href="<?= base_url('surat_masuk/editmail/' . $sm['id_surat_masuk']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
								<i class="fas fa-edit"></i>
							</a>
							<a href="<?= base_url('surat_masuk/deletemail/' . $sm['id_surat_masuk']); ?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin Hapus?')">
								<i class="fas fa-trash-alt"></i>
							</a>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
	<?php if($this->uri->segment(2) == 'searchsuratmasuk'): ?>

	<?php else: ?>
		<div class="row mt-3">
			<div class="col">
				<!--Tampilkan pagination-->
				<?php echo $pagination; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
