# Deployment & Operations Architecture

> **Module**: Production Deployment & Hosting Architecture  
> **Target Environment**: Apache 2.4 + PHP 5.6 / Containerized Legacy Runtime

---

## 1. Traditional LAMP Production Architecture

```mermaid
graph TD
    Client[Client Browser] -->|HTTPS 443| NginxEdge[Nginx Reverse Proxy / SSL Termination]
    NginxEdge -->|HTTP 80| ApachePHP[Apache HTTP Server + mod_php5]
    ApachePHP -->|Filesystem| Webroot[/var/www/crentsys/app/v3-original_2013]
    ApachePHP -->|TCP 3306| MySQL[(MySQL Database localren_hu)]
    ApachePHP -->|SMTP 25| Postfix[Local Postfix / Sendmail]
    Postfix -->|Internet SMTP| Recipient[Customer / Operator Mailboxes]
```

---

## 2. Containerized Legacy Deployment (Docker)

To run the legacy application reliably on modern infrastructure without mutating host PHP runtimes, deploy via Docker using a PHP 5.6 Apache image.

### `Dockerfile`:
```dockerfile
FROM php:5.6-apache

# Install legacy MySQL extension
RUN docker-php-ext-install mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application source code
COPY ./app/v3-original_2013 /var/www/html/

# Set permissions for image uploads
RUN chown -R www-data:www-data /var/www/html/photos \
    && chmod -R 775 /var/www/html/photos

# Configure ISO-8859-2 encoding
RUN echo "AddDefaultCharset ISO-8859-2" >> /etc/apache2/apache2.conf

EXPOSE 80
```

### `docker-compose.yml`:
```yaml
version: '3.8'

services:
  web:
    build: .
    ports:
      - "8080:80"
    depends_on:
      - db
    environment:
      - DB_HOST=db
      - DB_USER=localren
      - DB_PASS=tnerLACOL8002
      - DB_NAME=localren_hu

  db:
    image: mysql:5.7
    command: --character-set-server=latin2 --collation-server=latin2_hungarian_ci
    environment:
      - MYSQL_DATABASE=localren_hu
      - MYSQL_USER=localren
      - MYSQL_PASSWORD=tnerLACOL8002
      - MYSQL_ROOT_PASSWORD=rootpassword
    volumes:
      - db_data:/var/lib/mysql
      - ./docs/v3-original/schema.sql:/docker-entrypoint-initdb.d/init.sql

volumes:
  db_data:
```
