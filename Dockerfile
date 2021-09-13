FROM php:7.4-apache
COPY . /var/www/html/
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html/
RUN apt-get update \
  && apt-get install -y zlib1g-dev libicu-dev g++ \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl \
  && docker-php-ext-install pdo pdo_mysql \
  && apt-get install -y git \
  && apt-get install -y zip
RUN composer install --prefer-dist