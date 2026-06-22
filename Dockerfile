# Usamos una imagen oficial de PHP con Apache (servidor web) ya configurado
FROM php:8.2-apache

# Copiamos todos los archivos del proyecto a la carpeta raíz de Apache
COPY . /var/www/html/

# Le damos permisos correctos a la carpeta para que Apache pueda leer los archivos
RUN chown -R www-data:www-data /var/www/html

# Exponemos el puerto 80
EXPOSE 80