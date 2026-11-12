FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

# Install Apache + PHP + required modules in one shot
RUN apt-get update && apt-get install -y \
    apache2 \
    php8.1 \
    php8.1-mysql \
    php8.1-gd \
    php8.1-zip \
    php8.1-mbstring \
    libapache2-mod-php8.1 \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable mod_rewrite
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy project files
COPY . /var/www/html/
RUN rm -f /var/www/html/index.html

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Configure Apache to run in foreground
ENV APACHE_RUN_USER=www-data
ENV APACHE_RUN_GROUP=www-data
ENV APACHE_LOG_DIR=/var/log/apache2

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]

