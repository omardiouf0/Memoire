# Utiliser une image PHP officielle avec Apache + extensions
FROM php:8.3-apache

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip npm nodejs \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers Laravel
COPY . /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Compiler les assets avec Vite
RUN npm install && npm run build

# Donner les permissions à Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Activer Apache Rewrite
RUN a2enmod rewrite

# Configuration Apache pour Laravel
RUN echo "<Directory /var/www/html/public>\n\
    AllowOverride All\n\
</Directory>" >> /etc/apache2/apache2.conf

# Lancer Apache
CMD ["apache2-foreground"]
