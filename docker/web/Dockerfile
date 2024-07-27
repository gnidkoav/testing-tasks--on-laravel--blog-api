

FROM php:7.2-apache

RUN apt update

RUN apt install -y libzip-dev

RUN docker-php-ext-install zip mysqli pdo_mysql

#RUN apk update
#RUN apk upgrade
#RUN apt install –y apache2-utils
RUN a2enmod rewrite
#RUN rc-service apache2 restart
RUN /etc/init.d/apache2 restart

