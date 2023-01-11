FROM php:apache

RUN apt update && \
    apt install unzip

RUN curl \
        -o /tmp/bootstrap-5.2.2-dist.zip \
        -vL https://github.com/twbs/bootstrap/releases/download/v5.2.2/bootstrap-5.2.2-dist.zip && \
    unzip \
        /tmp/bootstrap-5.2.2-dist.zip \
        -d /var/www/html && \
    rm /tmp/bootstrap-5.2.2-dist.zip

RUN docker-php-ext-install pdo_mysql