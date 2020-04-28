# Por que hacer un contenedor con Nginx
## Basicamente pura optimizacion ya que viene bien tener un contenedor encargandose de una cosa.

### Casi todos mis contenedores van a partir de la misma imagen ya que es de un tamaño pequeño.

```
FROM debian:jessie-slim
```

### Aqui le estoy agregando el repositorio para despues poder lanzar un update y instalar el paquete nginx.
```
RUN \
    add-apt-repository -y ppa:nginx/stable && \
    apt-get -y update && \
    apt-get install -y nginx && \
    rm -rf /var/lib/apt/ñists/* && \
    echo "\ndaemon off;" >> /etc/nginx/nginx.conf && \
    chown -R www-data:www-data /var/lib/nginx
```

### Aqui le voy a definir los directorios que se van a montar
```
VOLUME ["/etc/nginx/sites-enabled", "/etc/nginx/certs", "/etc/nginx/conf.d", "/var/log/nginx", "/var/www/html"]
```
### A continuacion le definiremos un directorio sobre el que va a trabajar, mi consejo es que si son servicios utilizar siempre la ruta de /etc ya que siempre se instalan alli.
### Para asi no crear problemas.
```
WORKDIR /etc/nginx
```
### Definiremos que es lo que queremos hacer una vez lanzado.
```
CMD ["nginx"]
```
### Y por ultimo como todos los servicios que se instalaran en un contenedor van a necesitar un puerto por el que poder comunicarse, como es un contenedor con una aplicacion web, pues usaremos los puertos mas conocidos, en este caso sera el 80 y el 443.
```
EXPOSE 80
EXPOSE 443
```
### Este comando es para poder crear el contenedor.
```
docker build -t nginx .
```
### La opcion -t es para darle un nombre al contenedor.

### Este comando es para acceder al contenedor
```
docker run -d -p 80:80 nginx
```
### Con las opciones -d y -p son para que se ejecute en segundo plano y para comunicarse a traves del puerto 80.
