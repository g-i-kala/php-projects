<html>
<body>
<!--Your code goes here-->
  <?=
    "The sum of {$_GET['add_val1']} and {$_GET['add_val2']} is: "
  ?>
  <h4> 
    <?= $_GET['add_val1']+$_GET['add_val2']
    ?>
  </h4>
<a href="index.php"><br>Reset</a>
</body>
</html>