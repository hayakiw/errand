#!/bin/sh

cd /vagrant/dev/php


for cname in `docker ps --filter="name=wanter-php" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = wanter-php ]
    then
        docker stop $cname
        docker rm $cname
    fi
done

docker build -t wanter/php .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name wanter-php \
       --hostname wanter-php \
       -p 80:80 \
       -v /vagrant:/vagrant \
       --link wanter-mysql:wanter-mysql \
       -e DESKTOP_NOTIFIER_SERVER_URL=http://192.168.88.1:12345 \
       wanter/php

docker cp \
       /vagrant/dev/php/desktop-notifier-client \
       wanter-php:/usr/bin/notify-send

docker exec wanter-php /vagrant/dev/php/init-env.sh
