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
							<a href="<?= base_url('bka/viewspt/' . $s['id_surat_spt']); ?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat SPT">
								<i class="fas fa-envelope-open"></i></a>
						</td>
						<td>
							<?php if ($s['status_pengajuan'] == '0'): ?>
							<a href="<?= base_url('bka/ajukanspt/' . $s['id_surat_spt']); ?>" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="Ajukan SPT" onclick="return confirm('Yakin Ajukan SPT?')">
								<i class="fas fa-paper-plane"></i>
							</a>
							<?php else: ?>
								<i class="fas fa-check"> sudah diajukan</i>
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
