# Dockerfile for PHP + MySQL Application

# Set the base image
FROM php:8.0-apache

# Install MySQL client
RUN apt-get update && apt-get install -y default-mysql-client

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application source
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80

# Start the apache server
CMD ["apache2-foreground"]