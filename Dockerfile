FROM php:8.1-apache

# 1. Installa l'estensione mysqli per il database
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 2. Crea la cartella /var/www/html/src e copia lì dentro tutto il tuo codice
# Questo permette ai path come "../src/assets/..." di funzionare
COPY src/ /var/www/html/src/

# 3. Copia il file SQL per l'inizializzazione automatica del database
# Nota: Il database caricherà questo file solo se il volume è vuoto
COPY src/assets/db/cecorrente.sql /docker-entrypoint-initdb.d/cecorrente.sql

# 4. Creiamo un file index.php nella root principale che reindirizza l'utente
# automaticamente su /src/index.php quando apre il sito
RUN echo '<?php header("Location: /src/index.php"); ?>' > /var/www/html/index.php

# 5. Imposta i permessi corretti per la sicurezza (Prerequisito: No Vulnerabilities)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Espone la porta 80 per il traffico web
EXPOSE 80