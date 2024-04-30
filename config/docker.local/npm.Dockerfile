FROM node:18-alpine

RUN apk update && apk upgrade

WORKDIR /var/www/html

COPY . .

ENV NODE_OPTIONS="--unhandled-rejections=none"

ENTRYPOINT [ "npm" ]
