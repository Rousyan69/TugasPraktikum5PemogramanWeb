<?php

$uploadDir = 'uploads/';
$imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION));
$allowedTypes = ['jpg', 'jpeg', 'png'];

// Untuk memeriksa apakah gambar terupload atau tidak
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileToUpload'])) {

    // Untuk memeriksa apakah gambar asli atau bukan
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    // Memeriksa apakah sesuai format gambar yang dibolehkan
    if ($check !== false && in_array($imageFileType, $allowedTypes)) {

        // Memeriksa nama file gambar yang sudah tersimpan dengan format angka untuk menghindari nama duplikat
        $files = glob($uploadDir . "*.*");
        $highestNumber = 0;
        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if (is_numeric($filename) && $filename > $highestNumber) {
                $highestNumber = (int)$filename;
            }
        }

        // Menyimpan gambar sebagai angka tertinggi + 1 dari file yang sudah ada di dalam folder uploads
        $newFileName = ($highestNumber + 1) . "." . $imageFileType;
        $targetFile = $uploadDir . $newFileName;

        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
            echo "File uploaded successfully as " . $newFileName;
        } else {
            echo "Error uploading file.";
        }

    } else {
        echo "File is not a valid image format/allowed.";
    }

} else {
    echo "File is not a valid image format/allowed.";
}
?>