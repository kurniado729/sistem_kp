<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message') ?>

			<a href="<?= base_url('pegawai/addpegawaitu'); ?>" class="btn btn-primary btn-icon-split mb-3">
				<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
				<span class="text">Add New Pegawai</span>
			</a>

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
