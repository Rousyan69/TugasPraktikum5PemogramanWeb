<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $nama_pelapor = $_POST['nama_pelapor'];
    $judul_laporan = $_POST['judul_laporan'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];

    $namaFile = $_FILES['foto']['name'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];

    if ($error === 0) {
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (in_array($ekstensi, $ekstensiValid)) {
            $namaBaru = time() . '_' . $namaFile;
            move_uploaded_file($tmpName, 'uploads/' . $namaBaru);

            $query = "INSERT INTO laporan (nama_pelapor, judul_laporan, kategori, lokasi, deskripsi, foto)
                      VALUES ('$nama_pelapor', '$judul_laporan', '$kategori', '$lokasi', '$deskripsi', '$namaBaru')";

            mysqli_query($conn, $query);

            header("Location: dashboard.php");
        } else {
            echo "Format file tidak didukung. Hanya jpg, jpeg, png.";
        }
    } else {
        echo "Upload file gagal.";
    }
}
?>