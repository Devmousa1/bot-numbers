# # Use the official PHP image with Apache
# FROM php:8.1-apache

# # Set the working directory inside the container
# WORKDIR /var/www/html

# # Copy the current directory contents into the container
# COPY web /var/www/html

# RUN ls
# # Install additional PHP extensions (if needed)
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# # Give the Apache user proper permissions to the project directory
# RUN chown -R www-data:www-data /var/www/html

# RUN echo "ServerName 127.0.0.1" |  tee /etc/apache2/conf-available/servername.conf
# RUN service apache2 reload
# RUN a2enconf servername

# # Enable Apache mod_rewrite (if using clean URLs)
# RUN a2enmod rewrite



# # Expose port 80 for the web server
# EXPOSE 7860

# # Start Apache in the foreground
# CMD ["apache2-foreground"]



FROM php:apache

WORKDIR /var/www/html
COPY web .

ENV PORT=7860
EXPOSE ${PORT}

# Install php-zip extension and any dependencies
RUN apt-get update && apt-get install -y \
        libzip-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-enable zip

# Update Apache to listen on the custom port
RUN bash -c "sed -i 's/Listen 7860/Listen ${PORT}/' /etc/apache2/ports.conf"

# Set ServerName to suppress warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
