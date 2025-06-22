# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite for URL routing (used by .htaccess)
RUN a2enmod rewrite

# Copy all project files into Apache's web directory
COPY . /var/www/html/

# Set correct working directory
WORKDIR /var/www/html/

# Optional: Set file permissions (recommended for PHP apps)
RUN chown -R www-data:www-data /var/www/html

# Optional: Expose port 80 (default for web)
EXPOSE 80
