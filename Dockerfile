FROM php:8.1-apache

# Installa l'estensione mysqli (serve per connettersi a MySQL)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia tutto il contenuto della cartella src/ dentro Apache
COPY src/ /var/www/html/

# Copia il file SQL per l'init del database
COPY src/assets/db/cecorrente.sql /docker-entrypoint-initdb.d/cecorrente.sql

# Dai i permessi corretti ad Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Apache gira sulla porta 80
EXPOSE 80
