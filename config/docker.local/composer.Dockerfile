FROM composer:latest

RUN docker-php-ext-install opcache && docker-php-ext-enable opcache

WORKDIR /usr/local/etc/php/conf.d/

COPY config/docker.local/config/php-cli/php.ini .

WORKDIR /var/www/html

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]