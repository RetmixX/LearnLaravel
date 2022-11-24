FROM php:8.1.12-fpm-alpine

WORKDIR /var/www

COPY ./docker/images/php/php.ini /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sSLf \
            -o /usr/local/bin/install-php-extensions \
            https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions
RUN chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions \
            pdo \
            pdo_pgsql \
            xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Clear cache
RUN rm -rf /var/cache/apk/*

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www

COPY --chown=www:www ./laravel /var/www


CMD ["php-fpm"]