<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

if (isset($send_email) && $send_email == true) {
     //Create an instance; passing `true` enables exceptions
     $mail = new PHPMailer(true);

     try {
          $mail->CharSet = 'UTF-8';
          $mail->Encoding = 'base64';
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->SMTPOptions = array(
               'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
               )
          );
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'maohiemgia3@gmail.com';                     //SMTP username
          $mail->Password   = 'chudkttaylmelhkg';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('maohiemgia3@gmail.com', 'LTN Company');
          $mail->addAddress($inp_email);     //Add a recipient
          // $mail->addAddress('maohiemgia@gmail.com');               //Name is optional
          $mail->addReplyTo('maohiemgia3@gmail.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          //Attachments
          // $mail->addAttachment($file['tmp_name'], $file['name']);       //Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = "$email_subject";

          $mail->Body = "$email_body";

          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          if ($mail->send()) {
               if (isset($email_sent_success_display)) {
                    echo $email_sent_success_display;
               }
               $formSuccess = 'sent success';
          };
     } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
};
