<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Sistem KP <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function () {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });


    $('.form-check-input').on('click', function () {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function () {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId
            }
        });

    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#searchbkd").keyup(function () {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url: "<?= base_url('bkd/action'); ?>",
                    method: 'post',
                    data: {query: searchText},
                    success: function (response) {
                        $("#show-list").html(response);
                    }
                });
            } else {
                $("#show-list").html('');
            }
        });

        $("#show-list").on('click', function () {
            // var nama = $('#kontol').html();
            var nama = $('#show-list option:selected').text();

            $.ajax({
                url: "<?= base_url('bkd/action2'); ?>",
				type: 'post',
                method: 'post',
				dataType: 'json',
                data: {nama: nama},
				async: 'false',
                success: function (response) {
                    $('#searchbkd').val('');
                    $('#id').val(response[0]['id_pegawai']);
                    $('#jabatan').val(response[0]['jabatan']);

                },
            });

            // $('#kolomCari').remove();
        });

        $(document).on('click', 'a', function () {
            $("#searchbkd").val($(this).text());
            $("#show-list").html('');
        });
    });
</script>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>


<script type="text/javascript">
    $(document).ready(function () {
        $("#searchbka").keyup(function () {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url: "<?= base_url('bka/action'); ?>",
                    method: 'post',
                    data: {query: searchText},
                    success: function (response) {
                        $("#show-list").html(response);
                    }
                });
            } else {
                $("#show-list").html('');
            }
        });

        $("#show-list").on('click', function () {
            // var nama = $('#kontol').html();
            var nama = $('#show-list option:selected').text();

            $.ajax({
                url: "<?= base_url('bka/action2'); ?>",
                type: 'post',
                method: 'post',
                dataType: 'json',
                data: {nama: nama},
                async: 'false',
                success: function (response) {
                    $('#searchbka').val('');
                    $('#id').val(response[0]['id_pegawai']);
                    $('#jabatan').val(response[0]['jabatan']);

                },
            });

            // $('#kolomCari').remove();
        });

        $(document).on('click', 'a', function () {
            $("#searchbka").val($(this).text());
            $("#show-list").html('');
        });
    });
</script>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
</body>

</html>
