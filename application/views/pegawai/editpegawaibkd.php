<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<?= form_error ('nama_pegawai', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="card">
				<div class="card-header">
					Edit menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('pegawai/editpegawaibkd/'. $pegawai['id_pegawai']); ?>">
							<div class="form-group row">
								<label for="nama_pegawai" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-2 col-form-label">NIP</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nip" name="nip" value="<?= $pegawai['nip'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-2 col-form-label">jenis_kelamin</label>
								<div class="col-sm-10">
									<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
										<?php if($pegawai['jenis_kelamin'] == 'laki-laki') : ?>
											<option value="<?= $pegawai['jenis_kelamin'] ?>"><?= $pegawai['jenis_kelamin'] ?></option>
											<option value="perempuan">perempuan</option>
										<?php else : ?>
											<option value="<?= $pegawai['jenis_kelamin'] ?>"><?= $pegawai['jenis_kelamin'] ?></option>
											<option value="laki-laki">laki-laki</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-2 col-form-label">tampat_lahir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $pegawai['tempat_lahir'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-2 col-form-label">tanggal_lahir</label>
								<div class="col-sm-10">
									<input class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pegawai['tanggal_lahir'] ?>" autocomplete="off" type="text"/>
								</div>
							</div>
							<div class="form-group row">
								<label for="nip" class="col-sm-2 col-form-label">alamat</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pegawai['alamat'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="jabatan" class="col-sm-2 col-form-label">jabatan</label>
								<div class="col-sm-10">
									<select class="form-control" id="jabatan" name="jabatan">
										<?php if($pegawai['jabatan'] == 'jabatan1') : ?>
											<option value="<?= $pegawai['jabatan'] ?>"><?=$pegawai['jabatan'] ?></option>
											<option value="jabatan2">jabatan2</option>
											<option value="jabatan3">jabatan3</option>
											<option value="jabatan4">jabatan4</option>
											<option value="jabatan5">jabatan5</option>
										<?php elseif($pegawai['jabatan'] == 'jabatan2') : ?>
											<option value="<?= $pegawai['jabatan'] ?>"><?=$pegawai['jabatan'] ?></option>
											<option value="jabatan1">jabatan1</option>
											<option value="jabatan3">jabatan3</option>
											<option value="jabatan4">jabatan4</option>
											<option value="jabatan5">jabatan5</option>
										<?php elseif($pegawai['jabatan'] == 'jabatan3') : ?>
											<option value="<?= $pegawai['jabatan'] ?>"><?=$pegawai['jabatan'] ?></option>
											<option value="jabatan1">jabatan1</option>
											<option value="jabatan2">jabatan2</option>
											<option value="jabatan4">jabatan4</option>
											<option value="jabatan5">jabatan5</option>
										<?php elseif($pegawai['jabatan'] == 'jabatan4') : ?>
											<option value="<?= $pegawai['jabatan'] ?>"><?=$pegawai['jabatan'] ?></option>
											<option value="jabatan1">jabatan1</option>
											<option value="jabatan2">jabatan2</option>
											<option value="jabatan3">jabatan3</option>
											<option value="jabatan5">jabatan5</option>
										<?php else : ?>
											<option value="<?= $pegawai['jabatan'] ?>"><?=$pegawai['jabatan'] ?></option>
											<option value="jabatan1">jabatan1</option>
											<option value="jabatan2">jabatan2</option>
											<option value="jabatan3">jabatan3</option>
											<option value="jabatan4">jabatan4</option>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="bagian" class="col-sm-2 col-form-label">Bagian</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="bagian" name="bagian" value="<?= $pegawai['bagian'] ?>" readonly>
								</div>
							</div>
							<div class="from-group row justify-content-end	">
								<div class="col-sm-10">
									<div class="row">
										<div class="col-3">
											<a href="<?= base_url('pegawai/pegawaibkd') ?>" class="btn btn-secondary btn-icon-split">
												<span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
												<span class="text">Back</span>
											</a>
										</div>
										<div class="col-3">
											<button type="submit" class="btn btn-primary btn-icon-split">
												<span class="icon text-white-50"><i class="fas fa-check"></i></span>
												<span class="text">Edit</span></button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</blockquote>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!--<div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodalLabel" aria-hidden="true">-->
<!--	<div class="modal-dialog" role="document">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
<!--				<h5 class="modal-title" id="newmenumodalLabel">Add New Menu</h5>-->
<!--				<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--					<span aria-hidden="true">&times;</span>-->
<!--				</button>-->
<!--			</div>-->
<!--			<form method="post" action="--><?//= base_url('menu/addmenu'); ?><!--">-->
<!--				<div class="modal-body">-->
<!--					<div class="form-group">-->
<!--						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="modal-footer">-->
<!--					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--					<button type="submit" class="btn btn-primary">Add</button>-->
<!--				</div>-->
<!--			</form>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
