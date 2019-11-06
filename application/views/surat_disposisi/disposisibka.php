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
							<a href="<?= base_url('surat_disposisi/viewdisposisimail/' . $sd['id_surat_disposisi']); ?>"
							   class="badge badge-warning">lihat disposisi</a>
							<?php if ($sd['file_disposisi_sudah_disetujui'] == NULL): ?>
								<a href="<?= base_url('surat_disposisi/formuploaddisposisibka/' . $sd['id_surat_disposisi']); ?>"
								   class="badge badge-info">upload persetujuan disposisi</a>
							<?php else: ?>
								<a href="<?= base_url('surat_disposisi/viewpersetujuandisposisi/' . $sd['id_surat_disposisi']); ?>"
								   class="badge badge-success">lihat persetujuan disposisi</a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($sd['file_disposisi_sudah_disetujui'] == NULL): ?>
								<p>upload disposisi <br/>agar aksi ini muncul</p>
							<?php else: ?>
								<?php if ($sd['status'] == NULL): ?>
									<a href="<?= base_url('surat_disposisi/acceptbka/' . $sd['id_surat_disposisi']); ?>"
									   class="badge badge-success">setujui</a>
									<a href="<?= base_url('surat_disposisi/rejectbka/' . $sd['id_surat_disposisi']); ?>"
									   class="badge badge-danger">tolak</a>
								<?php elseif($sd['status'] == 0) : ?>
									<a class="badge badge-danger" style="color: white;">sudah ditolak</a>
								<?php else: ?>
									<a class="badge badge-success" style="color: white;">sudah disetujui</a>
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
