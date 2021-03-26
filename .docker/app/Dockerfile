FROM php:7.1-apache

RUN apt-get update

# Install basic PHP extentions
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install mbstring
RUN apt-get install -y \
        libzip-dev \
        zip \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip
RUN pecl install xdebug-2.9.8 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=0" >> /usr/local/etc/php/php.ini

# Enable apache modules
RUN a2enmod rewrite headers

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
