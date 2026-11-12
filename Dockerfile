FROM php:8.2-apache

# Disable all MPM modules first, then enable only prefork
RUN apt-get update && apt-get install -y apache2 libapache2-mod-php8.2 2>/dev/null || true; \
    a2dismod mpm_worker mpm_event 2>/dev/null || true; \
    a2enmod mpm_prefork rewrite 2>/dev/null || true

# Install PHP MySQL + GD extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql gd

# Copy app files
COPY . /var/www/html/

# Remove default Apache index
RUN rm -f /var/www/html/index.html

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Enable .htaccess in document root
RUN sed -i 's|AllowOverride None|AllowOverride All|g' /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]

