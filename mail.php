<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/PHPMailer-master/src/POP3.php';
require 'PHPMailer-master/PHPMailer-master/src/OAuth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$developmentMode = false;
//Create an instance; passing `true` enables exceptions
$mailer = new PHPMailer($developmentMode);

$mailer->isSMTP();
try {
    $mailer->SMTPDebug = 4;

if ($developmentMode) {
$mailer->SMTPOptions = [
    'ssl'=> [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    ]
];
}


$mailer->Host = 'dthlweb.com';
$mailer->SMTPAuth = true;
$mailer->Username = 'info@dthlweb.com';
$mailer->Password = 'Haidang86.';
$mailer->SMTPSecure = 'tls'; //'tls'
// $mailer->SMTPAutoTLS = false;
$mailer->Port = 587; //587, 465, 25, 2525 have been tested

$mailer->setFrom('info@dthlweb.com', 'Hai Dang Admin');
$mailer->addAddress('tranhaidang.la@rmit.edu.vn', 'Recipient');

//Content
$mailer->isHTML(true); // Set email format to HTML
$mailer->Subject = 'Here is the subject';
$mailer->Body = 'Xác thực email';
$mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mailer->send();
// $mailer->ClearAllRecipients();
echo "MAIL HAS BEEN SENT SUCCESSFULLY";
} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    }
?>