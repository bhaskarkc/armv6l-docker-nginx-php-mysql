FROM php:7.0-fpm
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libmcrypt-dev \
		libpng-dev \
	&& docker-php-ext-install -j$(nproc) mysqli iconv mcrypt \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd

COPY dockeretc/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY web /var/www/html/web

ENV TZ Australia/Sydney

# Create empty uploads folder owned by www-data
# This line is optional, but if you are using WordPress then including it would be 
# RUN mkdir -p /var/www/html/web/wp-content/uploads && chown www-data /var/www/html/web/wp-content/uploads

# Run PHP-FPM
RUN /usr/local/bin/docker-php-entrypoint
