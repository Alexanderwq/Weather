FROM php:7.4-apache

# настройка модулей
RUN a2enmod rewrite

WORKDIR /root
RUN apt-get update -y && \
    apt-get install -y wget && \
    wget -O composer-setup.php https://getcomposer.org/installer && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    composer self-update

# утилиты
RUN apt install -y unzip

# расширения PHP
RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip

RUN pecl install xdebug-2.9.0
COPY xdebug.ini "${PHP_INI_DIR}/conf.d"

RUN docker-php-ext-install pdo_mysql

# установка document root
WORKDIR /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf