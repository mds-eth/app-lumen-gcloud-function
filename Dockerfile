FROM php:8.1-alpine3.14

RUN apt-get update && apt-get upgrade

RUN docker-php-ext-install 

COPY . .

RUN composer install

WORKDIR /var/www/html

