<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<?= $this->session->flashdata('message') ?>

			<a href="<?= base_url('menu/addmenu') ?>" class="btn btn-primary btn-icon-split mb-3">
				<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
				<span class="text">Add New Menu</span>
			</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Menu</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($menu as $m) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $m['menu'] ?></td>
						<td>
							<a href="<?= base_url('menu/editmenu/' . $m['id']); ?>" class="btn btn-success btn-circle">
								<i class="fas fa-edit"></i>
							</a>
							<a href="<?= base_url('menu/deletemenu/' . $m['id']); ?>" class="btn btn-danger btn-circle" onclick="return confirm('Yakin Hapus?')">
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
