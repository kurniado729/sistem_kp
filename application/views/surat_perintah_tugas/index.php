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
					<th scope="col">Nama Pegawai</th>
					<th scope="col">NIP</th>
					<th scope="col">Jabatan</th>
					<th scope="col">Kebutuhan Surat</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php foreach ($spt as $s) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $s['pengirim'] ?></td>
						<td><?= $s['no_surat_masuk'] ?></td>
						<td><?= $s['tgl_surat_masuk'] ?></td>
						<td><?= $s['ringkasan'] ?></td>
						<td><?= $s['nama_pegawai'] ?></td>
						<td><?= $s['nip_pegawai'] ?></td>
						<td><?= $s['jabatan'] ?></td>
						<td>
							<a href="<?= base_url('surat_perintah_tugas/viewspt/' . $s['id_surat_spt']); ?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat SPT">
								<i class="fas fa-envelope-open"></i></a>
							<?php if ($s['file_spt_sudah_disetujui'] == NULL): ?>
								<a href="<?= base_url('surat_perintah_tugas/formuploadsptbkd/' . $s['id_surat_spt']); ?>" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Upload Persetujuan SPT">
									<i class="fas fa-arrow-alt-circle-up"></i></a>
							<?php else: ?>
								<a href="<?= base_url('surat_perintah_tugas/viewpersetujuanspt/' . $s['id_surat_spt']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat Persetujuan SPT">
									<i class="fas fa-envelope"></i></a>
							<?php endif; ?>
						</td>
						<td>
							<?php if ($s['file_spt_sudah_disetujui'] == NULL): ?>
								<p>upload SPT <br/>agar aksi ini muncul</p>
							<?php else: ?>
							<?php if ($s['status'] == NULL): ?>
								<a href="<?= base_url('surat_perintah_tugas/acceptbkd/' . $s['id_surat_spt']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Setuju">
									<i class="fas fa-check"></i>
								</a>
								<a href="<?= base_url('surat_perintah_tugas/rejectbkd/' . $s['id_surat_spt']); ?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Tolak">
									<i class="fas fa-times"></i>
								</a>
							<?php elseif($s['status'] == 0) : ?>
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
