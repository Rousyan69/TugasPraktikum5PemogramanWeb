<?php
setcookie("user", "", time() - 3600, "/"); // Set waktu kedaluwarsa di masa lalu
echo "Cookie telah dihapus.";
?>