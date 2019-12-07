<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-header">
					Edit sub menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('menu/editsubmenu/' . $submenu['id']); ?>">
							<div class="form-group row">
								<label for="title" class="col-sm-2 col-form-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="title" name="title"
										   value="<?= $submenu['title']; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="menu" class="col-sm-2 col-form-label">Menu</label>
								<div class="col-sm-10">
								<select name="menu_id" id="menu_id" class="form-control">
									<option value="<?= $submenu['menu_id']; ?>"> <?= $submenu['menu']; ?> </option>
									<?php foreach ($menu as $m) : ?>

									<?php
										if ($m['menu'] == $submenu['menu']){
											continue;
										}
									?>
										<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
									<?php endforeach; ?>
								</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="url" class="col-sm-2 col-form-label">Url</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="url" name="url"
									   value="<?= $submenu['url']; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="icon" class="col-sm-2 col-form-label">Icon</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" id="icon" name="icon"
									   value="<?= $submenu['icon']; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="is_active" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" id="is_active"
										   name="is_active" checked>
									<label class="form-check-label" for="is_active">
										Active?
									</label>
								</div>
								</div>
							</div>
							<div class="from-group row justify-content-end	">
								<div class="col-sm-10">
									<div class="row">
										<div class="col-3">
											<a href="<?= base_url('menu/submenu') ?>" class="btn btn-secondary btn-icon-split">
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
		<div class="col-lg-5">
			<div class="card">
				<div class="card-header">
					Daftar Icon
				</div>
				<div class="card-body">
					<div class="row text-center">
						<div class="col">
							<div class="icon-1"><i class="fas fa-tachometer-alt" style="font-size: 25px;"></i></div>
							<div id="target-1"><p>fas fa-fw fas fa-tachometer-alt</p></div>
						</div>
						<div class="col">
							<div class="icon-2"><i class="fas fa-users" style="font-size: 25px;"></i></div>
							<div id="target-2"><p>fas fa-fw fa-users</p></div>
						</div>
					</div>
					<div class="row text-center mt-2">
						<div class="col">
							<div class="icon-3"><i class="fas fa-user-tie" style="font-size: 25px;"></i></div>
							<div id="target-3"><p>fas fa-fw fa-user-tie</p></div>
						</div>
						<div class="col">
							<div class="icon-4"><i class="fas fa-user-edit" style="font-size: 25px;"></i></div>
							<div id="target-4"><p>fas fa-fw fa-user-edit</p></div>
						</div>
					</div>
					<div class="row text-center mt-2">
						<div class="col">
							<div class="icon-5"><i class="fas fa-trash" style="font-size: 25px;"></i></div>
							<div id="target-5"><p>fas fa-fw fa-trash</p></div>
						</div>
						<div class="col">
							<div class="icon-6"><i class="fas fa-key" style="font-size: 25px;"></i></div>
							<div id="target-6"><p>fas fa-fw fa-key</p></div>
						</div>
					</div>
					<div class="row text-center mt-2">
						<div class="col">
							<div class="icon-7"><i class="fas fa-folder" style="font-size: 25px;"></i></div>
							<div id="target-7"><p>fas fa-fw fa-folder</p></div>
						</div>
						<div class="col">
							<div class="icon-8"><i class="fas fa-folder-open" style="font-size: 25px;"></i></div>
							<div id="target-8"><p>fas fa-fw fa-folder-open</p></div>
						</div>
					</div>
					<div class="row text-center mt-2">
						<div class="col">
							<div class="icon-9"><i class="fas fa-male" style="font-size: 25px;"></i></div>
							<div id="target-9"><p>fas fa-fw fa-male</p></div>
						</div>
						<div class="col">
							<div class="icon-10"><i class="fas fa-child" style="font-size: 25px;"></i></div>
							<div id="target-10"><p>fas fa-fw fa-child</p></div>
						</div>
					</div>
					<div class="row text-center mt-2">
						<div class="col">
							<div class="icon-11"><i class="fas fa-envelope-open-text" style="font-size: 25px;"></i></div>
							<div id="target-11"><p>fas fa-fw fa-envelope-open-text</p></div>
						</div>
						<div class="col">
							<div class="icon-12"><i class="fas fa-envelope" style="font-size: 25px;"></i></div>
							<div id="target-12"><p>fas fa-fw fa-envelope</p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newmenumodalLabel">Add New Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('menu/addmenu'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
