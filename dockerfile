# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

# Instala la extensión mysqli
RUN apt-get update \
    && apt-get install -y libmysqli-dev \
    && docker-php-ext-install mysqli

# Copia los archivos de tu proyecto en el directorio raíz de Apache
COPY . /var/www/html/

# Dar permisos correctos a los archivos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 80 para acceder a la aplicación
EXPOSE 80

# Comando por defecto para iniciar Apache
CMD ["apache2-foreground"]
