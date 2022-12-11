ARG PHP_VERSION=8.1.12-fpm
ARG COMPOSER_VERSION=2.4

FROM composer:${COMPOSER_VERSION} as composer
FROM php:${PHP_VERSION}

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && apt-get install --assume-yes \
    libpcre3-dev \
    gnupg \
    libpq-dev \
    zip \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install \
    pdo_pgsql \
    zip \
    gd \
    && docker-php-ext-configure \
    zip \
