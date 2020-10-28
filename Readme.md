## Docker Dev Setup
Credit to https://www.pascallandau.com/blog/php-php-fpm-and-nginx-on-docker-in-windows-10/ for the instructions to work from

Startup the app and nginx containers with a docker shared network

```
docker-compose up -d
```

Verify the app if working at http://localhost:8080

## Teardown

```
docker-compose down
```

## Production Deployment
WIP

Use `build-prod-images.sh` to build prod images of the containers