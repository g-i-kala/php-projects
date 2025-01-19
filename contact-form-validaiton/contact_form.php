<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h2>Get in Touch!</h2>
    <form action="send.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
        <br>
        <?php 
            if (isset($validation_errors["name"])){
                echo '<span style="color: red;">'.htmlspecialchars($validation_errors["name"])."</span>";
            };
        ?> 
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : '';  ?>" required>
        <br>
            <?php 
              if (!empty($validation_errors["email"])) {
                echo '<span style="color: red;">' . htmlspecialchars($validation_errors["email"]) . '</span>';
              }
            ?>
        <br>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo isset($subject) ? htmlspecialchars($subject) : '';  ?>" required>
        <br>
             <?php 
                if (!empty($validation_errors["subject"])) {
                echo '<span style="color: red;">' . htmlspecialchars($validation_errors["subject"]) . '</span>';
                }   
?>
        <br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" value="<?php echo isset($message) ? htmlspecialchars($message) : '';  ?>" required></textarea>
        <br>
             <?php 
                if (!empty($validation_errors["message"])) {
                echo '<span style="color: red;">' . htmlspecialchars($validation_errors["message"]) . '</span>';
                }   
?>
        <br>
        <button type="submit">Send</button> 
    </form>
</body>
</html>






