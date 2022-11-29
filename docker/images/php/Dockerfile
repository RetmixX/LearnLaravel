
FROM php:8.1.12-fpm-alpine

COPY ./docker/images/php/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www


RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql
COPY ./docker/images/php/php.ini /usr/local/etc/php/conf.d/php.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Clear cache
RUN rm -rf /var/cache/apk/*

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www

COPY --chown=www:www ./laravel /var/www

CMD ["php-fpm"]