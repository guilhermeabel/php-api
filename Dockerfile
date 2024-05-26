FROM composer:latest AS vendor

WORKDIR /app

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist

COPY . .
RUN composer dump-autoload

FROM php:8.3-fpm

ENV MYSQL_HOST ${MYSQL_HOST}
ENV MYSQL_DB ${MYSQL_DB}
ENV MYSQL_USER ${MYSQL_USER}
ENV MYSQL_PASSWORD ${MYSQL_PASSWORD}
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt update && apt install -y \
    autoconf \
    zip \
    libzip-dev \
    gettext \
    git \
    libxml2-dev \
    libpq-dev \
    curl

RUN apt clean autoclean
RUN apt autoremove --yes
RUN rm -rf /var/lib/{apt,dpkg,cache,log}/

RUN docker-php-ext-install mysqli pdo pdo_mysql zip opcache pcntl soap bcmath
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN touch /tmp/xdebug.log && chmod 777 /tmp/xdebug.log
RUN mkdir /var/log/nginx && \
	touch /var/log/nginx/error.log && \
	chmod 777 /var/log/nginx/error.log && \
	touch /var/log/nginx/access.log && \
	chmod 777 /var/log/nginx/access.log

COPY --from=vendor app/vendor/ ./vendor/
COPY . .
COPY php.ini /usr/local/etc/php/conf.d/

RUN export XDEBUG_SESSION=1

EXPOSE 9000
CMD ["php-fpm", "-F"]
