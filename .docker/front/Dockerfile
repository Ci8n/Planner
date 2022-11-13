FROM node:18.12.1-alpine3.16 AS develop

COPY ./front/ /srv/front
WORKDIR /srv/front

CMD yarn install && yarn start