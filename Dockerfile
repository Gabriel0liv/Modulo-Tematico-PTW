# Etapa 1: Build dos assets e dependências PHP
FROM node:18 AS frontend

WORKDIR /app

# Copia os arquivos necessários do projeto
COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public

# Instala dependências do frontend e gera o build de produção
RUN npm install && npm run build

# Etapa 2: App PHP com Apache
FROM php:8.2-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Ativa mod_rewrite do Apache
RUN a2enmod rewrite

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copia a aplicação Laravel
COPY . .

# Copia os arquivos buildados do frontend para a pasta pública
COPY --from=frontend /app/public/build ./public/build

# Instala dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissões
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

# Define o document root do Apache para /var/www/public
ENV APACHE_DOCUMENT_ROOT /var/www/public
RUN sed -ri -e 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/*.conf

EXPOSE 80

CMD ["apache2-foreground"]

