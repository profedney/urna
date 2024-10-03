FROM php:8.3.12-apache

ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other utilities
RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        apt-utils \
        wget \
        vim \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libzip-dev \
        unzip \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copy files.
COPY ./docker/php-httpd/custom-php.ini "${PHP_INI_DIR}/conf.d/custom-php.ini"
COPY ./docker/php-httpd/httpd-default.conf /etc/apache2/sites-available/000-default.conf

# Install Composer
RUN wget http://getcomposer.org/installer -O composer-installer.php \
    && php composer-installer.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-installer.php

EXPOSE 80
