FROM php:8.2-apache

# Enable URL rewriting
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy app files to container
COPY . /var/www/html

# Create upload directories inside container
RUN mkdir -p /var/www/html/upload/bride /var/www/html/upload/groom

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Required for Render: use dynamic port
ENV PORT 10000
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf
EXPOSE 10000

# Start Apache in foreground
CMD ["apache2-foreground"]
