<?php
return [
    'smtp_host'=>getenv('SMTP_HOST') ?: 'mail.binercraft.ir',
    'smtp_port'=>(int)(getenv('SMTP_PORT') ?: 465),
    'smtp_secure'=>getenv('SMTP_SECURE') ?: 'ssl',
    'imap_host'=>getenv('IMAP_HOST') ?: 'mail.binercraft.ir',
    'imap_port'=>(int)(getenv('IMAP_PORT') ?: 993),
    'imap_encryption'=>getenv('IMAP_ENCRYPTION') ?: 'ssl',
    'imap_validate_cert'=>filter_var(getenv('IMAP_VALIDATE_CERT') ?: 'true',FILTER_VALIDATE_BOOLEAN),
];
