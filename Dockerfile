FROM php:7.4-apache
COPY . /var/www/html/
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html/
RUN apt-get update \
  && apt-get install -y zlib1g-dev libicu-dev g++ \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl
RUN apt-get install -y git
RUN apt-get install -y zip
RUN apt-get install -y libpq-dev \
  && docker-php-ext-configure pgsql \
  && docker-php-ext-install pdo pdo_pgsql
  
RUN composer install --prefer-dist
RUN chmod -R 777 /var/www/