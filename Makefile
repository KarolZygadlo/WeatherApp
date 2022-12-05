PHP_FPM_SERVICE_NAME=php
NODE_SERVICE_NAME=node
.PHONY: build run php test node fix stop restart

build:
	docker-compose build --no-cache --pull

run:
	docker-compose up -d

php:
	docker-compose exec ${PHP_FPM_SERVICE_NAME} sh

test:
	docker-compose exec ${PHP_FPM_SERVICE_NAME} composer test

node:
	docker-compose exec ${NODE_SERVICE_NAME} sh

fix:
	docker-compose exec ${PHP_FPM_SERVICE_NAME} composer csf

stop:
	docker-compose stop

restart: stop run
