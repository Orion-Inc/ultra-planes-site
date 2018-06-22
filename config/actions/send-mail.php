<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'Autoloader.php';
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';


    $app = new App();
    $mail = new PHPMailer(true);


    $errors = array();
    $success = array();

    //Server settings                               
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $app->MailHost;                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = $app->MailSMTPAuth;                               // Enable SMTP authentication
    $mail->Username = $app->MailUsername;                 // SMTP username
    $mail->Password = $app->MailPassword;                           // SMTP password
    //$mail->SMTPSecure = $app->MailSMTPSecure;                          // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $app->MailPort;                                      // TCP port to connect to

    $orion_email = $app->MailUsername;
    $orion_name = 'Orion Ltd.';

    $data = $_POST;

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $response = 'Please enter a valid email address.';
    }

    $sender_name = $data['name'];
    $sender_email = $data['email'];
    $sender_message = $data['description'];

    $body = "
        <p>From: {$sender_name}</p>
        <p>Email: <a href='mailto:{$sender_email}'>{$sender_email}</a></p>
        <hr>
        <p>{$sender_message}</p>
    ";

    try {
        //Recipients
        $mail->setFrom($orion_email, $orion_name);
        $mail->addAddress('games.oriongh@gmail.com', 'Orion Games');
        $mail->addReplyTo($orion_email, $orion_name);
            
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'New Message';
        $mail->Body = $body;
        $mail->AltBody = "From:{$sender_name}\n Email:{$sender_email} \n Message:{$sender_message}";

        $mail->send();

        $response = array('result' => 'success', 'Status' => 200);
    } catch (Exception $e) {
        $response = array('result' => 'error', 'Status' => 500, 'msg' => 'An error occured while trying to send the message. Please try again.');
    }

    echo json_encode($response);
?>