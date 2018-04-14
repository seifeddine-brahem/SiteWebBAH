<?php
/**
 * Created by PhpStorm.
 * User: elbrh
 * Date: 4/14/18
 * Time: 12:13 AM
 */
require_once "Mail-1.4.1/Mail-1.4.1/Mail.php";

$from = 'EspaceSanteRoot@gmail.com';
$to = 'EspaceSanteRoot@gmail.com';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
    'host' => 'ssl://smtp.gmail.com',
    'port' => '465',
    'auth' => true,
    'username' => 'EspaceSanteRoot@gmail.com',
    'password' => 'esbeesbe'
));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}