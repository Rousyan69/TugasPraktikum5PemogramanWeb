<?php
require_once 'start.php'; // Memastikan sesi telah dimulai

session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghapus session dari server

echo "Session telah dihapus."; // Menampilkan pesan bahwa session telah dihapus
?>