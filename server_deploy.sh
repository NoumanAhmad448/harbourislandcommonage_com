# Turn on maintenance mode
php artisan down || true

#Install/update composer dependecies
# composer update

# Install/update composer dependecies
#/opt/cpanel/composer/bin/composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev --no-cache

# Install Specific package
# /opt/cpanel/composer/bin/composer require anhskohbo/no-captcha


# Clear caches
php artisan cache:clear

# Run database migrations
php artisan migrate --force

# Run seeder
yes | php artisan db:seed

#generate artisan key
yes | php artisan key:generate

# change folder permission
yes | chmod -R 777 storage bootstrap/cache

# Clear and cache routes
php artisan route:cache

# Clear and cache config
php artisan config:cache

# Clear and cache views
php artisan view:cache

# Install node modules
#npm install

# Build assets using Laravel Mix
#npm run prod

# Turn off maintenance mode
php artisan up