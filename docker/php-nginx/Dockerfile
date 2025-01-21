# 1. Start from the official PHP 8.1 FPM image
FROM php:8.2-fpm

# 2. Install system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    zip \
    unzip \
    curl \
    git \
    nginx

# 3. Install needed PHP extensions
RUN docker-php-ext-install pdo pdo_mysql intl zip

# 4. Copy Composer (from official Composer image) 
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5. Set the working directory to /var/www/symfony
WORKDIR /var/www/symfony

# 6. Copy our project files into the container
COPY . /var/www/symfony

# 7. Install Symfony dependencies
RUN composer install --no-interaction

# 8. Remove default Nginx config, then copy our own
RUN rm /etc/nginx/sites-enabled/default
COPY docker/php-nginx/nginx.conf /etc/nginx/conf.d/default.conf

# 9. Expose port 80
EXPOSE 80

# 10. Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
