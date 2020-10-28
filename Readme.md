## Docker Container Setup
Credit to https://www.pascallandau.com/blog/php-php-fpm-and-nginx-on-docker-in-windows-10/ for the instructions to work from

### App <-> Nginx Network
1. Create the docker network
```
docker network create --driver bridge crgroups-client-network
```

### Nginx Container
1. Build the app-nginx container
```
docker build -t crgroups-client-nginx:latest nginx/.
```

2. Start the app-nginx container as `crgroups-client-nginx` and connect to `crgroups-client-network`
```
docker run -d --name crgroups-client-nginx -p 8080:80 -v ${PWD}/nginx/conf.d:/etc/nginx/conf.d -v ${PWD}:/var/www/ --network crgroups-client-network crgroups-client-nginx:latest
```


### App Container
1. Build the app-php container
```
docker build -t crgroups-client-php:latest .
```

2. Start the app-php container as `crgroups-client-app`, map app files into container, and connect to `crgroups-client-network`
```
docker run -d --name crgroups-client-php -v ${PWD}:/var/www --network crgroups-client-network crgroups-client-php:latest
```

### Diagnose
Confirm that both containers are connected to the docker network

```
docker network inspect crgroups-client-network

...
        "Containers": {
            "d793e63844510651e9ca024a20440eb077f7579dc83f3db73f9fd922122734b3": {
                "Name": "crgroups-client-php",
                "EndpointID": "8a0aafda92b6ac360e49cb7cb84fb063feda2675de7f0217460f995b65b49412",
                "MacAddress": "02:42:ac:12:00:03",
                "IPv4Address": "172.18.0.3/16",
                "IPv6Address": ""
            },
            "e727851f81e36b598295fd974e07ea018be8b7bb9575b6f79e63cf223f06020d": {
                "Name": "crgroups-client-nginx",
                "EndpointID": "5c629f72b3db4dcc3420f3c7381f6fa273830918fa021bf96a070ee75562f9fa",
                "MacAddress": "02:42:ac:12:00:02",
                "IPv4Address": "172.18.0.2/16",
                "IPv6Address": ""
            }
        },
...
```

Confirm that http://localhost:8080 opens up the homepage

## Teardown
Stop all containers
```
docker stop crgroups-client-nginx
docker stop crgroups-client-php
```

Teardown network
```
docker network rm crgroups-client-network
```

