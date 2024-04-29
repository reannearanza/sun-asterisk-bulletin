FROM nginx:stable-alpine

WORKDIR /etc/nginx/

COPY config/docker.local/config/nginx .

RUN chown -R nobody:nobody /var/log/nginx

WORKDIR /var/www/html/public

COPY public/favicon.ico .

EXPOSE 8000

