FROM alpine/curl:3.14

RUN curl --silent --show-error --fail --location \
      --header "Accept: application/tar+gzip, application/x-gzip, application/octet-stream" \
       -o /usr/bin/caddy "https://caddyserver.com/api/download?os=linux&arch=amd64&p=github.com%2Fgit001%2Fcaddyv2-upload&idempotency=5906775457503" \
    && chmod 0755 /usr/bin/caddy \
    && /usr/bin/caddy version;

COPY static /srv/static
COPY .docker/static/Caddyfile /etc/Caddyfile

WORKDIR /srv/static

#RUN chown -R www-data:www-data /srv/static

CMD /usr/bin/caddy run --config /etc/Caddyfile;