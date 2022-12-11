ARG PHP_VERSION=8.2-fpm-alpine3.16
ARG COMPOSER_VERSION=2.4.4

FROM composer:${COMPOSER_VERSION} as composer
FROM php:${PHP_VERSION}

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN apk update

RUN apk --no-cache add \
    zip \
    git \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install \
    zip \
    gd \
    && docker-php-ext-configure \
    zip \
