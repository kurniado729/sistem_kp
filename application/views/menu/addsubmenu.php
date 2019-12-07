<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?php if (validation_errors()) :?>
			<div class="alert alert-danger" role="alert">
				<?= validation_errors() ?>
			</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-header">
					Add sub menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('menu/addsubmenu'); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= set_value('title')?>">
							</div>
							<div class="form-group">
								<select name="menu_id" id="menu_id" class="form-control">
									<option value="">Select Menu</option>
									<?php foreach ($menu as $m) : ?>
									<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
									<?php endforeach;?>
								</select>

							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= set_value('url')?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= set_value('icon')?>">
							</div>
							<div class="form-group">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
									<label class="form-check-label" for="is_active">
										Active?
									</label>
								</div>
							</div>
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
										<span class="text">Add</span></button>
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
							<i class="fas fa-tachometer-alt"></i> <br/>
							fas fa-fw fa-tachometer-alt
						</div>
						<div class="col">
							<i class="fas fa-users"></i> <br/>
							fas fa-fw fa-users
						</div>
					</div>
					<div class="row text-center mt-3">
						<div class="col">
							<i class="fas fa-user-tie"></i> <br/>
							fas fa-fw fa-user-tie
						</div>
						<div class="col">
							<i class="fas fa-user-edit"></i> <br/>
							fas fa-fw fa-user-edit
						</div>
					</div>
					<div class="row text-center mt-3">
						<div class="col">
							<i class="fas fa-trash"></i> <br/>
							fas fa-fw fa-trash
						</div>
						<div class="col">
							<i class="fas fa-key"></i> <br/>
							fas fa-fw fa-key
						</div>
					</div>
					<div class="row text-center mt-3">
						<div class="col">
							<i class="fas fa-folder"></i> <br/>
							fas fa-fw fa-folder
						</div>
						<div class="col">
							<i class="fas fa-folder-open"></i> <br/>
							fas fa-fw fa-folder-open
						</div>
					</div>
					<div class="row text-center mt-3">
						<div class="col">
							<i class="fas fa-male"></i> <br/>
							fas fa-fw fa-male
						</div>
						<div class="col">
							<i class="fas fa-child"></i> <br/>
							fas fa-fw fa-child
						</div>
					</div>
					<div class="row text-center mt-3">
						<div class="col">
							<i class="fas fa-envelope-open-text"></i> <br/>
							fas fa-fw fa-envelope-open-text
						</div>
						<div class="col">
							<i class="fas fa-envelope"></i> <br/>
							fas fa-fw fa-envelope
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
<div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodalLabel" aria-hidden="true">
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
