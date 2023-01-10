FROM php:8.0-fpm-alpine

RUN apk update && apk add gettext-dev ffmpeg libxml2 libxml2-dev
RUN docker-php-ext-install pcntl bcmath xml

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-install zip

RUN apk add icu-dev
RUN docker-php-ext-install intl gettext

RUN apk add oniguruma-dev
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo

RUN apk add freetype-dev libjpeg-turbo-dev libpng-dev
RUN docker-php-ext-install gd

# telnet etc
RUN apk add busybox-extras

RUN docker-php-ext-install pdo mysqli pdo_mysql

# Mailparse
RUN apk add --no-cache \
        $PHPIZE_DEPS \
    && pecl install mailparse
RUN docker-php-ext-enable mailparse


# get compser
RUN	apk update && \
	apk upgrade && \
	apk add --update curl openssl && \
	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  && \
	chmod +x /usr/local/bin/composer && \
	apk del curl openssl && \
rm -rf /var/cache/apk/*

# set key for getting private repos
RUN	apk add --update openssh

# Create known_hosts
RUN mkdir /root/.ssh && touch /root/.ssh/known_hosts
# Add bitbuckets key
RUN ssh-keyscan bitbucket.org >> /root/.ssh/known_hosts

#add mysql-client for running tests
RUN	apk add --update mysql-client

RUN	apk add nano


RUN pecl install pcov
RUN docker-php-ext-enable pcov

RUN apk add git


# Add xdebug
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS
RUN apk add --update linux-headers
RUN pecl install xdebug-3.2.0
RUN docker-php-ext-enable xdebug
RUN apk del -f .build-deps
