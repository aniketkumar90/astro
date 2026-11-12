FROM php:8.2-apache

# Fix Apache MPM conflict — disable event, enable prefork
RUN a2dismod mpm_event || true && \
    a2enmod mpm_prefork && \
    a2enmod rewrite

# Install PHP MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install gd zip \
    && rm -rf /var/lib/apt/lists/*

# Copy project into Apache web root
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Enable .htaccess overrides
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/astrojyoti.conf \
    && a2enconf astrojyoti

EXPOSE 80

CMD ["apache2-foreground"]

