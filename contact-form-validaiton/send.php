
<?php

/* php check
echo "PHP script is running.";
error_reporting(E_ALL);
ini_set('display_errors', 1); */

$name="";
$email="";
$subject="";
$message="";
$validation_errors=[];

//satnitize function - remove special & trim only
function sanitize_input($data){
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){


//validate name
    $name = sanitize_input($_POST["name"]);
    if (empty($name) || !preg_match("/^[a-zA-Z\s'-]+$/", $name)){
        $validation_errors["name"] = "Please type a valid name. Invalid name. Only letters, spaces, hyphens, and apostrophes are allowed.";
    } 

//validate email
    $email = sanitize_input($_POST["email"]);
   
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validation_errors["email"] = "Please type a valid email.";
    }

//validate subject
    $subject = sanitize_input($_POST["subject"]);

    if (empty($subject)) {
        $validation_errors["subject"] = "Please give the message a subject.";
    };
    if (strlen($subject) > 150) {
        $validation_errors["subject"] = "The subject muts be less than 150 characters.";
    };

    //validate content
    $message = sanitize_input($_POST["message"]);
    if (empty($message)) {
        $validation_errors["message"] = "Nothing to say?";
    };
    if (strlen($message) > 5000) {
        $validation_errors["message"] =  "The message must be less than 5000 characters.";
    };

if (!empty($validation_errors)) {
    include ("contact_form.php");
   
   
    /* echo "<h2> Validation error(s):</h2>";
    foreach ($validation_errors as $field => $error){
        echo "<br><p><strong>{$field}:</strong>{$error}";
    };*/
    } else {

         //Secret Key from Google reCAPTCHA
        $secretKey = "6LfIhr4qAAAAAIxfC-FfAnSzetzeVF-9mLotfkjB";
        //Get the reCAPTCHA respones from the form
        $token = $_POST['recaptcha_token'];

        //Verify the reCAPTCHA response
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$token");
        $responseKeys = json_decode($response);    

        //if valid
        if ($responseKeys->success && $responseKeys->score >= 0.5) {

            $to = "5star@wp.pl";
             $headers =   "From: ".$name. "\r\n" .
                    "Reply-To: ".$email. "\r\n" .
                    "X-Mailer: PHP/" . phpversion();
            $email_body = "You have received a new message from your contact form.\n\n" .
                      "Name: $name\n" .
                      "Email: $email\n" .
                      "Subject: $subject\n\n" .
                      "Message:\n$message";
        

            if (mail($to, $subject, $email_body, $headers)) {
                    echo "<h2 class='succes__msg'> Message sent sucessfuly!</h2>";
            } else {
                    echo "<h2 class='error__msg'>Failed to send the message. Please try again later</h2>";
                     }
        } else {
            //CAPTCHA failed
            echo "Please complete the CAPTCHA to submit the form.";
        }
    
        // echo "Message sucessfully send!";
    }   

}

//echo "Message Sucessfully Sent!";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form Validation</title>
    <link rel="stylesheet" href="./css/style.css"?v=1.1>
</head>
<body>