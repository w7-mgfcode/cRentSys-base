# Environment Setup & Prerequisites

> **Module**: System Setup & Runtime Environment  
> **Target Runtime**: PHP 5.2–5.6 / Compatibility Shims for PHP 7.x/8.x

---

## 1. System Requirements

### Production / Legacy Baseline:
- **Operating System**: Linux (Ubuntu 12.04/14.04/16.04, Debian 7/8, CentOS 6/7)
- **Web Server**: Apache HTTP Server 2.2 / 2.4 with `mod_php`
- **PHP Version**: PHP 5.2.x – PHP 5.6.x
- **PHP Extensions**: `php-mysql` (classic `ext/mysql`), `php-mbstring`, `php-gd`
- **Database Server**: MySQL 4.1 / 5.0 / 5.1 / 5.5 / MariaDB 5.5 (default charset `latin2` or `latin1`)
- **Mail Transfer Agent**: Local `sendmail` or `postfix` configured for PHP `mail()`

---

## 2. PHP Runtime Configuration (`php.ini`)

Ensure the following configuration directives are active in `php.ini`:

```ini
; Essential directives for cRentSys v3
engine = On
short_open_tag = On
asp_tags = Off
precision = 14
output_buffering = 4096
zlib.output_compression = Off

; Character Encoding
default_charset = "iso-8859-2"

; Error Reporting (Disable deprecation notices in PHP 5.5+)
error_reporting = E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_STRICT
display_errors = Off
log_errors = On
error_log = /var/log/php/crentsys_error.log

; File Uploads & POST size (for vehicle photo uploads)
file_uploads = On
upload_max_filesize = 10M
post_max_size = 12M

; Session / Cookie Settings
session.use_cookies = 1
session.cookie_httponly = 0
```

---

## 3. Web Server VirtualHost Configuration (Apache)

### Apache VirtualHost (`/etc/apache2/sites-available/crentsys.conf`):
```apache
<VirtualHost *:80>
    ServerName crentsys.local
    ServerAlias www.crentsys.local
    DocumentRoot /var/www/crentsys/app/v3-original_2013

    <Directory /var/www/crentsys/app/v3-original_2013>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Order allow,deny
        Allow from all
        Require all granted

        # Set default character set to Latin-2 for Hungarian diacritics
        AddDefaultCharset ISO-8859-2
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/crentsys_error.log
    CustomLog ${APACHE_LOG_DIR}/crentsys_access.log combined
</VirtualHost>
```

---

## 4. Filesystem Directory Permissions

The application requires write permissions on specific directories for image handling:

```bash
# Set ownership to web server user
sudo chown -R www-data:www-data /var/www/crentsys/app/v3-original_2013

# Set directory permissions
find /var/www/crentsys/app/v3-original_2013 -type d -exec chmod 755 {} \;
find /var/www/crentsys/app/v3-original_2013 -type f -exec chmod 644 {} \;

# Ensure photos directories are writable
chmod 775 /var/www/crentsys/app/v3-original_2013/photos
chmod 775 /var/www/crentsys/app/v3-original_2013/photos/thumb
```
