<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<?= form_error ('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<div class="card">
				<div class="card-header">
					Edit menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('admin/editrole/'. $role['id']); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="role" name="role" value="<?= $role['role'] ?>">
							</div>
							<button type="submit" class="btn btn-primary">Edit</button>
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
