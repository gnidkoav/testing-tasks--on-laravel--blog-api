

FROM php:7.2-apache


COPY ./docker/web/apache2/http.conf /etc/apache2/sites-available
RUN rm /etc/apache2/sites-available/000-default.conf
RUN mv /etc/apache2/sites-available/http.conf /etc/apache2/sites-available/000-default.conf


RUN apt update

RUN apt install -y libzip-dev  # todo: wtf ???

RUN docker-php-ext-install zip mysqli pdo_mysql


RUN a2enmod rewrite


RUN /etc/init.d/apache2 restart  # todo: is this needed ???

