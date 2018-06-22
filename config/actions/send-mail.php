<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../Autoloader.php';
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';


    $app = new App();
    $mail = new PHPMailer(true);

    $sender_name = '';
    $sender_email = '';


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

    $data = $_POST['register'];

/*
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = array('message' => 'Please enter a valid email address');
    } 

    try {
        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($email, $fullname);
        $mail->addReplyTo($sender_email, $sender_name);
            
            //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'New Message';
        $mail->Body = $body;
        $mail->AltBody = "";

        $mail->send();

        $response = array('result' => 'success', 'Status' => 200);
    } catch (Exception $e) {
        $response = array('result' => 'error', 'Status' => 500);
    }

    echo json_encode($response);
*/
?>