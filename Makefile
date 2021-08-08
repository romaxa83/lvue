.SILENT:

#=============VARIABLES================
php_container = lvue__app_php-fpm
node_admin_container = lvue__admin_node
node_front_container = lvue__FRONT_node
redis_container = lvue__redis

ip = 192.168.179.1
#======================================

#=====MAIN_COMMAND=====================

.DEFAULT_GOAL := init

.PHONY: init
init: down-clear build up_docker ps info

.PHONY: up
up: up_docker info

.PHONY: info
info: ps info_domen

.PHONY: rebuild
rebuild: down build up_docker info

.PHONY: up_docker
up_docker:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down --remove-orphans

# флаг -v удаляет все volume (очищает все данные)
.PHONY: down-clear
down-clear:
	docker-compose down -v --remove-orphans

.PHONY: build
build:
	docker-compose build

.PHONY: ps
ps:
	docker-compose ps

.PHONY: cp-env
cp-env:
	cp .env.example .env

#=======COMMAND_FOR_APP================

app-init: composer-install project-init perm

composer-install:
	docker-compose run --rm php-fpm composer install

project-init:
	docker-compose run --rm php-fpm php artisan key:generate
# 	docker-compose run --rm php-fpm php artisan queue:table
	docker-compose run --rm php-fpm php artisan migrate
	docker-compose run --rm php-fpm php artisan db:seed
	docker-compose run --rm php-fpm php artisan passport:keys
	docker-compose run --rm php-fpm php artisan am:init
	docker-compose run --rm php-fpm composer ide

.PHONY: perm
perm:
	sudo chmod 777 -R storage

#=======INTO_CONTAINER=================

php_bash:
	docker exec -it $(php_container) bash

redis_bash:
	docker exec -it $(redis_container) sh

db_bash:
	docker exec -it $(db_container) sh
#=======FOR_TEST=================

.PHONY: test
test: test_init test_run

.PHONY: test_init
test_init:
	docker-compose run --rm php-fpm php artisan key:generate --env=testing -n
	docker-compose run --rm php-fpm php artisan migrate -n --env=testing -n
	docker-compose run --rm php-fpm php artisan db:seed --class="Database\Seeders\DatabaseTestSeeder" --env=testing -n
	docker-compose run --rm php-fpm php artisan am:create-admin -n --env=testing -n

.PHONY: test_refresh_db
test_refresh_db:
	docker-compose run --rm php-fpm php artisan migrate:fresh --seed -n --env=testing -n
	docker-compose run --rm php-fpm php artisan am:create-admin -n --env=testing -n

.PHONY: test_run
test_run:
	docker-compose run --rm php-fpm ./vendor/bin/phpunit

#=======INFO===========================

.PHONY: info_domen
info_domen:
	echo '---------------------------------------------------------------------------------------------';
	echo '--------------------------------DEV MODE-----------------------------------------------------';
	echo [APP] http://$(ip):8080;
	echo [Admin] http://$(ip):8081;
	echo [Front] http://$(ip):8082;
	echo [Mailer] http://$(ip):8025;
	echo '---------------------------------------------------------------------------------------------';


