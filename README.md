<br />
<div align="center">
  <h3 align="center">Docker Laravel MySQL Nginx Vue3</h3>

  <p align="center">
    News project CRUD
    <br />
  </p>
</div>


<!-- GETTING STARTED -->
## Getting Started

Follow the instruction below to setting up your project.

### Prerequisites

- Download and Install [Docker](https://docs.docker.com/engine/install/)

<!-- USAGE EXAMPLES -->
## Run App Manually


- Create .env file for laravel environment from .env.example on src folder
- Run command ```docker-compose build``` on your terminal
- Run command ```docker-compose up -d``` on your terminal
- Run command ```composer install``` on your terminal after went into php container on docker
- Run command ```docker exec -it php /bin/sh``` on your terminal
- Run command ```chmod -R 777 storage``` on your terminal after went into php container on docker
- If app:key still empty on .env run ```php artisan key:generate``` on your terminal after went into php container on docker
- To run artisan command like migrate, etc. go to php container using ```docker exec -it php /bin/sh```
- Go to http://localhost:8001 or any port you set to open laravel

**Note: if you got a permission error when running docker, try running it as an admin or use sudo in linux**


