FROM php:7.4.16-fpm

RUN apt update
RUN apt install -y \
   git \
   libzip-dev \
   libc-client-dev \
   libkrb5-dev \
   libpng-dev \
   libjpeg-dev \
   libwebp-dev \
   libfreetype6-dev \
   libkrb5-dev \
   libicu-dev \
   zlib1g-dev \
   zip


RUN docker-php-ext-configure imap \
   --with-kerberos \
   --with-imap-ssl
RUN docker-php-ext-install imap

RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install bcmath

RUN docker-php-ext-configure sockets
RUN docker-php-ext-install sockets

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-source extract \
    && apt update  \
    && apt install git -y \
    && apt install procps -y


WORKDIR /app
