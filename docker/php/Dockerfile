FROM php:7.4.4-fpm-alpine3.11

LABEL maintainer="mebodik@gmail.com"

ADD docker/php/php.ini /usr/local/etc/php

# Composer
# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
COPY --from=composer:1.10.15 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --classmap-authoritative \
    && composer clear-cache

WORKDIR /var/www

COPY . ./

RUN composer install --prefer-dist --no-progress --no-suggest --optimize-autoloader --no-dev

RUN chown -R www-data:www-data var

VOLUME ["/var/www/vendor"]
VOLUME ["/var/www/var"]

CMD ["php-fpm"]

EXPOSE 9000
