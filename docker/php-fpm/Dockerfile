FROM php:7.2-fpm

WORKDIR "/application"

COPY . /application

RUN apt-get update \
    && apt-get install -y zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --prefer-dist