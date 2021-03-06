FROM php:8.0-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html

COPY ./src .

EXPOSE 80
