FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git unzip zip libpng-dev libonig-dev libxml2-dev curl nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
