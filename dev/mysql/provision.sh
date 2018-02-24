#!/bin/sh

cd /vagrant/dev/mysql

data=false

for cname in `docker ps --filter="name=wanter-mysql" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = wanter-mysql ]
    then
        docker stop $cname
        docker rm $cname
    fi

    if [ "$cname" = wanter-mysql-data ]
    then
        data=true
    fi
done

if [ "$data" = false ]
then
    docker run --name wanter-mysql-data -v /var/lib/mysql busybox
fi

docker build -t wanter/mysql .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name wanter-mysql \
       --hostname wanter-mysql \
       -p 3306:3306 \
       --volumes-from wanter-mysql-data \
       -e MYSQL_DATABASE=wanter \
       -e MYSQL_USER=wanter \
       -e MYSQL_PASSWORD=wanter \
       -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
       wanter/mysql \
       --character-set-server=utf8 \
       --collation-server=utf8_unicode_ci
