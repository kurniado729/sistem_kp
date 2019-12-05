<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">

		<div class="flash-data-danger" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					Add mail
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
<!--						<form method="post" action="--><?//= base_url('surat_masuk/addmail')?><!--" enctype="multipart/form-data">-->
							<?php echo form_open_multipart(base_url('surat_disposisi/uploaddisposisibkd/'. $surat_disposisi['id_surat_disposisi'])) ?>
							<div class="form-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="file_surat_disposisi" name="file_surat_disposisi" required>
									<label class="custom-file-label" for="file_surat_disposisi">Pilih Surat Disposisi</label>
								</div>
							</div>
						<div class="row">
							<div class="col-3">
								<a href="<?= base_url('surat_disposisi/disposisibkd') ?>" class="btn btn-secondary btn-icon-split">
									<span class="icon text-white-50"><i class="fas fa-chevron-left"></i></span>
									<span class="text">Back</span>
								</a>
							</div>
							<div class="col-3">
								<button name="submit" type="submit" class="btn btn-primary btn-icon-split">
									<span class="icon text-white-50"><i class="fas fa-check"></i></span>
									<span class="text">Upload</span></button>
							</div>
						</div>
						<?php echo form_close() ?>
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
