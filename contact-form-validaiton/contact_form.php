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
        <input type="text" id="name" name="name" required>
        <br>
        
        <?php 
            if (isset($validation_errors["name"])){
                echo $validation_errors["name"];
            };
        ?> 
        
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>
        <br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <button type="submit">Send</button> 
    </form>
</body>
</html>






