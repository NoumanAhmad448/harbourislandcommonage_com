# Install/update composer dependecies
composer install

# Clear caches
php artisan cache:clear

# Run database migrations
php artisan migrate --force

# Run seeder
yes | php artisan db:seed

#generate artisan key
# yes | php artisan key:generate

# change folder permission
# yes | chmod -R 777 storage bootstrap/cache

# Clear and cache routes
php artisan route:cache

# Clear and cache config
php artisan config:cache

# Clear and cache views
php artisan view:cache

# Install node modules
npm install

# Build assets using Laravel Mix
npm run watch

# Turn off maintenance mode
# php artisan up