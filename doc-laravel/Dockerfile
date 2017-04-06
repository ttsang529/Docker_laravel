FROM php:7-fpm
MAINTAINER Mike Chernev <mike@mikechernev.com>

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        git \
        vim \
        zlib1g-dev \
        php-pear \
        libssl-dev \
    && docker-php-ext-install -j$(nproc) pdo iconv mcrypt mbstring pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) zip 
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN mkdir -p /var/www
VOLUME /var/www
WORKDIR /var/www
RUN composer global require "laravel/installer"
RUN export PATH="$PATH:$HOME/.composer/vendor/bin"
# Install mongo
RUN pecl install mongodb
RUN echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/ext-mongodb.ini
COPY cli_php.ini /usr/local/etc/php/php.ini
