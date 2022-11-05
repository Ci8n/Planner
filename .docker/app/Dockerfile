FROM php:8.1.0-fpm

RUN curl --silent --show-error --fail --location \
      --header "Accept: application/tar+gzip, application/x-gzip, application/octet-stream" \
       -o /usr/bin/caddy "https://caddyserver.com/api/download?os=linux&arch=amd64&idempotency=52503901018237" \
    && chmod 0755 /usr/bin/caddy \
    && /usr/bin/caddy version \
    && docker-php-ext-install pdo pdo_mysql

COPY app /srv/app
COPY .docker/app/Caddyfile /etc/

WORKDIR /srv/app/

RUN chown -R www-data:www-data /srv/app
RUN 

CMD ["/usr/bin/caddy", "run", "--config", "/etc/Caddyfile"];
CMD ["php-fpm"];