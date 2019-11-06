<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<?= form_error ('pemgirim', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="card">
				<div class="card-header">
					Edit menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('surat_masuk/editmail/'. $surat_masuk['id_surat_masuk']); ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<label for="pengirim" class="col-sm-4 col-form-label">Pengirim</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $surat_masuk['pengirim'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="no_surat_masuk" class="col-sm-4 col-form-label">No Surat</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="no_surat_masuk" name="no_surat_masuk" value="<?= $surat_masuk['no_surat_masuk'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_surat_masuk" class="col-sm-4 col-form-label">Tanggal Surat</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk" value="<?= $surat_masuk['tgl_surat_masuk'] ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="ringkasan" class="col-sm-4 col-form-label">Ringkasan</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="ringkasan" name="ringkasan" value="<?= $surat_masuk['ringkasan'] ?>">
								</div>
							</div>
							<?php if ($surat_masuk['disposisi'] == '1'): ?>
								<div class="form-group row">
									<label for="file_surat_masuk" class="col-sm-4 col-form-label">File</label>
									<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="file_surat_masuk" name="file_surat_masuk" disabled>
										<label class="custom-file-label" for="file_surat_masuk"><?= $surat_masuk['file_surat_masuk'] ?></label>
									</div>
									</div>
								</div>
							<?php else: ?>
								<div class="form-group row">
									<label for="file_surat_masuk" class="col-sm-4 col-form-label">File</label>
									<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="file_surat_masuk" name="file_surat_masuk">
										<label class="custom-file-label" for="file_surat_masuk"><?= $surat_masuk['file_surat_masuk'] ?></label>
									</div>
									</div>
								</div>
							<?php endif; ?>
							<div class="from-group row justify-content-end" style="margin-left: 105px;">
								<div class="col-sm-10">
									<div class="row">
										<div class="col-3 mr-4">
											<a href="<?= base_url('surat_masuk') ?>" class="btn btn-secondary btn-icon-split">
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
