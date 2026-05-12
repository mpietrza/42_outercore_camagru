FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    icu-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install pdo pdo_pgsql gd intl mbstring

WORKDIR /var/www/html