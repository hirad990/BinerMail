# BinerMail deployment on cPanel

## 1. Mail DNS
`binercraft.ir` must have working MX records pointing to the server that hosts the BinerMail mailboxes. The SMTP/IMAP host in `.env` must resolve to that mail server.

## 2. PHP
Use PHP 8.2+ with `curl`, `openssl`, `mbstring`, `pdo_mysql` and the PHP IMAP support required by the installed Webklex driver.

## 3. Database
Create/use the MySQL database and user from cPanel. Import `database/schema.sql` into phpMyAdmin.

## 4. Composer
Run `composer install --no-dev` in the project directory. If Composer is not available in cPanel, run it locally and upload the resulting `vendor/` directory.

## 5. Environment
Copy `.env.example` to `.env` and fill in the real values. Generate a 64-character hex `APP_KEY` and keep it secret. Never commit `.env` or the cPanel API token.

## 6. cPanel API token
Create a cPanel API token for the account that owns `binercraft.ir`. The token is used server-side to create, change and delete mailboxes. Do not expose it to JavaScript.

## 7. Web root
Recommended: point the `/mail` site/subdirectory document root to the repository's `public/` directory. If `/mail` is a directory inside `public_html`, copy the contents of `public/` there and keep `app`, `config` and `vendor` outside the public web root when possible.

## 8. First test
- Open `/mail/register.php` and create a test mailbox.
- Confirm the account appears in cPanel Email Accounts.
- Log in at `/mail/login.php`.
- Confirm IMAP loads Inbox.
- Send a test message to another address.
- Open `/mail/dev.php`, create an OAuth client and test the authorization-code flow.

## OAuth endpoints
- Authorization: `/mail/oauth/authorize`
- Token: `/mail/oauth/token`
- UserInfo: `/mail/api/oauth/userinfo`
- Developer portal: `/mail/dev.php`

## Important production hardening
Use HTTPS, keep `.env` outside the public root, restrict the cPanel token to required API permissions, configure correct MX/SPF/DKIM/DMARC records, and use a real SMTP/IMAP hostname with a valid TLS certificate.
