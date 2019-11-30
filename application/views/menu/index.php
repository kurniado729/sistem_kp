<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
			<div class="row">
				<div class="col-3">
					<a href="<?= base_url('menu/addmenu') ?>" class="btn btn-primary btn-icon-split mb-3">
						<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
						<span class="text">Add New Menu</span>
					</a>
				</div>
				<div class="col-7">
					<div class="row">
						<div class="col">
							<form action="<?= base_url('menu/searchmenu') ?>" method="post">
								<div class="input-group">
									<div class="input-group-prepend bg-light">
										<label class="input-group-text bg-light font-weight-light small" for="kategori">Cari
											Berdasarkan</label>
									</div>
									<select name="kategori" id="kategori" style="width: 150px;" class="custom-select">
										<option value="menu">Menu</option>
<!--										<option value="cari">Cari</option>-->
									</select>
									<input name="keyword" id="keyword" autocomplete="off" type="text" class="w-50 form-control"
										   placeholder="Kata Kunci">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<table class="table table-hover">
				<thead">
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
							<a href="<?= base_url('menu/editmenu/' . $m['id']); ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
								<i class="fas fa-edit"></i>
							</a>
							<a href="<?= base_url('menu/deletemenu/' . $m['id']); ?>" class="btn btn-danger btn-circle tombol-hapus" data-toggle="tooltip" data-placement="top" title="Hapus">
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
	<?php

	?>

	<?php if($this->uri->segment(2) == 'searchmenu'): ?>

	<?php else: ?>
		<div class="row mt-3">
			<div class="col">
				<!--Tampilkan pagination-->
				<?php echo $pagination; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
