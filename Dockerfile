# $ docker build -t crgroups-client-php:latest .
FROM php:7.4-fpm

RUN pecl install xdebug-2.9.8 \
    && docker-php-ext-enable xdebug

# $ docker run -d -v ${PWD}:/var/www crgroups-client-php:latest
# $ docker exec -it <cid> bash