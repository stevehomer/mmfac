FROM dunglas/frankenphp:php8.4

WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN php artisan key:generate --force
RUN php artisan config:cache
RUN php artisan route:cache

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
