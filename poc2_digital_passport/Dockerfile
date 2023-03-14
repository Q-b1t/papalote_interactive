FROM php:7.1-apache

RUN apt-get update && \
    docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-install mysqli && \
    docker-php-ext-enable mysqli

WORKDIR /var/www/html/

COPY /www .

EXPOSE 80