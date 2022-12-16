<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function enviarCorreo($email, $subject, $nombre_client, $password)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Host = env('MAIL_HOST');
            $mail->Port = 465;
            $mail->IsHTML(true);
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Amate', false);
            $mail->CharSet = "UTF8";
            $mail->Subject = $subject;

            //$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/public/images/mail/BannerMailing.jpg', 'img_header', '/images/mail/BannerMailing.jpg', 'base64', 'image/jpg');
            //$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
            //$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage("images/mail/BannerMailing.png", "img_header");
            $mail->AddEmbeddedImage("images/icons/facebook.png", "correo_facebook");
            $mail->AddEmbeddedImage("images/icons/instagram.png", "correo_instagram");

            $title = '';
            $mail->Body = view('emails.register', compact(
                'title',
                'email',
                'nombre_client',
                'password'
            ))->render();
            $mail->addAddress($email, $nombre_client);
            if ($mail->Send()) {
                return 200;
            } else {
                dd('error');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function enviarCorreoContacto($name, $email, $phone, $asuno, $mensaje)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Host = env('MAIL_HOST');
            $mail->Port = 465;
            $mail->IsHTML(true);
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Amate', false);
            $mail->CharSet = "UTF8";
            $mail->Subject = $asuno;

            //$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/public/images/mail/contacto.png', 'img_header', '/images/mail/contacto.png', 'base64', 'image/png');
            //$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/public/images/icons/facebook.png', "correo_facebook", '/images/icons/facebook.png', 'base64', 'image/png');
            //$mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/public/images/icons/instagram.png', "correo_instagram", '/images/icons/instagram.png', 'base64', 'image/png');
            $mail->AddEmbeddedImage("images/mail/contacto.png", "img_header");
            $mail->AddEmbeddedImage("images/icons/facebook.png", "correo_facebook");
            $mail->AddEmbeddedImage("images/icons/instagram.png", "correo_instagram");

            $title = '';
            $mail->Body = view('emails.contacto', compact(
                'title',
                'email',
                'name',
                'phone',
                'asuno',
                'mensaje'
            ))->render();
            $mail->addAddress('contacto@amateudes.com', $name);
            if ($mail->Send()) {
                return 200;
            } else {
                dd('error');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
