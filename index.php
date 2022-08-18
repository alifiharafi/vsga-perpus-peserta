<?php
	include './config/konfigurasi-umum.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard | Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
	<div id="wrapper">

		<header>
			<div id="header-banner" class="text-center">
				<h1>Perpustakaan Umum</h1>
				<h3>Jalan Kemerdekaan Indonesia No. 17 Bandung 1945</h3>
				<p>Telepon: (022) 7203155</h3>
			</div>
			<div id="user-info">
				<p>Hi, Admin Perpus!</p>
			</div>
		</header>

		<sidebar>
			<nav>
				<ul>
					<li><a href="index.php" title="Beranda">Beranda</a></li>
					<li class="section-menu">Data Master</li>
					<li><a href="index.php?p=anggota" title="Data Anggota">Data Anggota</a></li>
					<li><a href="index.php?p=buku" title="Data Buku">Data Buku</a></li>
					<li><a href="index.php?p=kategori" title="Data Kategori">Data Kategori</a></li>
					<li><a href="index.php?p=penulis" title="Data Penulis">Data Penulis</a></li>
					<li><a href="index.php?p=penerbit" title="Data Penerbit">Data Penerbit</a></li>
					<li class="section-menu">Data Transaksi</li>
					<li><a href="index.php?p=peminjaman" title="Data Penulis">Transaksi Peminjaman</a></li>
					<li><a href="index.php?p=pengembalian" title="Data Penerbit">Transaksi Pengembalian</a></li>
					<span class="separator"></span>
					<li><a href="logout.php" title="Logout">Logout</a></li>
				</ul>
			</nav>
		</sidebar>

		<?php
			/* Menentukkan halaman berdasarkan menu yang dipilih */
			$app_dir = 'app';

			$p = ''; // variable untuk menentukkan halaman yang dituju
			if(isset($_GET['p'])) { // memeriksa variable
				$p = $_GET['p'];
			}

			/* Lakukan include file *.php sesuai halaman yang dituju */
			if(!empty($p)) {
				$file = $app_dir . '/' . $p . '.php';

				if(file_exists($file)) { // memeriksa apakah file *.php tersedia?
					include $file;
				} else {
					include $app_dir . '/404.php';
				}
			} else {
				include $app_dir . '/beranda.php';
			}
		?>

		<footer class="text-center">
			<p><?php echo $_SITE_INFO; ?></p>
			<p><?php echo $_SITE_CREDIT; ?></p>
		</footer>

	</div>

	<script src="./assets/js/app.js"></script>
</body>
</html>
