<?php
session_start();
include 'config/koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_pelapor = $_POST['nama_pelapor'];
    $judul_laporan = $_POST['judul_laporan'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $fotoLama = $_POST['foto_lama'];

    if ($_FILES['foto']['name'] != '') {
        $namaFile = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $ekstensiValid = ['jpg', 'jpeg', 'png'];

        if (in_array($ekstensi, $ekstensiValid)) {
            $namaBaru = time() . '_' . $namaFile;
            move_uploaded_file($tmpName, 'uploads/' . $namaBaru);

            if (file_exists('uploads/' . $fotoLama)) {
                unlink('uploads/' . $fotoLama);
            }

            $foto = $namaBaru;
        } else {
            echo "Format file tidak valid.";
            exit;
        }
    } else {
        $foto = $fotoLama;
    }

    $query = "UPDATE laporan SET
                nama_pelapor='$nama_pelapor',
                judul_laporan='$judul_laporan',
                kategori='$kategori',
                lokasi='$lokasi',
                deskripsi='$deskripsi',
                foto='$foto'
              WHERE id='$id'";

    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}
?>