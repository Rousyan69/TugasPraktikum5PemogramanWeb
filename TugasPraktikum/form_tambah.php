<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan</title>
</head>
<body>
    <h2>Tambah Laporan Fasilitas</h2>

    <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
        <label>Nama Pelapor</label><br>
        <input type="text" name="nama_pelapor" required><br><br>

        <label>Judul Laporan</label><br>
        <input type="text" name="judul_laporan" required><br><br>

        <label>Kategori</label><br>
        <select name="kategori" required>
            <option value="">--Pilih Kategori--</option>
            <option value="Jalan Rusak">Jalan Rusak</option>
            <option value="Lampu Mati">Lampu Mati</option>
            <option value="Sampah">Sampah</option>
            <option value="Drainase">Drainase</option>
        </select><br><br>

        <label>Lokasi</label><br>
        <input type="text" name="lokasi" required><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" required></textarea><br><br>

        <label>Upload Foto</label><br>
        <input type="file" name="foto" accept="image/*" required><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <br>
    <a href="dashboard.php">Kembali</a>
</body>
</html>