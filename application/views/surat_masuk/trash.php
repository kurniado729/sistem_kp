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
						<th scope="col">File Surat</th>
						<th scope="col">Pengirim</th>
						<th scope="col">No Surat</th>
						<th scope="col">Tanggal Surat</th>
						<th scope="col">Ringkasan</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($trash as $t) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $t['file_surat_masuk'] ?></td>
						<td><?= $t['pengirim'] ?></td>
						<td><?= $t['no_surat_masuk'] ?></td>
						<td><?= $t['tgl_surat_masuk'] ?></td>
						<td><?= $t['ringkasan'] ?></td>
						<td>
							<a href="<?= base_url('surat_masuk/restoremail/' . $t['id_surat_masuk']); ?>" class="btn btn-warning btn-circle">
								<i class="fas fa-trash-restore"></i>
							</a>
							<a href="<?= base_url('surat_masuk/deletepermanentmail/' . $t['id_surat_masuk']); ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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
