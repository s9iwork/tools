FROM php:7.3-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zip \
    unzip \
    iputils-ping \
    vim

# PHP
RUN apt-get install -y libonig-dev libpq-dev zlib1g-dev libzip-dev \
    && docker-php-ext-install zip pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN apt-get install -y --no-install-recommends supervisor

# Nodejs
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y --no-install-recommends nodejs

COPY ./docker/php/supervisor/* /etc/supervisor/conf.d/
