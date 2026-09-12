<?php
return ['name'=>getenv('APP_NAME') ?: 'BinerMail','url'=>rtrim(getenv('APP_URL') ?: 'http://localhost/mail','/'),'env'=>getenv('APP_ENV') ?: 'production','key'=>getenv('APP_KEY') ?: '','session'=>getenv('SESSION_NAME') ?: 'binermail_session','domain'=>strtolower(getenv('MAIL_DOMAIN') ?: 'binercraft.ir'),'max_attachment_mb'=>(int)(getenv('MAX_ATTACHMENT_MB') ?: 10)];
