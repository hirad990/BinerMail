<?php namespace BinerMail;
use PHPMailer\PHPMailer\PHPMailer;
class Mailer{public function send(string $from,string $password,string $to,string $subject,string $body):void{$c=require __DIR__.'/../config/mail.php';$m=new PHPMailer(true);$m->isSMTP();$m->Host=$c['smtp_host'];$m->Port=$c['smtp_port'];$m->SMTPAuth=true;$m->Username=$from;$m->Password=$password;$m->SMTPSecure=$c['smtp_secure'];$m->CharSet='UTF-8';$m->setFrom($from,$from);$m->addAddress($to);$m->Subject=$subject;$m->Body=$body;$m->isHTML(false);$m->send();}}
