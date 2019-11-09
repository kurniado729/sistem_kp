<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message') ?>

			<div class="row">
				<div class="col-3">
					<a href="<?= base_url('pegawai/addpegawaitu'); ?>" class="btn btn-primary btn-icon-split mb-3">
						<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
						<span class="text">Add New Pegawai</span>
					</a>
				</div>
				<div class="col-7">
					<div class="row">
						<div class="col">
							<form action="<?= base_url('pegawai/searchpegawaitu') ?>" method="post">
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
						<th scope="col">Jabatan</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($pegawai as $p) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $p['nama_pegawai'] ?></td>
						<td><?= $p['jabatan'] ?></td>
						<td>
							<a href="<?= base_url('pegawai/editpegawaitu/' . $p['id_pegawai']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
								<i class="fas fa-edit"></i>
							</a>
							<a href="<?= base_url('pegawai/deletepegawaitu/' . $p['id_pegawai']); ?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin Hapus?')">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
