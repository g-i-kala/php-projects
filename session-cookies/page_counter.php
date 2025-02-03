<?php
session_start();
echo session_id()."</br>";

/*if(isset($_SESSION["counter"])) {
    $_SESSION["counter"]++;
} else {
    $_SESSION["counter"] = 1;
}; */

 $_SESSION["counter"] ??=0;
 $_SESSION["counter"]++;



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>You have been on this page <?php echo $_SESSION["counter"] ?> times</h1>
</body>
</html>