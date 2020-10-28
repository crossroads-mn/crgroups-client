docker build -t crgroups-client-nginx:1.0.0 -f nginx/Dockerfile --target prod .
docker build -t crgroups-client-php:1.0.0 -f Dockerfile --target prod .

# $ docker network create --driver bridge crgroups-client-network
# $ docker run -d --name crgroups-client-php --network crgroups-client-network crgroups-client-php:1.0.0
# $ docker run -d -p 8080:80 --name crgroups-client-nginx --network crgroups-client-network crgroups-client-nginx:1.0.0

## Teardown
# $ export CID=$(docker container ls -q --filter name=crgroups-client-nginx) && docker stop $CID && docker rm $CID
# $ export CID=$(docker container ls -q --filter name=crgroups-client-php) && docker stop $CID && docker rm $CID
# $ export NID=$(docker network ls -q --filter name=crgroups-client-network) && docker network rm $NID