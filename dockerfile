# Usa la imagen base de PHP con Apache
FROM php:8.1-apache

# Instala las dependencias necesarias y la extensión mysqli
RUN apt-get update \
    && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli

# Copia los archivos del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Ajusta los permisos
RUN chown -R www-data:www-data /var/www/html/

# Expone el puerto 80
EXPOSE 80

# Usa apache2-foreground para iniciar Apache
CMD ["apache2-foreground"]
