FROM php:8.2-apache

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

ARG PHP_DEBUGGER=""
RUN set -eux \
    && if [ "$PHP_DEBUGGER" = "xdebug" ]; then \
    pecl install xdebug \
    && docker-php-ext-enable xdebug; \
    fi\
    && rm -rf /tmp/*

COPY ./docker/php.ini /usr/local/etc/php/conf.d/
COPY ./docker/000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 8080

COPY . /var/www/

RUN composer install --working-dir=/var/www/
RUN chmod 777 -R /var/www/storage/ && \
    echo "Listen 8080" >> /etc/apache2/ports.conf  && \
    a2enmod rewrite