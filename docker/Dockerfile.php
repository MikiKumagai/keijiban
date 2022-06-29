FROM php:8.1.7-apache

COPY ./conf/apache2.conf /etc/apache2/apache2.conf
COPY ./conf/php.ini /usr/local/etc/php/php.ini