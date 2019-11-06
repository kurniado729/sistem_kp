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
				<?php foreach ($bkd as $b) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $b['pengirim'] ?></td>
						<td><?= $b['no_surat_masuk'] ?></td>
						<td><?= $b['tgl_surat_masuk'] ?></td>
						<td><?= $b['ringkasan'] ?></td>
						<td>
							<a href="<?= base_url('bkd/viewpersetujuandisposisi/' . $b['id_surat_disposisi']); ?>"
							   class="badge badge-info">lihat disposisi</a>
						</td>
						<td>
							<a href="<?= base_url('bkd/addsuratperintahjalan/' . $b['id_surat_disposisi']); ?>"
							   class="badge badge-success">buat surat perintah jalan</a>
<!--							<a href="--><?//= base_url('bkd/makespk/' . $b['id_surat_disposisi']); ?><!--"-->
<!--							   class="badge badge-success">Lihat surat perintah kerja</a>-->
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
