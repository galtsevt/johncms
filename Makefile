prepare:
	cp -R ./system/vendor/maximebf/debugbar/src/DebugBar/Resources/* themes/default/assets/debugbar

cms-install:
	composer install
	npm install
	npm run build

cms-update:
	composer install
	npm install
	npm run build
	php johncms migrate
	php johncms cache:clear

up:
	docker-compose up -d

rebuild:
	docker-compose up -d --build

stop:
	docker-compose stop

shell:
	docker exec -it $$(docker ps -q -f name=ubuntu) bash
