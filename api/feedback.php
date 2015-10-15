<?php
/**
 * Created by 5to5 Web.
 * User: Nik
 * Date: 23.08.14
 * Time: 13:57 
 */
require 'core/core.php';

use core\TemplateEngine;
use lib\PHPMailer;

try
{
    print(feedback());
}
catch (Exception $e)
{
    print('error');
}


function feedback()
{
    if(!isset($_POST['formData']))
        throw new Exception('No post data');
    $data = $_POST['formData'];

    $templateEngine = new TemplateEngine();
    $mailBody = $templateEngine->render('view/feedback.php',$data);

    $config = require('config.php');
    $config = $config['mailer'];
    $mail = new PHPMailer();

    $mail->setFrom($config['from']['mail'], $config['from']['name']);

    foreach($config['to'] as $reciever) {
        $mail->addAddress($reciever['mail'], $reciever['name']);
    }
    
    $mail->Subject = $config['subject'];
    $mail->msgHTML($mailBody);

    if (!$mail->send())
    {
        throw new Exception('Mail was not sent! Mailer error!');
    }

    return 'ok';
}
