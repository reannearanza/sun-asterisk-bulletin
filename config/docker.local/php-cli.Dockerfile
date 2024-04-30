FROM php:8.2-cli-alpine

RUN apk update && apk add curl git wget

RUN apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS

RUN pecl update-channels

RUN apk add --no-cache linux-headers

RUN docker-php-ext-install pdo pdo_mysql bcmath sockets opcache && docker-php-ext-enable opcache && pecl install apcu && docker-php-ext-enable apcu && pecl install pcov && docker-php-ext-enable pcov

RUN apk add --no-cache yaml-dev

RUN pecl channel-update pecl.php.net

RUN pecl install yaml-2.2.2 && docker-php-ext-enable yaml

WORKDIR /usr/local/etc/php/conf.d/

COPY config/docker.local/config/php-cli/php.ini .

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

COPY . .

ENTRYPOINT [ "php"]