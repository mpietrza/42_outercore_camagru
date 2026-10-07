FROM nginxinc/nginx-unprivileged:1.27-alpine

COPY nginx/nginx.conf /etc/nginx/nginx.conf
COPY nginx/default.conf /etc/nginx/conf.d/default.conf
COPY src/public/ /var/www/html/public/