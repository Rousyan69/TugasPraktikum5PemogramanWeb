<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard SmartResident</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION['username']; ?></h2>
    <a href="form_tambah.php">Tambah Laporan</a> |
    <a href="logout.php">Logout</a>

    <h3>Data Laporan</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Pelapor</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_pelapor']; ?></td>
            <td><?php echo $row['judul_laporan']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['lokasi']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td>
                <img src="uploads/<?php echo $row['foto']; ?>" width="100">
            </td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>