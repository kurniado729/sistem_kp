<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<div class="card">
				<div class="card-header">
					Edit menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="addsf" >
							<div class="form-group">
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $bkd['pengirim']?>" readonly>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="no_surat_masuk" name="no_surat_masuk" value="<?= $bkd['no_surat_masuk']?>" readonly>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk" value="<?= $bkd['tgl_surat_masuk']?>" readonly>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="ringkasan" name="ringkasan" value="<?= $bkd['ringkasan']?>" readonly>
							</div>
							<div class="form-group">
								<div class="row">
									<div id="kolomCari" class="col-3">
										<input type="text" class="form-control" id="search" name="search" placeholder="Cari Nama..." autocomplete="off">
									</div>
									<div class="col">
										<select class="form-control" name="platform" id="show-list">

										</select>
									</div>
								</div>

							</div>
							<div class="form-group" id="show-id">
								<input type="text" class="form-control" id="id" name="id" placeholder="NIP" readonly>
							</div>
							<div class="form-group" id="show-jabatan">
								<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" readonly>
							</div>
							<button type="submit" class="btn btn-primary mt-3">add</button>
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
