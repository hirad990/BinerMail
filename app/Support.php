<?php namespace BinerMail;
function config(string $key,mixed $default=null):mixed{static $c;$c??=array_merge(require __DIR__.'/../config/app.php',require __DIR__.'/../config/mail.php',require __DIR__.'/../config/cpanel.php');return $c[$key]??$default;}
function e(mixed $v):string{return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function redirect(string $path):never{header('Location: '.(str_starts_with($path,'http')?$path:rtrim(config('url'),'/').'/'.ltrim($path,'/')));exit;}
function json_response(array $data,int $status=200):never{http_response_code($status);header('Content-Type: application/json; charset=utf-8');echo json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);exit;}
function csrf_token():string{if(empty($_SESSION['_csrf']))$_SESSION['_csrf']=bin2hex(random_bytes(32));return $_SESSION['_csrf'];}
function csrf_check():void{if(!hash_equals($_SESSION['_csrf']??'',$_POST['_csrf']??''))json_response(['error'=>'Invalid CSRF token'],419);}
function random_token(int $bytes=32):string{return rtrim(strtr(base64_encode(random_bytes($bytes)),'+/','-_'),'=');}
function token_hash(string $token):string{return hash('sha256',$token);}
