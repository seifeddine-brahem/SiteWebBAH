<?php

require_once 'vendor/autoload.php';
if(isset($_POST['submit'])){
    $phoneNumber = $_POST['phone'];
    $message1 = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

$transport = new Swift_SmtpTransport("smtp.gmail.com", 587,'tls');
$transport->setUsername("sitetestbrh@gmail.com"); //email sitetestbrh@gmail.com
$transport->setPassword("startx47."); //password : startx47.

// Create the message
$message =  new Swift_Message();
$message->setTo(array(
    "sitetestbrh@gmail.com" => "Contact us",
));
$message->setSubject($subject);
$message->setBody("Mr/Ms ".$name." Want to contact with you about ".$subject." and he/she left you a message \n\n"
            .$message1."\n"."\nyou cant contact her with phone : ".$phoneNumber." or email : "
            .$email.".");
$message->setFrom($email, "Your Website Contact form");
//$message->attach(Swift_Attachment::fromPath("path/to/file/file.zip"));

// Send the email
$mailer = new Swift_Mailer($transport);
$mailer->send($message, $failedRecipients);
header('Location : contact-us.html');

// Show failed recipients
//print_r($failedRecipients);
}