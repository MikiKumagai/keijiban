FROM php:8.1.7-apache

COPY ./conf/apache2.conf /etc/apache2/apache2.conf

RUN apt update
RUN docker-php-ext-install pdo_mysql