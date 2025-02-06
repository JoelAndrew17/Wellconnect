<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$data = file_get_contents('php://input');
$json_data = json_decode($data, true);

if (isset($json_data['userName'], $json_data['userEmail'], $json_data['userPhone'], $json_data['userState'], $json_data['finalAmount'])) {
    $userName = $json_data['userName'];
    $userEmail = $json_data['userEmail'];
    $userPhone = $json_data['userPhone'];
    $userState = $json_data['userState'];
    $finalAmount = $json_data['finalAmount'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp';
        $mail->SMTPAuth = true;
        $mail->Username = 'email@xy.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('senderemail.com', 'Dev Up');
        $mail->addAddress('receiveremail.com', $userName);

        $mail->isHTML(true);
        $mail->Subject = 'New Lead Generated';
        $mail->Body = "UserName: <b>$userName</b><br> Email: <b>$userEmail</b><br> Phone: <b>$userPhone</b><br> State: <b>$userState</b><br> Amount: <b>$finalAmount</b>";
        $mail->AltBody = 'This is the plain text version of the email content';

        $mail->send();

        echo json_encode(['status' => 200, 'message' => 'Email sent successfully']);
    } catch (Exception $e) {
        echo json_encode(['status' => 500, 'message' => "Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(['status' => 400, 'message' => 'Invalid data']);
}

?>
