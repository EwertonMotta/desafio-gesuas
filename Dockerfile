FROM php:8.2-fpm

WORKDIR /www

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql

EXPOSE 9000
