FROM php:7.1-apache
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN pecl install xdebug-2.6.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
RUN docker-php-ext-install mbstring

# Enable apache modules
RUN a2enmod rewrite headers