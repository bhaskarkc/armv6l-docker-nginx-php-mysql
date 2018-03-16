# Nginx PHP MySQL Docker containers running on RaspberryPi (ARMv6l based devices)

Docker images specifically for RaspberryPi (ARMv6l devices like RaspberryPi zero w

Nginx, MySQL and PHP-FPM Docker containers for ARMv6l based machines (for example [Raspberypi zero w](https://www.raspberrypi.org/products/raspberry-pi-zero-w/) )

### Prerequisites
  * [Git](https://git-scm.com/downloads)
  * [Docker](https://docs.docker.com/engine/installation/)
  * [Docker Compose](https://docs.docker.com/compose/install/)

 -> [Docker & Docker Compose installation in RaspberryPi](https://toub.es/2017/07/13/docker-raspberry-pi-perfect-combo/#Docker-installation)
 -> [Compose file version 3 reference](https://docs.docker.com/compose/compose-file/)

### Images 
* [Nginx](https://hub.docker.com/r/alexellis2/nginx-arm/)
* [MySQL](https://hub.docker.com/r/hypriot/rpi-mysql/)
* [PHP-FPM](https://hub.docker.com/r/library/php/)

### Project tree
```sh
.
├── .env
├── README.md
├── data
│   └── db
│       ├── dumps
│       └── mysql
├── docker-compose.yml
├── dockeretc
|   ├── mysql
|   |   └── debian.conf
│   ├── nginx
│   │   ├── http.conf
│   │   ├── proxy.conf
│   │   ├── wordpress.conf (*PS: for WordPress projects)
│   │   ├── fastcgi.inc
│   │   └── nginx.conf
│   ├── php
│   │   └── php.ini
└── web
```

## Run the application:

```sh
sudo docker-compose up -d
```
***This might take some time as docker needs to pull images and build them***

## View logs
 ```sh
  sudo docker-compose logs
```

## Stopping containers and removing services along with mounted volumes
```sh
  sudo docker-compose down -v
```
