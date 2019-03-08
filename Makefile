PHONY: build
build:
	docker-compose build

PHONY: start
start:
	docker-compose -f docker-compose.yml up

PHONY: install
install:
	docker exec -it doika-webserver cp .env.docker .env
	docker exec -it doika-webserver php /app/artisan key:generate
	docker exec -it doika-webserver php /app/artisan storage:link
	docker exec -it doika-webserver php /app/artisan migrate --seed

PHONY: stop
stop:
	docker-compose stop

PHONY: delete
delete:
	docker-compose down
