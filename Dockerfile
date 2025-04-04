# Utiliser PHP 8.2 avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Changer les permissions des dossiers Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 80 pour Apache
EXPOSE 80

# Lancer Apache au démarrage du conteneur
CMD ["apache2-foreground"]
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
