## Docker Dev Setup
Credit to https://www.pascallandau.com/blog/php-php-fpm-and-nginx-on-docker-in-windows-10/ for the instructions to work from

Startup the app and nginx containers with a docker shared network
```
docker-compose up
```

Verify the app if working at http://localhost:8080

## Teardown

```
docker-compose down
```

## Production Local Kubernetes Deployment
Use `prod-k8s-local.sh` to build prod-like containers and deploy onto Kubernetes

```
prod-k8s-local.sh
```

### Troubleshooting
Validate that the k8s service `crgroups-client` has an External IP and Endpoints being serviced

```
$ kubectl describe service crgroups-client
Name:                     crgroups-client
Namespace:                default
Labels:                   <none>
Annotations:              Selector:  app=crgroups-client
Type:                     LoadBalancer
IP:                       10.96.49.253
LoadBalancer Ingress:     localhost          <--- valid loadbalancer host
Port:                     http  8080/TCP
TargetPort:               80/TCP
NodePort:                 http  32659/TCP
Endpoints:                10.1.0.36:80   <--- valid pod endpoint
Session Affinity:         None
External Traffic Policy:  Cluster
Events:                   <none>
```