FROM php:8.0-fpm-alpine

RUN apk update && apk add gettext-dev ffmpeg libxml2 libxml2-dev
RUN docker-php-ext-install pcntl bcmath xml

RUN apk add --no-cache zip libzip-dev libpng-dev
RUN docker-php-ext-install zip gd

RUN apk add icu-dev
RUN docker-php-ext-install intl gettext

RUN docker-php-ext-install pdo pdo_mysql

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
RUN chmod 600 /root/.ssh/id_rsa

# Create known_hosts
RUN touch /root/.ssh/known_hosts
# Add bitbuckets key
RUN ssh-keyscan bitbucket.org >> /root/.ssh/known_hosts

#add mysql-client && gitfor running tests
RUN	apk add --update mysql-client git nano


# fix the alpine iconv issue
RUN apk add --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/testing gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php
