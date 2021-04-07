FROM php:8.0.3-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN mkdir /var/www/gerenciamento-estoque
COPY . /var/www/gerenciamento-estoque

COPY app.conf /etc/apache2/sites-available/app.conf
RUN a2dissite 000-default.conf
RUN a2ensite app.conf
RUN a2enmod rewrite