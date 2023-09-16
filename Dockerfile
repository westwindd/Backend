# Use the official PHP image with Apache server from the Docker Hub
FROM php:8.0-apache

# Install mysqli
RUN docker-php-ext-install mysqli

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Expose port 80 for the Apache web server
EXPOSE 80