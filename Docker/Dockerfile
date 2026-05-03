# Utilizziamo PHP 8.1 con Apache
FROM php:8.1-apache

# 1. Installa l'estensione mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 2. Abilita il modulo rewrite
RUN a2enmod rewrite

# 3. CREA LA SOTTOCARTELLA CeCorrente nel server
# E copia lì dentro tutto il contenuto della tua cartella locale
# Risultato nel server: /var/www/html/CeCorrente/src/...
COPY ../CeCorrente/ /var/www/html/CeCorrente/

# 4. Modifica il redirect automatico
# Se vai su localhost:8080, ti spedisce al percorso completo che desideri
# Creiamo il file index.php con la pulizia della sessione e il redirect
RUN echo '<?php \
session_start(); \
$_SESSION=array(); \
session_destroy(); \
header("Location: /CeCorrente/src/index.php"); \
exit; \
?>' > /var/www/html/index.php

# 5. Imposta i permessi per la cartella creata
RUN chown -R www-data:www-data /var/www/html/CeCorrente \
    && chmod -R 755 /var/www/html/CeCorrente

EXPOSE 80