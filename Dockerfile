FROM php:8.0-apache

LABEL Name=sending-web Version=0.1

RUN docker-php-ext-install mysqli

COPY . /var/www/html/ 

EXPOSE 80

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Adjust the permissions for the entrypoint script
RUN chmod +x /usr/local/bin/docker-php-entrypoint

# Start the Apache server
CMD ["apache2-foreground"]