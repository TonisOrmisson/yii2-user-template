FROM php:8.4-fpm-alpine

RUN apk add --no-cache gettext-dev ffmpeg libxml2 libxml2-dev
RUN docker-php-ext-install pcntl bcmath xml

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-install zip

RUN apk add --no-cache icu-dev
RUN docker-php-ext-install intl gettext

RUN apk add --no-cache oniguruma-dev
RUN docker-php-ext-install mbstring

RUN apk add --no-cache freetype-dev libjpeg-turbo-dev libpng-dev
RUN docker-php-ext-install gd

# telnet etc
RUN apk add --no-cache busybox-extras

RUN docker-php-ext-install pdo mysqli pdo_mysql


# Install necessary packages for compiling Imagick
# Install Imagick extension
RUN apk add --update --no-cache autoconf g++ imagemagick imagemagick-dev imagemagick-pdf  libtool make pcre-dev
RUN pecl install imagick \
    && docker-php-ext-enable imagick

# get compser
RUN	apk add  --no-cache curl openssl && \
	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  && \
	chmod +x /usr/local/bin/composer && \
	apk del curl openssl && \
rm -rf /var/cache/apk/*

# set key for getting private repos
RUN	apk add --no-cache openssh

# Create known_hosts
RUN mkdir /root/.ssh && touch /root/.ssh/known_hosts

#add mysql-client for running tests
RUN	apk add --no-cache mysql-client

RUN	apk add --no-cache nano

RUN apk add --no-cache git

#mailparse
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS
RUN apk add --no-cache linux-headers
RUN pecl install mailparse
RUN docker-php-ext-enable mailparse
RUN apk del -f .build-deps


RUN apk --no-cache add yarn

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

