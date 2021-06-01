#bin/bash

cd containers/local/
docker-compose up --build -d
docker exec -it -u 1000 example-php-fpm bash
cd ../../
