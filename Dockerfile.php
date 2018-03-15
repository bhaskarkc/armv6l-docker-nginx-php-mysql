FROM php:7.0-fpm
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libmcrypt-dev \
		libpng-dev \
	&& docker-php-ext-install -j$(nproc) mysqli iconv mcrypt \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd

COPY docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY web /var/www/html/web
COPY config /var/www/html/config
COPY scripts /var/www/html/scripts

ENV TZ Australia/Sydney

# Create empty uploads folder owned by www-data
RUN mkdir -p /var/www/html/web/app/uploads && chown www-data /var/www/html/web/app/uploads

# Run maint script before firing up PHP-FPM
RUN sed -i '/^set -e$/a \\n[ -z $SKIP_MAINT ] && cd /var/www/html/scripts/maintenance && php maintenance.php' /usr/local/bin/docker-php-entrypoint
