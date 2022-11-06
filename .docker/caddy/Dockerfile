FROM caddy:2.6-builder-alpine AS caddy-build

RUN xcaddy build \
	--with github.com/dunglas/mercure \
	--with github.com/dunglas/mercure/caddy \
	--with github.com/dunglas/vulcain \
	--with github.com/dunglas/vulcain/caddy

FROM caddy:2.6-alpine 

COPY --from=caddy-build /usr/bin/caddy /usr/bin/caddy
COPY .docker/caddy/Caddyfile /usr/etc/Caddyfile

CMD /usr/bin/caddy run --config /usr/etc/Caddyfile

EXPOSE 2015