<?php

namespace app\Controllers;

use app\Models\Klijent;
use app\Models\Prodaja;
use app\Models\Usluga;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class MailSenderController {

    public function sendClientSaleReport($id) {
        $prodaja = new Prodaja();
        $data = $prodaja->getDataForClientReport($id);
        $clientEmail = $data[0]->email;
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'ivanlekic11@gmail.com';                     // SMTP username
            $mail->Password   = 'gunsroses988';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('reports@efirma.com', 'eFirma - Izvestaj');
            $mail->addAddress($clientEmail);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Izvestaj';
            $mail->Body    = "Postovani, obavljena je usluga:{$data[0]->usluga}, datum usluge: {$data[0]->datum}, cena usluge: {$data[0]->cena}. S postovanjem, eFirma.";

            $mail->send();
            echo 'Email je poslat klijentu';

        } catch (\Exception $e) {

            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }


    }
}


