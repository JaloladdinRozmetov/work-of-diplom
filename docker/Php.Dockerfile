FROM php:8.1-fpm

RUN apt-get update && \
      docker-php-ext-install pdo pdo_mysql && \
      apt-get install -y \
        git \
        curl \
        zip \
        unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
