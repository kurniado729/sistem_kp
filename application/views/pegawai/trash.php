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
							<form action="<?= base_url('pegawai/searchtrash') ?>" method="post">
								<div class="input-group">
									<div class="input-group-prepend bg-light">
										<label class="input-group-text bg-light font-weight-light small" for="kategori">Cari
											Berdasarkan</label>
									</div>
									<select name="kategori" id="kategori" style="width: 150px;" class="custom-select">
										<option value="nama_pegawai">Nama</option>
										<option value="jabatan">Jabatan</option>
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
						<th scope="col">Nama</th>
						<th scope="col">NIP</th>
						<th scope="col">Bagian</th>
						<th scope="col">Jabatan</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($trash as $t) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $t['nama_pegawai'] ?></td>
						<td><?= $t['nip'] ?></td>
						<td><?= $t['bagian'] ?></td>
						<td><?= $t['jabatan'] ?></td>
						<td>
							<a href="<?= base_url('pegawai/restorepegawai/' . $t['id_pegawai']); ?>" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Restore">
								<i class="fas fa-trash-restore"></i>
							</a>
							<a href="<?= base_url('pegawai/deletepermanentpegawai/' . $t['id_pegawai']); ?>" class="btn btn-danger btn-circle tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus Permanen">
								<i class="fas fa-trash"></i>
							</a>
						</td>
					</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
	<?php if($this->uri->segment(2) == 'searchtrash'): ?>

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
