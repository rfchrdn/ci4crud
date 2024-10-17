FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y libpng-dev libonig-dev libjpeg-dev libfreetype6-dev zip unzip git

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy project files to the container
COPY . /var/www/html

# Install Composer (for dependencies)
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Run composer install if composer.json exists
RUN if [ -f "composer.json" ]; then composer install; fi

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port
EXPOSE 9000
CMD ["php-fpm"]
