<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

function sendMail($destinatarios, $subject, $msg, $attachments = [])
{
    try {
        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug = 2; // cambiar a 0 para no ver mensajes de error
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;

        $mail->Username = "pruebasdawjm@gmail.com"; // Usuario de google
        $mail->Password = "kpatwwzlnbqlukmx"; // Clave
        $mail->SetFrom('user@gmail.com', 'Test');

        $mail->Subject = $subject;
        $mail->msgHTML($msg);

        if (!empty($attachments)) {
            foreach ($attachments as $file) {
                $mail->addAttachment($file);
            }
        }

        if (is_array($destinatarios)) {
            foreach ($destinatarios as $name => $destinatario) {
                $mail->addAddress($destinatario, $name);
            }
        } elseif (is_string($destinatarios)) {
            $mail->addAddress($destinatarios);
        }

        $resul = $mail->Send();
        if (!$resul) { //Se comprueba según se haya enviado
            echo "Error " . $mail->ErrorInfo;
        } else {
            echo "Enviado";
        }
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Error " . $e->getMessage();
    }
}