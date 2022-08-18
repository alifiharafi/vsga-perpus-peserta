<?php	
	include './config/koneksi-db.php';

	if(!isset($_POST['simpan'])) {
		if(isset($_GET['id'])) { // memperoleh anggota_id
			$id_anggota = $_GET['id'];

			if(!empty($id_anggota)) {
				// Query
				$sql = "SELECT * FROM anggota WHERE id_anggota = '{$id_anggota}';";
				$query = mysqli_query($db_conn, $sql);
				$row = $query->num_rows;

				if($row > 0) {
					$data = mysqli_fetch_array($query); // memperoleh data anggota

					// echo '<pre>';
					// var_dump($data);
					// echo '</pre>';
				} else {
					echo "<script>alert('ID Anggota tidak ditemukan!');</script>";

					// mengalihkan halaman
					echo "<meta http-equiv='refresh' content='0; url=index.php?p=anggota'>";
					exit;
				}
			} else {
				echo "<script>alert('ID Anggota kosong!');</script>";

				// mengalihkan halaman
				echo "<meta http-equiv='refresh' content='0; url=index.php?p=anggota'>";
				exit;
			}
		} else {
			echo "<script>alert('ID Anggota tidak didefinisikan!');</script>";

			// mengalihkan halaman
			echo "<meta http-equiv='refresh' content='0; url=index.php?p=anggota'>";
			exit;
		}
?>

		<div id="container">
			<div class="page-title">
				<h3>Tambah Data Anggota</h3>	
			</div>
			<div class="page-content">
				<form action="" method="post" enctype="multipart/form-data">
					<table class="form-table">
						<tr>
							<td>
								<label for="id_anggota">ID Anggota</label>
							</td>
							<td>					
								<input type="text" name="id_anggota" id="id_anggota" value="<?php echo $data['id_anggota']; ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>
								<label for="nama_lengkap">Nama Lengkap</label>
							</td>
							<td>								
								<input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Jenis Kelamin</label>
							</td>
							<td>								
								<input type="radio" name="jenis_kelamin" value="L" id="jk_pria" <?php echo ($data['jenis_kelamin'] == 'L') ? 'checked' : ''; ?> required>
								<label for="jk_pria">Pria</label>

								<input type="radio" name="jenis_kelamin" value="P" id="jk_wanita" <?php echo ($data['jenis_kelamin'] == 'P') ? 'checked' : ''; ?> required>
								<label for="jk_wanita">Wanita</label>
							</td>
						</tr>
						<tr>
							<td>
								<label for="alamat">Alamat</label>
							</td>
							<td>								
								<textarea rows="3" cols="40" name="alamat" required><?php echo $data['alamat']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="foto">Foto</label>
							</td>
							<td>								
								<input type="file" name="foto" id="foto">
								<input type="hidden" name="foto_tmp" id="foto_tmp" value="<?php echo $data['foto']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Status Aktif</label>
							</td>
							<td>								
								<input type="radio" name="status_aktif" value="Y" id="status_true" <?php echo ($data['status_aktif'] == 'Y') ? 'checked' : ''; ?> required>
								<label for="status_true">Ya</label>

								<input type="radio" name="status_aktif" value="T" id="status_false" <?php echo ($data['status_aktif'] == 'T') ? 'checked' : ''; ?> required>
								<label for="status_false">Tidak</label>
							</td>
						</tr>
						<tr>
							<td>
								&nbsp;
							</td>
							<td>								
								<input type="submit" name="simpan" value="Simpan">
							</td>
						</tr>						
					</table>
				</form>
			</div>
		</div>

<?php 
	} else { 
		/* Proses Penyimpanan Data dari Form */

		$id_anggota 	= $_POST['id_anggota'];
		$nama_lengkap 	= $_POST['nama_lengkap'];
		$jenis_kelamin	= $_POST['jenis_kelamin'];
		$alamat			= $_POST['alamat'];
		$file_foto 		= $_FILES['foto']['name'];
		$file_foto_tmp	= $_POST['foto_tmp'];
		$status_aktif	= $_POST['status_aktif'];

		if(!empty($file_foto)) {
			// Rename file foto. Contoh: foto-AG007.jpg
			$ext_file = pathinfo($file_foto, PATHINFO_EXTENSION);
			$file_foto_rename = 'foto-' . $id_anggota . '.' . $ext_file;

			$dir_images = './images/';
			$path_image = $dir_images . $file_foto_rename;
			$file_foto = $file_foto_rename; // untuk keperluan Query UPDATE

			// Jika file foto sudah tersedia
			if(file_exists($path_image)) {
				unlink($path_image); // file foto dihapus
			}

			move_uploaded_file($_FILES['foto']['tmp_name'], $path_image);
		} else {
			$file_foto = $file_foto_tmp; // jika tidak diubah gunakan yang sudah ada sebelumnya
		}

		// Query
		$sql = "UPDATE anggota 
					SET nama_lengkap 	= '{$nama_lengkap}',
						jenis_kelamin 	= '{$jenis_kelamin}',
						alamat 			= '{$alamat}',
						foto			= '{$file_foto}', 
						status_aktif	= '{$status_aktif}'
					WHERE id_anggota	='{$id_anggota}'";
		$query = mysqli_query($db_conn, $sql);
		
		if(!$query) {
			echo "<script>alert('Data gagal diubah!');</script>";
		}

		// mengalihkan halaman
		echo "<meta http-equiv='refresh' content='0; url=index.php?p=anggota'>";
	}
?>