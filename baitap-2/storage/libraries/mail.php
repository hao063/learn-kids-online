<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class objMailer
{
    protected static $username;
    
    protected static $password;

    protected static $port;

    protected static $email;

    protected static $emailContent = [
        'subject',
        'body',
        'altbody'
    ];


    function __construct() 
    {
        $mailer_config = func_get_arg(0);

        self::$username = $mailer_config['username'];

        self::$password = $mailer_config['password'];

        self::$port = $mailer_config['port'];
    }

    public static function setMail($email, $emailContent)
    {
        self::$email = $email;
        self::$emailContent = $emailContent;
    }

    public static function toSendMail()
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = self::$username;
            $mail->Password   = self::$password;
            $mail->SMTPSecure = 'tls';
            $mail->Port       = self::$port;

            //Recipients
            $mail->setFrom(self::$username, 'Pizzeria');
            $mail->addAddress(self::$email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = self::$emailContent['subject'];
            $mail->Body    = self::$emailContent['body'];
            $mail->AltBody = self::$emailContent['altbody'];

            $mail->send();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
}