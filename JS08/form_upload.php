<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <input type="submit" name="submit" value="Upload File">
    </form>
</body>

</html>