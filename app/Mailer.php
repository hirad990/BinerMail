<?php
namespace BinerMail;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public function send(string $from,string $password,string $to,string $subject,string $body,?array $attachment=null):void
    {
        $c=require __DIR__.'/../config/mail.php';
        $m=new PHPMailer(true);
        $m->isSMTP();
        $m->Host=$c['smtp_host'];
        $m->Port=$c['smtp_port'];
        $m->SMTPAuth=true;
        $m->Username=$from;
        $m->Password=$password;
        $m->SMTPSecure=$c['smtp_secure'];
        $m->CharSet='UTF-8';
        $m->setFrom($from,$from);
        $m->addAddress($to);
        $m->Subject=$subject;
        $m->Body=$body;
        $m->AltBody=$body;
        $m->isHTML(false);

        if($attachment && ($attachment['error'] ?? UPLOAD_ERR_NO_FILE)!==UPLOAD_ERR_NO_FILE){
            if(($attachment['error'] ?? UPLOAD_ERR_OK)!==UPLOAD_ERR_OK){
                throw new \RuntimeException('Attachment upload failed');
            }
            $max=(int)config('max_attachment_mb',10)*1024*1024;
            if(($attachment['size'] ?? 0)>$max){
                throw new \RuntimeException('Attachment is too large');
            }
            if(!isset($attachment['tmp_name']) || !is_uploaded_file($attachment['tmp_name'])){
                throw new \RuntimeException('Invalid attachment');
            }
            $name=basename((string)($attachment['name'] ?? 'attachment'));
            if($name==='.' || $name==='..' || $name==='')$name='attachment';
            $m->addAttachment($attachment['tmp_name'],$name);
        }

        $m->send();
    }
}
