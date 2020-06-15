FROM php:7.3-fpm




RUN apt-get update && apt-get install -y \
    gcc \
    musl-dev \
    autoconf \
    zlib1g-dev \
    zip \
    unzip \
    wget \
    git \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql bcmath zip pcntl gd soap \
    && pecl install redis-4.1.1  \
    && docker-php-ext-enable redis




# Installing composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN cd /var/www/html/


RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    chown -R www-data:www-data /var/www/



RUN mkdir /usr/local/test



