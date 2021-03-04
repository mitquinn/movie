# Movie Project

### Description
This is a quick project outlining a REST API for a movies.

See _Documentation_ folder for more detailed info about the project. 

### Installation
```
cp .env.example .env

docker-compose up -d

docker-compose run movie-project composer install

docker-compose run movie-project php artisan key:generate

//Create a new database via adminer (http://localhost:8080)
//See .env for credentials 
//Make sure collation is utf8mb4_unicode_ci  

docker-compose run movie-project php artisan migrate

docker-compose run movie-project php artisan db:seed

docker-compose run movie-project php artisan passport:install

docker-compose run movie-project php artisan passport:keys

docker-compose run movie-project php artisan passport:client --client
//Use the client_id and client_secret for the POSTMAN client_id/client_secret

//The POSTMAN collection and env are located in the documentation folder
```


### Contributors
Mitchell Quinn <mitchell.david.quinn@gmail.com>

