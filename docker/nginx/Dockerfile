# Build nginx
FROM nginx:1.19.1-alpine

COPY docker/nginx/ /etc/nginx

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
