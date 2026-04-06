<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar</title>
</head>
<body>

    <h2>Upload Gambar</h2>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        Pilih gambar:
        <br><br>
        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" required>
        <br><br>
        <input type="submit" value="Upload Image">
    </form>

</body>
</html>