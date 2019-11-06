<!DOCTYPE html>
<html>
<head>
	<style>
		h1 {
			font-family: sans-serif;
		}

		table {
			font-family: Arial, Helvetica, sans-serif;
			color: #666;
			text-shadow: 1px 1px 0px #fff;
			background: #eaebec;
			border: #ccc 1px solid;
		}

		table th {
			padding: 15px 35px;
			border-left: 1px solid #e0e0e0;
			border-bottom: 1px solid #e0e0e0;
			background: #ededed;
		}

		table th:first-child {
			border-left: none;
		}

		table tr {
			text-align: center;
			padding-left: 20px;
		}

		table td:first-child {
			text-align: left;
			padding-left: 20px;
			border-left: 0;
		}

		table td {
			padding: 15px 35px;
			border-top: 1px solid #ffffff;
			border-bottom: 1px solid #e0e0e0;
			border-left: 1px solid #e0e0e0;
			background: #fafafa;
			background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
			background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
		}

		table tr:last-child td {
			border-bottom: 0;
		}

		table tr:last-child td:first-child {
			-moz-border-radius-bottomleft: 3px;
			-webkit-border-bottom-left-radius: 3px;
			border-bottom-left-radius: 3px;
		}

		table tr:last-child td:last-child {
			-moz-border-radius-bottomright: 3px;
			-webkit-border-bottom-right-radius: 3px;
			border-bottom-right-radius: 3px;
		}

		table tr:hover td {
			background: #f2f2f2;
			background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
			background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
		}
	</style>
	<title>Surat Disposisi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table cellspacing='0' style="width: 100%;">
	<thead>
	<tr style="text-align: center;">
		<th colspan="4">
			BALAI PEMASYARAKATAN KELAS II PEKANBARU
		</th>
	</tr>
	<tr style="text-align: center;">
		<th colspan="4">
			JALAN CHANDRADIMUKA NO. 01 TELEPON 0761-65322
		</th>
	</tr>
	<tr style="text-align: center;">
		<th colspan="4">
			SURAT PERINTAH KERJA
		</th>
	</tr>
	</thead>
	<tbody>
	</tbody>
</table>
</body>
</html>
<!--No Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: --><?//= $surat_disposisi['no_surat_masuk'].'_'.$surat_disposisi['id_surat_disposisi'];?><!-- <br/>-->
<!--Pengirim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: --><?//= $surat_disposisi['pengirim'];?><!-- <br/>-->
<!--No Surat Masuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: --><?//= $surat_disposisi['no_surat_masuk'];?><!-- <br/>-->
<!--Tanggal Surat Masuk : --><?//= $surat_disposisi['tgl_surat_masuk'];?><!-- <br/>-->
<!--<tr style="text-align: left;">-->
<!--	<td>Ringkasan :  --><?//= $surat_disposisi['ringkasan'];?><!-- <br/></td>-->
<!--</tr>-->
