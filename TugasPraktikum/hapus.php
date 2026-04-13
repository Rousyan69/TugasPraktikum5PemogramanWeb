<?php
include 'config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT foto FROM laporan WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (file_exists('uploads/' . $data['foto'])) {
    unlink('uploads/' . $data['foto']);
}

mysqli_query($conn, "DELETE FROM laporan WHERE id='$id'");
header("Location: dashboard.php");
?>