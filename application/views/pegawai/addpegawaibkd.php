<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="flash-data-danger" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

		<div class="col-lg-6">

			<?= form_error ('nama_pegawai', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= form_error ('nip', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= form_error ('jenis_kelamin', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= form_error ('tempat_lahir', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= form_error ('tanggal_lahir', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= form_error ('alamat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= form_error ('jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="card">
				<div class="card-header">
					Add Pegawai BKD
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('pegawai/addpegawaibkd'); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama" value="<?= set_value('nama_pegawai')?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip')?>">
							</div>
							<div class="form-group">
								<!--								<label for="exampleFormControlSelect1">Jabatan</label>-->
								<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									<option value="laki-laki">laki-laki</option>
									<option value="perempuan">perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir')?>">
							</div>
							<div class="form-group"> <!-- Date input -->
								<input class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" type="text"/ value="<?= set_value('tanggal_lahir')?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat')?>">
							</div>
							<div class="form-group">
								<!--								<label for="exampleFormControlSelect1">Jabatan</label>-->
								<select class="form-control" id="jabatan" name="jabatan">
									<option value="jabatan1">jabatan1</option>
									<option value="jabatan2">jabatan2</option>
									<option value="jabatan3">jabatan3</option>
									<option value="jabatan4">jabatan4</option>
									<option value="jabatan5">jabatan5</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="bagian" name="bagian" value="BKD" readonly>
							</div>
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
										<span class="text">Add</span></button>
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
