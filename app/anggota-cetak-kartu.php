<?php
	include '../config/koneksi-db.php';

	if(isset($_GET['id'])) { // memperoleh anggota_id
		$id_anggota = $_GET['id'];

		if(!empty($id_anggota)) {
			// Query
			$sql = "SELECT * FROM anggota WHERE id_anggota = '{$id_anggota}';";
			$query = mysqli_query($db_conn, $sql);
			$row = $query->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak Kartu Anggota</title>
	<style>
		* { margin: 0; font-family: Arial, Helvetica, sans-serif; }
		h3 { text-align: center; margin: 15px; text-decoration: underline; }
		#member-card { margin: 0 auto; width: 450px; }
		#member-photo { float: left; width: 120px; margin-right: 10px; }
		#member-data { float: left; width: 320px; }
		#member-data p { line-height: 24px; }
	</style>
</head>
<body>
		<?php
			if($row > 0) {
				$data = mysqli_fetch_array($query); // memperoleh data anggota

				$data_foto = $data['foto'];
				if($data_foto == '-') {
					$data_foto = 'foto-default.jpg';
				}
		?>
	<section id="member-card">
		<h3>Kartu Anggota</h3>

		<div id="member-photo">
			<img src="../images/<?php echo $data_foto; ?>" width="120">
		</div>
		<div id="member-data">
			<p><strong>ID Anggota</strong>: <?php echo $data['id_anggota']; ?></p>
			<p><strong>Nama Lengkap</strong>: <?php echo $data['nama_lengkap']; ?></p>
			<p><strong>Jenis Kelamin</strong>: <?php echo ($data['jenis_kelamin'] == 'L') ? 'Pria' : 'Wanita'; ?></p>
			<p><strong>Alamat</strong>: <?php echo $data['alamat']; ?></p>
		</div>
	</section>
	<script type="text/javascript">
		window.print();
	</script>
		<?php
			}
		?>
</body>
</html>

<?php
		}
	}
?>