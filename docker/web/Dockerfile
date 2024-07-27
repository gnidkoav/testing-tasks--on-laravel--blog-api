

FROM php:7.2-apache

RUN apt update

RUN apt install -y libzip-dev  # todo: ???

RUN docker-php-ext-install zip mysqli pdo_mysql

RUN a2enmod rewrite && /etc/init.d/apache2 restart

