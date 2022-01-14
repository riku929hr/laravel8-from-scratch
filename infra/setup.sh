# copy .env file
cp backend/.env.example backend/.env 

# Install PHP modules
composer install

# Generate laravel key
php artisan key:Generate
