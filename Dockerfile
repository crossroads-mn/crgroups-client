### DEVELOPMENT ###
FROM php:7.4-fpm as dev

RUN pecl install xdebug-2.9.8 \
    && docker-php-ext-enable xdebug

### PRODUCTION ###
FROM php:7.4-fpm as prod
COPY ./index.html /var/www/index.html
COPY *.php /var/www/
COPY ./css/ /var/www/css/
COPY ./fonts/ /var/www/fonts/
COPY ./img/ /var/www/img/
COPY ./js/ /var/www/js/