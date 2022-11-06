FROM php:8.1.0-fpm

COPY app /srv/app
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /srv/app/

RUN chown -R www-data:www-data /srv/app

CMD composer install ; php-fpm
EXPOSE 9000