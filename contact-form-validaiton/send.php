
<?php
echo "PHP script is running.";
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    echo "<h2> Validation error(s):</h2>";
    /*foreach ($validation_errors as $field => $error){
        echo "<br><p><strong>{$field}:</strong>{$error}";
    };*/
    } else {
        echo "Form send!";
    }   


}

//echo "Message Sucessfully Sent!";

?>
