<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../Autoloader.php';
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';


    $generate = new App();
    $mail = new PHPMailer(true);

    $company_name = $stockfox->CompanyName;
    $company_email = $stockfox->CompanyEmail;

    $server_folder = $stockfox->ServerFolder;

    $errors = array();
    $success = array();

    //Server settings                               
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $stockfox->MailHost;                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = $stockfox->MailSMTPAuth;                               // Enable SMTP authentication
    $mail->Username = $stockfox->MailUsername;                 // SMTP username
    $mail->Password = $stockfox->MailPassword;                           // SMTP password
    //$mail->SMTPSecure = $stockfox->MailSMTPSecure;                          // Enable TLS encryption, `ssl` also accepted
    $mail->Port = $stockfox->MailPort;                                      // TCP port to connect to

    if (!isset($_POST['register'])) {
        $errors[] = array('message' => 'Please enter your details to sign up.');
        $_SESSION['ERRORS'] = $errors;
        header("Location: ../../../register");
        exit();
    }

    $data = $_POST['register'];


    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = array('message' => 'Please enter a valid email address');
    } else {
        $query = Database::query("SELECT `email` FROM `app_users` WHERE `email` = '{$data['email']}'");

        if (!empty($query)) {
            $errors[] = array('message' => 'Email provided is already in use. <strong class="text-danger"><a href="?type=login">Click here to login</a></strong>');
        }

    }

    try {
        //Recipients
        $mail->setFrom($company_email, $company_name);
        $mail->addAddress($email, $fullname);
        $mail->addReplyTo($company_email, $company_name);
            
            //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Activate Account';
        $mail->Body = $body;
        $mail->AltBody = 'To activate your account, please click on this link: ' . $activation_link;

        $mail->send();
    } catch (Exception $e) {
        $errors[] = array('message' => 'Message could not be sent.');
    }
?>