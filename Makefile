build:
	docker-compose build

up:
	docker-compose up -d

halt:
	docker-compose stop

ssh:
	docker exec -ti project-api_php_1 sh