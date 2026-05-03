FROM php:apache

# Aggiornamento sistema
RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y --no-install-recommends \
        libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Estensioni PHP
RUN docker-php-ext-install mysqli opcache

# OPcache (IMPORTANTE per performance)
RUN { \
    echo "opcache.enable=1"; \
    echo "opcache.memory_consumption=128"; \
    echo "opcache.interned_strings_buffer=8"; \
    echo "opcache.max_accelerated_files=10000"; \
    echo "opcache.validate_timestamps=1"; \
} > /usr/local/etc/php/conf.d/opcache.ini

# Apache modules
RUN a2enmod rewrite headers

# HARDENING APACHE
RUN echo "ServerTokens Prod\nServerSignature Off\nTraceEnable Off" > /etc/apache2/conf-available/security.conf \
    && a2enconf security

RUN a2dismod autoindex status || true

RUN echo "<Directory /var/www/html>\nOptions -Indexes\nAllowOverride All\n</Directory>" >> /etc/apache2/apache2.conf

# HARDENING PHP
RUN { \
    echo "expose_php=Off"; \
    echo "display_errors=Off"; \
    echo "log_errors=On"; \
    echo "session.cookie_httponly=1"; \
    echo "session.use_strict_mode=1"; \
    echo "session.use_only_cookies=1"; \
    echo "allow_url_fopen=0"; \
    echo "allow_url_include=0"; \
    echo "disable_functions=exec,passthru,shell_exec,system,proc_open,popen"; \
} > /usr/local/etc/php/conf.d/security.ini

# APP
COPY ../CeCorrente/ /var/www/html/CeCorrente/

RUN echo '<?php session_start(); session_unset(); session_destroy(); header("Location: /CeCorrente/src/index.php", true, 302); exit; ?>' > /var/www/html/index.php

RUN chown -R www-data:www-data /var/www/html/CeCorrente \
    && find /var/www/html/CeCorrente -type d -exec chmod 755 {} \; \
    && find /var/www/html/CeCorrente -type f -exec chmod 644 {} \;

USER www-data

EXPOSE 80