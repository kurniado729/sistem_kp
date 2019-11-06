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
							   class="badge badge-info">lihat disposisi</a>
						</td>
						<td>
							<?php if ($sd['tujuan'] == NULL): ?>
								<a href="<?= base_url('surat_disposisi/disposisimailbkd/' . $sd['id_surat_disposisi']); ?>"
								   class="badge badge-warning" onclick="return confirm('Disposisi ke BKD?')">Disposisi ke BKD</a>
								<a href="<?= base_url('surat_disposisi/disposisimailbka/' . $sd['id_surat_disposisi']); ?>"
								   class="badge badge-warning" onclick="return confirm('Disposisi ke BKA?')">Disposisi ke BKA</a>
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

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
