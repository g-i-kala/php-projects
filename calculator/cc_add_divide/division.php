<html>
<body>

    <?=
    "The division of {$_GET['div_val1']} by {$_GET['div_val2']} is: "
  ?>
  <h4> 
    <?= $_GET['div_val1']/$_GET['div_val2']
    ?>
  </h4>
<a href="index.php"><br>Reset</a>
</body>
</html>