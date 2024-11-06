#!/bin/bash

# Install PHP dependencies
composer install --no-interaction

# Generate Laravel application key
php artisan key:generate

php migrate:fresh --seed

# Install Node.js dependencies
npm install

# Build frontend assets
npm run build


# Start Apache in the foreground
apachectl -D FOREGROUND