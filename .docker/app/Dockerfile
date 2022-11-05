FROM php:8.1.0-fpm

RUN curl --silent --show-error --fail --location \
      --header "Accept: application/tar+gzip, application/x-gzip, application/octet-stream" \
       -o /usr/bin/caddy "https://caddyserver.com/api/download?os=linux&arch=amd64&p=github.com%2Fdunglas%2Fmercure%2Fcaddy&p=github.com%2Fdunglas%2Fvulcain%2Fcaddy&idempotency=95983502677336" \
    && chmod 0755 /usr/bin/caddy \
    && /usr/bin/caddy version \
    && docker-php-ext-install pdo pdo_mysql

COPY app /srv/app
COPY .docker/app/Caddyfile /etc/Caddyfile

WORKDIR /srv/app/

RUN chown -R www-data:www-data /srv/app

CMD composer install ; php-fpm -D ; /usr/bin/caddy run --config /etc/Caddyfile;