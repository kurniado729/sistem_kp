<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<center><h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1></center>

	<div class="row">
		<div class="col-lg-12">
			<table border="1">
				<tr>
					<td colspan="2">Index :
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Kode:
					</td>
				</tr>
				<tr>
					<td colspan="2">Pengirim : <?= $surat_masuk['pengirim'] ?><br/>
						Nomor Surat : <?= $surat_masuk['no_surat_masuk'] ?> <br/>
						Tanggal : <?= $surat_masuk['tgl_surat_masuk'] ?><br/>
						Ringkasan :<?= $surat_masuk['ringkasan'] ?><br/>
						Diterima Tanggal :<?= date("Y-m-d"); ?><br/>
					</td>
				</tr>
				<tr>
					<td colspan="2">Tanggal Penyelesaian :
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
