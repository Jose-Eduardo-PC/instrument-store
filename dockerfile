# Usar una imagen base de PHP con Apache
FROM php:8.1-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar archivos de la aplicación al contenedor
COPY . /var/www/html

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Ajustar permisos y variables de entorno
RUN chown -R www-data:www-data /var/www/html
