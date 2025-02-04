<?php

//echo "<pre>";
//var_dump($_FILES); //from dump see the object => 
//echo "</pre>";

if (isset($_FILES['file'])) {
 
    $file = $_FILES['file']; // 'file' nazwa pola form
    $extention = pathinfo($file['name'], PATHINFO_EXTENSION);
    $extention = strtolower($extention);

    if ($file['size'] > 5*1024*1024) {
        $errorMessage = "You can upload more than 5Mb";
    } elseif (!in_array($extention,['png', 'jpeg', 'jpg'])) {
        $errorMessage = "You can upload only images.";
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']); //$_FILES['file']['name' - current folder
    }
   
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">Choose a file<br>
        <button type="submit" name="upload">Upload</button>
    </form>
    <p><?php echo isset($errorMessage) ? $errorMessage : ''; ?></p>
</body>
</html>