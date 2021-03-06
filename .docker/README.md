# Docker

## Prerequisites

1. Install Docker Desktop: [Get Docker](https://docs.docker.com/get-docker/).
2. Setup your .env: create `.env` file from `.env.docker` (by coping it with a new name). 


## Installation

Build and run docker containers:
```sh
docker-compose up -d
```

Open shell of the "app" container and prepare Laravel application.
```sh
# Open shell of the "app" container
docker-compose exec app bash

# Run all these command inside "app" container shell

# Install PHP dependencies using composer
composer install

# Prepare Laravel app (first run)
php artisan migrate
php artisan db:seed
php artisan key:generate

# exit from container SSH shell session
exit
```

Next, you need to install NPM dependencies and build assets.
We recommend you to do it from your local machine, if you have nodejs locally installed.
If if not, please follow these steps:

Open shell of the "app" container to prepare and build front-end assets:
```sh
docker-compose exec node sh

## Install NPM dependencies and build assets
npm install && npm run dev

# exit from container SSH session
exit
```

Test site should be available on [http://localhost:8080](http://localhost:8080) (if you haven’t changed `FORWARD_HTTP_PORT` in your .env).
Test admin credentials `demo@example.com`/`demo`.

Happy hacking! 🚀
