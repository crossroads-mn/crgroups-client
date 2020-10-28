## DEVELOPMENT ##
FROM nginx:1.19.3 as dev

## PRODUCTION ##
FROM nginx:1.19.3 as prod

RUN rm /etc/nginx/conf.d/default.conf
COPY ./nginx/conf.d /etc/nginx/conf.d
COPY ./index.html /var/www/index.html
COPY *.php /var/www/
COPY ./css/ /var/www/css/
COPY ./fonts/ /var/www/fonts/
COPY ./img/ /var/www/img/
COPY ./js/ /var/www/js/

