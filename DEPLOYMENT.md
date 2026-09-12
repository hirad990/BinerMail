# BinerMail deployment on cPanel

## 1. Mail DNS
`binercraft.ir` must have working MX records pointing to the server that hosts the BinerMail mailboxes. The SMTP/IMAP host in `.env` must resolve to that mail server.

For reliable delivery also configure SPF, DKIM and DMARC for the same mail service.

## 2. PHP
Use PHP 8.1+ with `curl`, `openssl`, `mbstring`, `pdo_mysql` and the PHP IMAP support required by the installed Webklex driver.

## 3. Database
Create/use the MySQL database and user from cPanel. Import `database/schema.sql` into phpMyAdmin.

## 4. Composer
Run `composer install --no-dev` in the project directory. This installs PHPMailer, Webklex PHP-IMAP and Dotenv. If Composer is not available in cPanel, run it locally and upload the resulting `vendor/` directory.

## 5. Environment
Copy `.env.example` to `.env` and fill in the real values. Generate a 64-character hex `APP_KEY` and keep it secret. BinerMail now loads `.env` automatically at runtime. Never commit `.env` or the cPanel API token.

## 6. cPanel API token
Create a cPanel API token for the account that owns `binercraft.ir`. The token is used server-side to create mailboxes. Do not expose it to JavaScript.

## 7. Mail server
BinerMail uses the actual cPanel mailbox as its mail server. SMTP is used for sending and IMAP is used for receiving. The application does not fake or store mail messages itself.

Default production endpoints:
- SMTP: `mail.binercraft.ir:465` with SSL
- IMAP: `mail.binercraft.ir:993` with SSL

Use a hostname with a valid TLS certificate. `IMAP_VALIDATE_CERT=true` is the production default.

## 8. Web root
Recommended: point the `/mail` site/subdirectory document root to the repository's `public/` directory. If `/mail` is a directory inside `public_html`, copy the contents of `public/` there and keep `app`, `config` and `vendor` outside the public web root when possible.

## 9. First test
1. Open `/mail/register.php` and create a test mailbox.
2. Confirm the account appears in cPanel Email Accounts.
3. Log in at `/mail/login.php`.
4. Confirm IMAP loads the real Inbox.
5. Send a test message to another address.
6. Reply to that message from the external mailbox and refresh BinerMail.
7. Test an attachment within the configured size limit.
8. Open `/mail/dev.php`, create an OAuth client and test the authorization-code flow.

## OAuth endpoints
- Authorization: `/mail/oauth/authorize`
- Token: `/mail/oauth/token`
- UserInfo: `/mail/api/oauth/userinfo`
- Developer portal: `/mail/dev.php`

## Important production hardening
Use HTTPS, keep `.env` outside the public root, restrict the cPanel token to required API permissions, configure correct MX/SPF/DKIM/DMARC records, and use a real SMTP/IMAP hostname with a valid TLS certificate.
