<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

			<div class="row">
				<div class="col-7">
					<div class="row mb-3">
						<div class="col">
							<form action="<?= base_url('surat_disposisi/searchdisposisi') ?>" method="post">
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
								<i class="fas fa-envelope-open"></i>
							</a>
						</td>
						<td>
							<?php if ($sd['tujuan'] == NULL): ?>
<!--								<a href="--><?//= base_url('surat_disposisi/disposisimailbkd/' . $sd['id_surat_disposisi']); ?><!--"-->
<!--								   class="badge badge-warning" onclick="return confirm('Disposisi ke BKD?')">Disposisi ke BKD</a>-->
<!--								<a href="--><?//= base_url('surat_disposisi/disposisimailbka/' . $sd['id_surat_disposisi']); ?><!--"-->
<!--								   class="badge badge-warning" onclick="return confirm('Disposisi ke BKA?')">Disposisi ke BKA</a>-->
								<a href="<?= base_url('surat_disposisi/disposisimailbkd/' . $sd['id_surat_disposisi']); ?>" class="btn btn-warning btn-circle tombol-disposisi-bkd" data-toggle="tooltip" data-placement="top" title="Disposisi ke BKD">
									<i class="fas fa-arrow-alt-circle-right"></i>
								</a>
								<a href="<?= base_url('surat_disposisi/disposisimailbka/' . $sd['id_surat_disposisi']); ?>" class="btn btn-warning btn-circle tombol-disposisi-bka" data-toggle="tooltip" data-placement="top" title="Disposisi ke BKA">
									<i class="fas fa-arrow-alt-circle-right"></i>
								</a>
							<?php else: ?>
									<i class="fas fa-check"> sudah didisposisi</i>
							<?php endif; ?>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
	<?php if($this->uri->segment(2) == 'searchdisposisi'): ?>

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
