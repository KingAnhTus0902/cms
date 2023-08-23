#!/bin/bash

# composer
docker exec -i clinic-app sh -c "
composer install &&
php artisan key:generate &&
php artisan migrate &&
php artisan optimize &&
exit"
