#!/bin/sh

cd /vagrant/dev/php


for cname in `docker ps --filter="name=errand-php" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = errand-php ]
    then
        docker stop $cname
        docker rm $cname
    fi
done

docker build -t errand/php .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name errand-php \
       --hostname errand-php \
       -p 80:80 \
       -v /vagrant:/vagrant \
       --link errand-mysql:errand-mysql \
       -e DESKTOP_NOTIFIER_SERVER_URL=http://192.168.88.1:12345 \
       errand/php

docker cp \
       /vagrant/dev/php/desktop-notifier-client \
       errand-php:/usr/bin/notify-send

docker exec errand-php /vagrant/dev/php/init-env.sh
