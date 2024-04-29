FROM php:8.2-fpm-alpine

RUN apk update && apk add curl git wget

RUN apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS

RUN pecl update-channels

RUN apk add --update linux-headers

RUN pecl install xdebug && docker-php-ext-enable xdebug

ENV XDEBUG_MODE=coverage

RUN docker-php-ext-install pdo pdo_mysql bcmath sockets opcache && docker-php-ext-enable opcache && pecl install apcu && docker-php-ext-enable apcu

RUN apk add rabbitmq-c-dev && pecl install amqp-1.11.0 && docker-php-ext-enable amqp

WORKDIR /usr/local/etc/php/conf.d/

COPY config/docker.local/config/php-fpm/php.ini .

WORKDIR /var/www/html

COPY . .

EXPOSE 9000
