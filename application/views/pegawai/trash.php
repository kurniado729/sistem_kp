<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message') ?>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Bagian</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($trash as $t) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $t['nama_pegawai'] ?></td>
						<td><?= $t['bagian'] ?></td>
						<td>
							<a href="<?= base_url('pegawai/restorepegawai/' . $t['id_pegawai']); ?>" class="btn btn-warning btn-circle">
								<i class="fas fa-trash-restore"></i>
							</a>
							<a href="<?= base_url('pegawai/deletepermanentpegawai/' . $t['id_pegawai']); ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
