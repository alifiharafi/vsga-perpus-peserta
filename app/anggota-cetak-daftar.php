<?php
	include '../config/koneksi-db.php';

	$sql = "SELECT * FROM anggota ORDER BY id_anggota DESC;";
	$query = mysqli_query($db_conn, $sql);
	$row = $query->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak Daftar Anggota</title>
	<style>
		* { margin: 0; font-family: Arial, Helvetica, sans-serif; }
		h3 { text-align: center; margin: 15px; text-decoration: underline; }
		section { margin: 0 auto; width: 960px; }
		table { border-collapse: collapse; }
		table, table th, table td { padding: 5px; border: 1px solid #CCC; }
		.text-center { text-align: center; }
	</style>
</head>
<body>
	<section>
	<?php
		if($row > 0) {
	?>
		<h3>Daftar Anggota</h3>

		<table>
			<tr>
				<th width="30">No.</th>
				<th width="100">ID Anggota</th>
				<th width="240">Nama Lengkap</th>
				<th width="70">Foto</th>
				<th width="120">Jenis Kelamin</th>
				<th width="300">Alamat</th>
				<th width="100">Status Aktif</th>
			</tr>
		<?php
			$i = 1;
			while($data = mysqli_fetch_array($query)) {
		?>
					<tr>
				<td class="text-center"><?php echo $i++; ?></td>
				<td><?php echo $data['id_anggota']; ?></td>
				<td><?php echo $data['nama_lengkap']; ?></td>
				<td class="text-center">
					<?php
						$data_foto = $data['foto'];
						if($data_foto == '-') {
							$data_foto = 'foto-default.jpg';
						}
					?>
					<img src="<?php echo '../images/' . $data_foto; ?>" width="60">
				</td>
				<td><?php echo ($data['jenis_kelamin'] == 'L') ? 'Pria' : 'Wanita'; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td class="text-center"><?php echo ($data['status_aktif'] == 'Y') ? 'Ya' : 'Tidak'; ?></td>
			</tr>
		<?php
			}
		?>
		</table>
	</section>
	<script type="text/javascript">
		window.print();
	</script>
	<?php
		}
	?>
</body>
</html>