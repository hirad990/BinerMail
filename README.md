# BinerMail

BinerMail is a PHP/MySQL webmail platform for `name@binercraft.ir`, designed for cPanel hosting and a polished responsive UI.

## Included
- cPanel UAPI mailbox provisioning
- Secure password hashing + encrypted mailbox credential storage
- SMTP sending with PHPMailer
- IMAP inbox reading
- OAuth authorization-code server
- Developer portal at `/mail/dev.php`
- OAuth UserInfo endpoint for website login
- MySQL schema and cPanel deployment guide
- Font Awesome UI, responsive dark/light styling
- Locale foundation for Persian, English, Arabic, Spanish and German

## Important
The application does not replace the underlying mail server. cPanel must provide the actual mailbox service, SMTP and IMAP, and DNS MX records must point to that mail server.

Production secrets belong in `.env`, never in GitHub.

See `DEPLOYMENT.md` for cPanel setup.