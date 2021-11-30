<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cetak Nilai</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		th, td {
		  padding-top: 10px;
		  padding-bottom: 20px;
		  padding-left: 30px;
		  padding-right: 40px;
		}
		body{
			font-family: arial;
		}
	</style>
</head>
<body>
	<h2>DAFTAR NILAI KELAS <?php echo $kelas->namaMapel.'-'.$kelas->kelas; ?></h2>
	<table style="width:100%" >
		<tr>
			<th>No</th>
			<th>Nama Siswa</th>
			<th>Nilai Akhir</th>
			<th>Predikat</th>
		</tr>
		<tbody>
			<?php foreach ($data as $key => $value) {?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value->namaSiswa ?></td>
					<td><?php echo $value->nilaiAkhir ?></td>
					<td><?php echo $value->predikat ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>