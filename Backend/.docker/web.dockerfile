FROM nginx:alpine

COPY nginx/web.vhost.conf /etc/nginx/conf.d/default.conf