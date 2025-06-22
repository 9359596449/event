FROM php:8.2-apache

# Enable URL rewriting
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files to container
COPY . /var/www/html

# Create upload folders so they're available at runtime
RUN mkdir -p /var/www/html/uploads/bride /var/www/html/uploads/groom

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Set Render's expected port
ENV PORT 10000
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf
EXPOSE 10000

# Start Apache server
CMD ["apache2-foreground"]
