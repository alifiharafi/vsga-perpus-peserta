<?php
	include './config/koneksi-db.php';

	/* Kondisi jika tidak melakukan simpan/ submit, maka tampilkan formulir */
	if(!isset($_POST['simpan'])) {
		/* Mempersiapkan ID Anggota Baru */
		$sql = "SELECT id_anggota FROM anggota;";
		$query = mysqli_query($db_conn, $sql);
		$row = $query->num_rows;

		$id_anggota_tmp = $row + 1; // Menambahkan +1 untuk ID Anggota Baru
		$id_anggota_tmp = str_pad($id_anggota_tmp, 3, "0", STR_PAD_LEFT); // Menambahkan "0" sampai panjang 3 digit termasuk ID Anggota Baru
		$id_anggota_tmp = 'AG' . $id_anggota_tmp; // Menambahkan prefix 'AG' untuk ID Anggota Baru
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
								<input type="text" name="id_anggota" id="id_anggota" value="<?php echo $id_anggota_tmp; ?>" readonly>
							</td>
						</tr>
						<tr>
							<td>
								<label for="nama_lengkap">Nama Lengkap</label>
							</td>
							<td>								
								<input type="text" name="nama_lengkap" id="nama_lengkap" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Jenis Kelamin</label>
							</td>
							<td>								
								<input type="radio" name="jenis_kelamin" value="L" id="jk_pria" required>
								<label for="jk_pria">Pria</label>

								<input type="radio" name="jenis_kelamin" value="P" id="jk_wanita" required>
								<label for="jk_wanita">Wanita</label>
							</td>
						</tr>
						<tr>
							<td>
								<label for="alamat">Alamat</label>
							</td>
							<td>								
								<textarea rows="3" cols="40" name="alamat" required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="foto">Foto</label>
							</td>
							<td>								
								<input type="file" name="foto" id="foto">
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
		$status_aktif	= 'Y';

		if(!empty($file_foto)) {
			// Rename file foto. Contoh: foto-AG007.jpg
			$ext_file = pathinfo($file_foto, PATHINFO_EXTENSION);
			$file_foto_rename = 'foto-' . $id_anggota . '.' . $ext_file;

			$dir_images = './images/';
			$path_image = $dir_images . $file_foto_rename;
			$file_foto = $file_foto_rename; // untuk keperluan Query INSERT

			move_uploaded_file($_FILES['foto']['tmp_name'], $path_image);
		} else {
			$file_foto = '-';
		}

		// Query
		$sql = "INSERT INTO anggota 
				VALUES('{$id_anggota}', '{$nama_lengkap}', '{$jenis_kelamin}', 
						'{$alamat}', '{$file_foto}', '{$status_aktif}')";
		$query = mysqli_query($db_conn, $sql);

		// mengalihkan halaman
		echo "<meta http-equiv='refresh' content='0; url=index.php?p=anggota'>";
	}
?>