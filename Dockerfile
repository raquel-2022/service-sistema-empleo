#seccion 1
FROM php:7.3-apache
EXPOSE 3306

# Configurar Apache
RUN a2enmod rewrite
#seccion 2
# Instalar extensiones y dependencias necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update && \
    apt-get install -y mariadb-server mariadb-client
#seccion 3
# Copiar archivos PHP a la imagen
COPY app/ /var/www/html
COPY images/ /var/www/html/images
#seccion 4
# Variables de entorno para la base de datos
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=midatabase
ENV MYSQL_USER=diego
ENV MYSQL_PASSWORD=diego
#seccion 5
# Copiar script SQL a la ubicación reconocida por MySQL
COPY db/schema.sql /docker-entrypoint-initdb.d/
# Iniciar MySQL al arrancar el contenedor
COPY run.sh /
CMD ["/run.sh"]
