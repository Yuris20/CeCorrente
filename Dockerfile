FROM php:8.1-apache

# Installa l'estensione mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copiamo la cartella src locale dentro /var/www/html/src/ nel container
# Così i tuoi path rimarranno coerenti: /src/index.php, /src/StampaFattura.php
COPY src/ /var/www/html/src/

# CAMBIO FONDAMENTALE: Diciamo ad Apache che la cartella principale è /src/
# Questo evita di dover scrivere ogni volta /src/ nell'indirizzo web
ENV APACHE_DOCUMENT_ROOT /var/www/html/src
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copia il file SQL per l'init del database (percorso invariato)
COPY src/assets/db/cecorrente.sql /docker-entrypoint-initdb.d/cecorrente.sql

# Permessi corretti per la sicurezza
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80