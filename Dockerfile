FROM php:fpm-alpine
ENV APACHE_DOCUMENT_ROOT /app/public

RUN apk add --no-cache nodejs npm

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions @composer bcmath gd intl ldap xdebug zip opcache apcu pdo mysqli pdo_mysql amqp

WORKDIR /app

CMD [ "php-fpm" ]