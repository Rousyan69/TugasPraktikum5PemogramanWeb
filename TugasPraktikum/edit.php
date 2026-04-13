<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM laporan WHERE id='$id'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan</title>
</head>
<body>
    <h2>Edit Laporan</h2>

    <form action="proses_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="foto_lama" value="<?php echo $row['foto']; ?>">

        <label>Nama Pelapor</label><br>
        <input type="text" name="nama_pelapor" value="<?php echo $row['nama_pelapor']; ?>" required><br><br>

        <label>Judul Laporan</label><br>
        <input type="text" name="judul_laporan" value="<?php echo $row['judul_laporan']; ?>" required><br><br>

        <label>Kategori</label><br>
        <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>" required><br><br>

        <label>Lokasi</label><br>
        <input type="text" name="lokasi" value="<?php echo $row['lokasi']; ?>" required><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea><br><br>

        <label>Upload Foto Baru</label><br>
        <input type="file" name="foto" accept="image/*"><br><br>

        <button type="submit" name="update">Update</button>
    </form>

    <br>
    <a href="dashboard.php">Kembali</a>
</body>
</html>