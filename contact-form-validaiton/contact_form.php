<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="./css/style.css"?v=1.1>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfIhr4qAAAAAIF5jjv483ya9OB6LGOykMddl-Q1"></script>
</head>
<body>
    <section class="page">
    <div class="page__container">
        <div class="header__wrapper">
            <h2>Get in Touch!</h2>
        </div>
        <div class="form__wrapper">
            <form class="contact__form" id="contact-form" action="send.php" method="POST">
                <div class="form__group__wrapper">
                <label for="name">Name:</label>
                <input class="input__field" type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                
                <?php 
                    if (isset($validation_errors["name"])){
                        echo '<span class="error__msg">'.htmlspecialchars($validation_errors["name"])."</span>";
                    };
                ?> 
                </div>
                <div class="form__group__wrapper">
                <label for="email">Email:</label>
                <input class="input__field" type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : '';  ?>" required>
                
                <?php 
                if (!empty($validation_errors["email"])) {
                    echo '<span class="error__msg">' . htmlspecialchars($validation_errors["email"]) . '</span>';
                }
                ?>
                </div>
                <div class="form__group__wrapper">
                <label for="subject">Subject:</label>
                <input class="input__field" type="text" id="subject" name="subject" value="<?php echo isset($subject) ? htmlspecialchars($subject) : '';  ?>" required>
                
                    <?php 
                        if (!empty($validation_errors["subject"])) {
                        echo '<span class="error__msg">' . htmlspecialchars($validation_errors["subject"]) . '</span>';
                        }   
                    ?>
                </div>
                <div class="form__group__wrapper">
                <label for="message">Message:</label>
                <textarea class="input__field"  id="message" name="message" value="<?php echo isset($message) ? htmlspecialchars($message) : '';  ?>" required></textarea>
                
                    <?php 
                        if (!empty($validation_errors["message"])) {
                        echo '<span class="error__msg">' . htmlspecialchars($validation_errors["message"]) . '</span>';
                        }   
                    ?>
                <br>
                </div>
                <div class="form__group__wrapper form__group__wrapper--send">
                <button class="btn" type="submit">Send</button> 
                </div>
        </form>
    </div>
    <script>
        // When the form is submitted, get the reCAPTCHA token and add it to the form
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            grecaptcha.execute('6LfIhr4qAAAAAIF5jjv483ya9OB6LGOykMddl-Q1', {action: 'submit'}).then(function(token) {
                // Add the reCAPTCHA token to the form
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'recaptcha_token';
                input.value = token;
                document.getElementById('contact-form').appendChild(input);
                // Submit the form
                document.getElementById('contact-form').submit();
            });
        });
    </script>
    </div>
    </section>
</body>
</html>






