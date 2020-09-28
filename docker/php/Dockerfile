FROM hermsi/alpine-fpm-php:7.3

RUN docker-php-ext-install pcntl bcmath xml zip intl

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
ADD id_rsa /root/.ssh/id_rsa

# Create known_hosts
RUN touch /root/.ssh/known_hosts
# Add bitbuckets key
RUN ssh-keyscan bitbucket.org >> /root/.ssh/known_hosts

#add mysql-client && gitfor running tests
RUN	apk add --update mysql-client git

#install xdebug

RUN apk update \
    && apk add  --no-cache libmcrypt libmcrypt-dev \
    && apk add --no-cache --virtual build-dependencies icu-dev \
    libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev g++ make autoconf \
    && docker-php-source extract \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug redis \
    && docker-php-source delete \
    && apk del build-dependencies \
    && apk del libmcrypt-dev \
    && rm -rf /tmp/*
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug-dev.ini

# fix the alpinr iconv issue
RUN apk add --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/testing gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php
