PHONY: build
build:
	docker-compose build

PHONY: start
start:
	docker-compose up

PHONY: install
install:
	docker exec -it app cp .env.docker .env
	docker exec -it app php artisan key:generate
	docker exec -it app php artisan storage:link
	docker exec -it app php artisan migrate --seed

PHONY: stop
stop:
	docker-compose stop

PHONY: delete
delete:
	docker-compose down
