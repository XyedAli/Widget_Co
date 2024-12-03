# Use the official PHP image with Apache
FROM php:8.1-apache

# Enable mod_rewrite (if needed for routing)
RUN a2enmod rewrite

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the project files into the container
COPY . /var/www/html/

# Install PHP dependencies including PHPUnit
RUN composer install

# Expose port 80 for Apache (Not needed for PHPUnit, but necessary for the web server)
EXPOSE 80

# Set the default command to run PHPUnit (This can be overwritten by commands in docker-compose)
CMD ["vendor/bin/phpunit"]
