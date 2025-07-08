FROM php:8.3-apache

# Installer dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev zip nodejs npm \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Copier Composer depuis l’image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier le code source
COPY . .

# Donner les bonnes permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

# Modifier la configuration d’Apache pour pointer vers public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && echo "<Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>" >> /etc/apache2/apache2.conf

# Installer les dépendances Laravel et compiler les assets
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Commande de lancement
CMD ["apache2-foreground"]
