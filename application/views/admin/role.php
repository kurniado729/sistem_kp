<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

			<a href="<?= base_url('admin/addrole'); ?>" class="btn btn-primary mb-3" >Add New Role</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Role</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($role as $r) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $r['role'] ?></td>
						<td>
							<a href="<?= base_url('admin/roleaccess/') . $r['id'] ?>" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="top" title="akses">
								<i class="fas fa-universal-access"></i>
							</a>
							<a href="<?= base_url('admin/editrole/') . $r['id'] ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
								<i class="fas fa-edit"></i>
							</a>
							<a href="<?= base_url('admin/deleterole/') . $r['id'] ?>" class="btn btn-danger btn-circle tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus">
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
<!-- Modal HTML -->

