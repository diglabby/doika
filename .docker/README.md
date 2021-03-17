# Docker

## Prerequisites

Install Docker Desktop: [Get Docker](https://docs.docker.com/get-docker/).

Setup your .env (specify )

## Installation

Build and run docker containers:
```sh
docker-compose up -d
```

Open shell of the "app" container and prepare Laravel application.
```sh
# Open shell of the "app" container
docker-compose exec app bash

# Install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies using composer
/usr/local/bin/composer install

# Prepare Laravel app (first run)
php artisan migrate
php artisan db:seed
php artisan key:generate

# exit from container SSH session
exit
```

Open shell of the "app" container to prepare and build front-end assets:
```sh
docker-compose exec node

## Install NPM dependencies and build assets
npm install && npm run dev

# exit from container SSH session
exit
```
